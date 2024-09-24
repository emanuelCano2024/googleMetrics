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
        table-layout: auto;
    }

    #metricsTable th, #metricsTable td {
        text-align: center;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    #metricsTable tbody tr:hover {
        background-color: #f5f5f5;
    }
</style>

<script>
$(document).ready(function() {
    $('#metricsTable').DataTable({
        "scrollX": true,
        "responsive": true,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                text: 'Export xlsx',
                title: 'Metrics',
                className: 'btn btn-success'
            }
        ]
    });
});
</script>
