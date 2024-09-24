<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Strategy;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\MetricHistoryRun;
use Illuminate\Support\Facades\Log;

class GoogleMetricsController extends Controller
{
    public function index()
    {
        return view('metricsGoogle.index',['categories'=>[],'strategies'=>[]]);
    }

    private function validarData($request) 
    {
        $validated = $request->validate([
            'urlWeb' => 'required|url',
            'strategy_id' => 'required|integer'
        ], [
            'urlWeb.required' => 'El campo URL es obligatorio.',
            'urlWeb.url' => 'El campo debe contener una URL valida.',
        ]);
        return $validated;
    }

    private function infoUsuarioVista($metricasResultado) 
    {
        $result = [];
        $strokeDashArray = 408;
        foreach ($metricasResultado as $key => $value) {
            $percentage = $value * 100;
            $strokeDashoffset = $strokeDashArray - ($strokeDashArray * ($value));
            $result[$key] = [
                'percentage'=> $percentage,
                'strokeDashoffset'=> $strokeDashoffset,
                'value'=> $value
            ];
        }
        return $result;
    }

    private function getMetricas($validated) 
    {
        ($validated['strategy_id'] == 1)? $strategy= 'desktop' : $strategy= 'mobile';
        try {
            $url = 'https://www.googleapis.com/pagespeedonline/v5/runPagespeed?'
            . 'url='.$validated['urlWeb'].'&'
            . 'key=AIzaSyDCrPAzhzWxZbJxPYIEURODTvBFVVRNHbY&'
            . 'category=SEO&'
            . 'category=PERFORMANCE&'
            . 'category=BEST_PRACTICES&'
            . 'category=ACCESSIBILITY&'
            . 'strategy='.$strategy;
            $client = new Client(); 
            $response = $client->request('GET', $url);
            $data = json_decode($response->getBody()->getContents(), true);
            $metricasResultado= [
                'seo'=> $data['lighthouseResult']['categories']['seo']['score'],
                'performance'=> $data['lighthouseResult']['categories']['performance']['score'],
                'bestPractices'=> $data['lighthouseResult']['categories']['best-practices']['score'],
                'accessibility'=> $data['lighthouseResult']['categories']['accessibility']['score']
            ];
            // $metricasResultado= [
            //         'seo'=> 0.85,
            //         'performance'=> 0.20,
            //         'bestPractices'=> 0.45,
            //         'accessibility'=> 0.94
            // ];
            return $this->infoUsuarioVista($metricasResultado);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function process(Request $request)
    {
        $validated = $this->validarData($request);
        $metricas= $this->getMetricas($validated);
        return view('metricsGoogle.indicadores',['metricas'=>$metricas]);
    }

    public function save(Request $request)
    {
        Log::info('Save metrics request received', [
            'request_data' => $request->all()
        ]);
        $performanceValue = $request->input();
        $validated = $request->validate([
            'url'=> 'required|url',
            'strategy_id'=> 'required|numeric',
            'seo' => 'required|numeric|between:0,1',
            'performance' => 'required|numeric|between:0,1',
            'best' => 'required|numeric|between:0,1',
            'access' => 'required|numeric|between:0,1',
        ]);

        MetricHistoryRun::create([
            'url' => $request->input('url'),
            'accesibility_metric' => $validated['access'],
            'pwa_metric' => 0.0, 
            'performance_metric' => $validated['performance'],
            'seo_metric' => $validated['seo'],
            'best_practices_metric' => $validated['best'],
            'strategy_id' => $request->input('strategy_id'),
        ]);
        Log::info('Metrics saved successfully', [
            'url' => $request->input('url'),
            'strategy_id' => $request->input('strategy_id'),
        ]);
        return response()->json(['message' => 'Metrics saved successfully.']);    
    }

    public function history() 
    {
        $historico = MetricHistoryRun::all()->toArray();
        return view('metricsGoogle.historialMetricas',['historico'=>$historico]);
    }
}
