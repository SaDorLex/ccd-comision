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
    })
})