$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function debounce(func, delay) {
    let timer;
    return function () {
        const context = this;
        const args = arguments;
        clearTimeout(timer);
        timer = setTimeout(() => func.apply(context, args), delay);
    };
}

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
        url: urlFacultad,
        type: 'GET',
        success: function(response){
            let listaFacultad = $('#lstFacultad');

            $.each(response, function(index, facultad){
                listaFacultad.append('<option value="' + facultad.id + '">' + facultad.nom_abrev + '</option>')
            });
        }
    })

    $.ajax({
        url: urlClasificacion,
        type: 'GET',
        success: function (response) {
            let listaClasificacion = $('#lstClasificacion');

            $.each(response, function (index, clasificacion) {
                listaClasificacion.append('<option value="' + clasificacion.id + '">' + clasificacion.nombre + '</option>');
            });
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
        }
    })

})

$('#lstFacultad').on('change',function(){
    var facultad = $('#lstFacultad').val();

    $.ajax({
        url: urlDepAcad,
        type: 'GET',
        data: {
            idFa: facultad,
        },
        success: function (response) {
            let listaDepAcad = $('#lstDepAcad');
            listaDepAcad.empty();

            $.each(response, function (index, depAcad) {
                listaDepAcad.append('<option value="' + depAcad.id + '">' + depAcad.nombre + '</option>');
            });
        }
    })
})

$('#buscadorCursos').on('keyup', debounce(function () {
    var query = $(this).val();
    var depAcad = $('#lstDepAcad').val();

    if (query.length > 0) {
        $.ajax({
            url: urlAsignatura,
            type: 'GET',
            data: {
                idDep: depAcad,
                query: query
            },
            success: function (data) {
                var lstAsignaturas = $('#lstAsignaturas ul');
                lstAsignaturas.empty();

                if (data.length > 0) {
                    $.each(data, function (index, asignatura) {
                        lstAsignaturas.append('<li class="px-[1vw] py-[0.5vw] cursor-pointer hover:bg-gray-300" data-id=' + asignatura.id + '>' + asignatura.nombre + '</li>');
                    });
                    $('#lstAsignaturas').show();
                } else {
                    $('#lstAsignaturas').hide();
                }
            }
        });
    } else {
        $('#lstAsignaturas').hide();
    }
}, 500));

$(document).on('click', '#lstAsignaturas li', function () {
    var idAsignatura = $(this).data('id');
    $.ajax({
        url: urlGetAsignatura,
        type: 'GET',
        data: { id: idAsignatura },
        success: function (response) {
            var lstSelectAsig = $('#selectedCursos');
            lstSelectAsig.after(response.html);

            let cursoHtml = $(response.html);
            let hTeo = cursoHtml.find('#hTeo').text();
            let hPrac = cursoHtml.find('#hPrac').text();

            calcularHoras(hTeo, hPrac);
        }
    })
    $('#lstAsignaturas').hide();
});

$(document).on('click', '#deleteAsignatura', function(){
    hLectivas = "-" + $(this).parent().find('#hTeo').text();
    hNoLectivas = "-" + $(this).parent().find('#hPrac').text();
    calcularHoras(hLectivas, hNoLectivas);
    $(this).parent().remove();
})

$(document).on('click', '#btnCrearPlaza', function(){
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
        url: urlCrearPlaza,
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
            alert('Plaza Creada Correctamente');
            window.location.href = response.redirect;
        }
    })
})