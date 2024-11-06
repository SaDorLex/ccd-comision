function calcularHoras(lect, noLect) {
    let hLectivas = $('#hlectivas');
    let hNoLectivas = $('#hnolectivas');
    let hTotal = $('#htotal');

    hLectivas.val(parseInt(hLectivas.val()) + parseInt(lect));
    hNoLectivas.val(parseInt(hNoLectivas.val()) + parseInt(noLect));
    hTotal.val(parseInt(hLectivas.val()) + parseInt(hNoLectivas.val()));
}


$(function () {
    $.ajax({
        url: urlClasificacion,
        type: 'GET',
        success: function (response) {
            let listaClasificacion = $('#lstClasificacion');

            $.each(response, function (index, clasificacion) {
                listaClasificacion.append('<option value="' + clasificacion.id + '">' + clasificacion.nombre + '</option>');
            });
            var clasificacion = plaza.id_clasificacion;
            listaClasificacion.val(clasificacion);
        }
    })

    $.ajax({
        url: urlDepAcad,
        type: 'GET',
        success: function (response) {
            let listaDepAcad = $('#lstDepAcad');

            $.each(response, function (index, depAcad) {
                listaDepAcad.append('<option value="' + depAcad.id + '">' + depAcad.nombre + '</option>');
            });
            if(depAcad != null){
                var depId = depAcad.id;
                listaDepAcad.val(depId);
            }
        }
    })

    $.ajax({
        url: urlConvocatoria,
        type: 'GET',
        success: function(response){
            let listaConvocatoria = $('#lstConvocatoria');

            $.each(response, function(index, convocatoria){
                listaConvocatoria.append('<option value="' + convocatoria.id + '">' + convocatoria.id + "-" + convocatoria.fecha_inicio + '</option>');
            })
            var convo = plaza.id_convocatoria;
            listaConvocatoria.val(convo);
        }
    })

    var idAsignaturas = asignaturas.map(asignatura => asignatura.id);

    $.each(idAsignaturas, function(index, id_As){
        $.ajax({
            url: urlGetAsignatura,
            type: 'GET',
            data: { id: id_As },
            success: function (response) {
                var lstSelectAsig = $('#selectedCursos');
                lstSelectAsig.after(response.html);
            }
        })
    })
})

$(document).on('click', '#btnEditarPlaza', function(){
    let idAsingaturas = [];

    let elementos = $('div#cursoSelected');

    elementos.each(function(index){
        let id = $(this).attr('data-cursoId');
        idAsingaturas.push(id);
    })

    if(idAsingaturas.length === 0){
        alert('Seleccione los cursos para la Plaza');
        return
    }

    let conv = $('#lstConvocatoria').val();
    let clas = $('#lstClasificacion').val();
    let hLec = $('#hlectivas').val();
    let hnoLec = $('#hnolectivas').val();
    let htotal = $('#htotal').val();
    let requisitos = $('#requisitos').val();

    $.ajax({
        url: urlUpdatePlaza,
        method: 'POST',
        data:{
            _token: token,
            id_convocatoria: conv,
            id_clasificacion: clas,
            horas_lectivas: hLec,
            horas_no_lectivas: hnoLec,
            horas_semanales: htotal,
            requisitos_descripcion: requisitos,
            asignaturas: idAsingaturas
        },
        success:function(response){
            alert('Plaza Actualizada Correctamente');
            window.location.href = response.redirect;
        }
    })
})