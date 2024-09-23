
url= "http://127.0.0.1/emaChallenge210924/public/";

function buscarMetricas() {
    $("#seccion_resultados").show();
    $.ajax({
        method: "POST",
        url: url+"metrics/findMetrics",
        data: {
            urlWeb: $("#url_web").val(),
            _token: $("#_token").val(),
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            $('#seccion_indicadores').html(response);
        },
        error: function (xhr, status, error) {
            // Manejo de errores
            console.error("Error en la solicitud AJAX:", error);
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
            $('#seccion_indicadores').html(response);
        },
        error: function (xhr, status, error) {
            // Manejo de errores
            console.error("Error en la solicitud AJAX:", error);
        }
    })
}

function mostrarHistorialMetricas() {

    $("#seccion_indicadores").hide();
    $("#seccion_resultados").hide();
    $("#runMetrics").hide();
    $('#metricHistory').show();
    $.ajax({
        method: "POST",
        url: url+"metrics/historyMetrics",
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
            $('#metricHistory').html(response);
        },
        error: function (xhr, status, error) {
            // Manejo de errores
            console.error("Error en la solicitud AJAX:", error);
        }
    })
    
}

function mostrarMetricas() {
    $("#seccion_indicadores").show();
    $("#runMetrics").show();
    $('#metricHistory').hide();
    $("#seccion_resultados").show();

}