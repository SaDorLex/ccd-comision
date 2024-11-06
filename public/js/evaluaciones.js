$(function(){
    $.ajax({
        url: urlConvocatoria,
        type: 'GET',
        success: function(response){
            let listaConvocatoria = $('#lstConvocatoria');

            $.each(response, function(index, convocatoria){
                listaConvocatoria.append('<option value="' + convocatoria.id + '">' + convocatoria.id + "-" + convocatoria.fecha_inicio + '</option>');
            })
        }
    });
})

$('#lstConvocatoria').on('change', function(){
    var idConv = $('#lstConvocatoria').val();
    $.ajax({
        url: urlLstPlazas,
        type: 'GET',
        data: {
            id: idConv,
        },
        success: function(response){
            let listaPlazas = $('#lstPlaza');

            $.each(response, function(index, plaza){
                listaPlazas.append('<option value="' + plaza.id + '">' + plaza.id + '</option>');
            });
        }
    });
});

