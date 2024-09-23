<div class="container mt-5">
    <table class="table table-striped table-bordered" id="metricsTable">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>URL</th>
                <th>Accessibility</th>
                <th>PWA</th>
                <th>Performance</th>
                <th>SEO</th>
                <th>Best Practices</th>
                <th>Strategy</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($historico as $item) {
                echo "<tr>
                    <td>{$item['id']}</td>
                    <td>{$item['url']}</td>
                    <td>{$item['accesibility_metric']}</td>
                    <td>{$item['pwa_metric']}</td>
                    <td>{$item['performance_metric']}</td>
                    <td>{$item['seo_metric']}</td>
                    <td>{$item['best_practices_metric']}</td>
                    <td>{$item['strategy_id']}</td>
                    <td>{$item['created_at']}</td>
                    <td>{$item['updated_at']}</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<style>
    #metricsTable {
        width: 100%;
        table-layout: auto; /* Ajusta el ancho de las columnas */
    }

    #metricsTable th, #metricsTable td {
        text-align: center;
        white-space: nowrap; /* Evita el salto de línea en las celdas */
        overflow: hidden; /* Oculta el contenido que se desborda */
        text-overflow: ellipsis; /* Muestra puntos suspensivos si el texto es demasiado largo */
    }

    #metricsTable tbody tr:hover {
        background-color: #f5f5f5;
    }
</style>

<script>
$(document).ready(function() {
    // Inicializar DataTables
    $('#metricsTable').DataTable({
        "scrollX": true, // Habilita el desplazamiento horizontal
        "responsive": true // Hace la tabla responsive
    });
});
</script>
