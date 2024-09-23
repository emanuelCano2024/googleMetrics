<div class="container">
    <div class="row">
        <div class="col">
            <h5>Seo</h4>
            <div class="circle bg-light" style="background-color: #d1e7dd;">
                <svg width="150" height="150">
                    <circle cx="75" cy="75" r="65" stroke="#6d977f" stroke-width="10" fill="none" stroke-dasharray="408" stroke-dashoffset="<?= $metricas['seo']['strokeDashoffset'];?>" />
                </svg>
                <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" id="valueSeo"  data-value-seo="<?= $metricas['seo']['value'];?>"><?= $metricas['seo']['percentage'];?>%</text>
            </div>
        </div>
        <div class="col">
            <h5>Performance</h4>
            <div class="circle bg-light" style="background-color: #cfe2ff;">
                <svg width="150" height="150">
                    <circle cx="75" cy="75" r="65" stroke="#5b8dbb" stroke-width="10" fill="none" stroke-dasharray="408" stroke-dashoffset="<?= $metricas['performance']['strokeDashoffset'];?>" />
                </svg>
                <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" id="valuePerformance"  data-value-performance="<?= $metricas['performance']['value'];?>"><?= $metricas['performance']['percentage'];?>%</text>
            </div>
        </div>
        <div class="col">
            <h5>Best practices</h4>
            <div class="circle bg-light" style="background-color: #fff3cd;">
                <svg width="150" height="150">
                    <circle cx="75" cy="75" r="65" stroke="#e6a800" stroke-width="10" fill="none" stroke-dasharray="408" stroke-dashoffset="<?= $metricas['bestPractices']['strokeDashoffset'];?>" />
                </svg>
                <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" id="valueBest" data-value-bestpractices="<?= $metricas['bestPractices']['value'];?>"><?= $metricas['bestPractices']['percentage'];?>%</text>
            </div>
        </div>
        <div class="col">
            <h5>Accessibility</h4>
            <div class="circle bg-light" style="background-color: #f8d7da;">
                <svg width="150" height="150">
                    <circle cx="75" cy="75" r="65" stroke="#c82333" stroke-width="10" fill="none" stroke-dasharray="408" stroke-dashoffset="<?= $metricas['accessibility']['strokeDashoffset'];?>" />
                </svg>
                <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" id="valueAccess" data-value-accessibility="<?= $metricas['accessibility']['value'];?>" ><?= $metricas['accessibility']['percentage'];?>%</text>
            </div>
        </div>
    </div>
    <div class="col mt-5">
        <button  class="btn btn-primary" onclick="saveMetrics()">SAVE METRIC RUN</button>   
    </div>
</div>

<style>
      .circle {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            margin: 20px;
            background-color: ; /* Gris oscuro */
            color: black; /* Color del texto */
        }
        .circle svg {
            position: absolute;
            top: 0;
            left: 0;
        }
        .circle text {
            font-size: 24px;
            font-weight: bold;
        }
</style>