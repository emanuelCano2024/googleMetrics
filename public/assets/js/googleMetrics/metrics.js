
url= "http://127.0.0.1/emaChallenge210924/public/";

function buscarMetricas() {
    $("#metricHistory").hide();
    $("#seccion_resultados").show();
    $.ajax({
        method: "POST",
        url: url+"metrics/findMetrics",
        data: {
            urlWeb: $("#url_web").val(),
            strategy_id: $("#strategy").val(),
            _token: $("#_token").val(),
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'ready metrics!',
            });
            $('#seccion_indicadores').html(response);
            $('#seccion_resultados').show();

        },
        error: function (xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '¡Error!',
            });
            $('#seccion_resultados').hide();

        }
    })
}

function saveMetrics() {
    $.ajax({
        method: "POST",
        url: url+"metrics/saveMetrics",
        data: {
            strategy_id: $("#strategy").val(),
            url: $("#url_web").val(),
            seo: $("#valueSeo").data('value-seo'),
            performance: $("#valuePerformance").data('value-performance'),
            best: $("#valueBest").data('value-bestpractices'),
            access: $("#valueAccess").data('value-accessibility'),
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Save!',
            });
        },
        error: function (xhr, status, error) {
            // Manejo de errores
           
        }
    })
}

function mostrarHistorialMetricas() {
    $("#tab1-tab").removeClass('active');
    $("#tab2-tab").addClass('active');
    $("#card-metricas").hide();
    $("#metricHistory").show();
    $("#runMetrics").hide();
    $.ajax({
        method: "POST",
        url: url+"metrics/historyMetrics",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            $('#metricHistory').html(response);
        },
        error: function (xhr, status, error) {
           
        }
    })
    
}

function mostrarMetricas() {
    $("#runMetrics").show();
    $("#card-metricas").show();
    $("#metricHistory").hide();
    $("#tab1-tab").addClass('active');
    $("#tab2-tab").removeClass('active');
}