@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card w-100 mt-5">
             <div class="card-body text-center">
               <h2>Broobe Challenge</h2>
            </div>
        </div>
            <div class="mb-3">
                <ul class="nav nav-tabs mt-2" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="tab1-tab" 
                            data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" 
                            aria-selected="true"
                            onclick="mostrarMetricas()">Run Metric</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tab2-tab" 
                            data-bs-toggle="tab" href="#tab2" 
                            role="tab" aria-controls="tab2" aria-selected="false"
                            onclick="mostrarHistorialMetricas()">Metric History</a>
                    </li>
                </ul>
   

                <div class="card w-100" id="runMetrics">
                    <div class="row"> <!-- Agregar una fila aquí -->
                        <div class="col-4">
                            <div class="card-body text-center">
                            <label for="url" class="form-label">URL</label>
                            <input type="text" class="form-control" id="url_web" name="url" placeholder="https://example.com" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card-body text-center">
                                <label for="categories" class="form-label">Categories</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="category1" value="seo">
                                    <label class="form-check-label" for="category1">SEO</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="category2" value="performance">
                                    <label class="form-check-label" for="category2">PERFORMANCE</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="category3" value="category3">
                                    <label class="form-check-label" for="category3">BEST-PRACTICES</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="category4" value="category4">
                                    <label class="form-check-label" for="category4">ACCESIBILITY</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card-body text-center">
                                 <label for="strategy" class="form-label">Strategy</label>
                                 <div class="mb-3">
                                     <select class="form-select w-100" id="strategy" name="strategy">
                                         <option value="1">Descktop</option>
                                         <option value="2">Mobile</option>
                                     </select>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-2">
                        <button  class="btn btn-primary" onclick="buscarMetricas()">GET METRICS</button>
                    </div>
                </div>
                <div class="card w-100" id="metricHistory">
                </div>
            </div>
            <div class="card w-100 mt-5" style="display:none" id="seccion_resultados">
                <div class="row">
                    <div class="col-12">
                        <div class="card-body text-center">
                            <div id="seccion_indicadores">
                                <div class="d-flex justify-content-center">
                                    <div class="spinner-border" role="status">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>      
    </div>
   
@endsection

<style>
    .form-select {
    background-color: #f8f9fa; /* Color de fondo claro */
    border: 1px solid #ced4da; /* Borde gris */
    border-radius: 0.25rem; /* Bordes redondeados */
    padding: 10px; /* Espaciado interno */
    transition: border-color 0.2s ease-in-out; /* Transición suave para el borde */
}
</style>