
function inputFileClick(id) {
    input = document.getElementById(id);
    input.click();
}

$('#inputFile').on('change', function () {
    var fileName = $(this).val().split('\\').pop();
    $('#nombreArchivo').text(fileName);
});

$('#changeLastHour').on('click', function () {
    $.ajax({
        url: urlGetLastHour,
        type: 'GET',
        success: function (response) {
            if (response.Lunes == 1) {
                var dia = $('#btnLunes');
                changeDia(dia);
            }
            if (response.Martes == 1) {
                var dia = $('#btnMartes');
                changeDia(dia);
            }
            if (response.Miercoles == 1) {
                var dia = $('#btnMiercoles');
                changeDia(dia);
            }
            if (response.Jueves == 1) {
                var dia = $('#btnJueves');
                changeDia(dia);
            }
            if (response.Viernes == 1) {
                var dia = $('#btnViernes');
                changeDia(dia);
            }
            if (response.Sabado == 1) {
                var dia = $('#btnSabado');
                changeDia(dia);
            }
            if (response.Domingo == 1) {
                var dia = $('#btnDomingo');
                changeDia(dia);
            }

            $('#horaInicio').val(response.hora_inicio);
            $('#horaFin').val(response.hora_termino);
        }
    })
});

$(".dia").on('click', function () {
    var dia = $(this);
    var letter = $(this).find('p');
    dia.toggleClass('border-azul-univ');
    dia.toggleClass('border-[0.2vw]');
    dia.toggleClass('bg-azul-univ');
    letter.toggleClass('text-white');
    letter.toggleClass('text-azul-univ');
    var data = dia.data('id');
    var checkbox = $('#' + data);
    checkbox.prop('checked', !checkbox.prop('checked'));
});

$(function () {
    $.ajax({
        url: urlSemestreAcademico,
        type: 'GET',
        success: function (response) {
            let listaSemestres = $('#lstSemestres');

            $.each(response, function (index, semestre) {
                listaSemestres.append('<option value="' + semestre.id + '">' + semestre.nombre + '</option>')
            });
            var semestre = convocatoria.id_semestre;
            listaSemestres.val(semestre);
        }
    })
    if (convocatoria.horario.Lunes == 1) {
        var dia = $('#btnLunes');
        changeDia(dia);
    }
    if (convocatoria.horario.Martes == 1) {
        var dia = $('#btnMartes');
        changeDia(dia);
    }
    if (convocatoria.horario.Miercoles == 1) {
        var dia = $('#btnMiercoles');
        changeDia(dia);
    }
    if (convocatoria.horario.Jueves == 1) {
        var dia = $('#btnJueves');
        changeDia(dia);
    }
    if (convocatoria.horario.Viernes == 1) {
        var dia = $('#btnViernes');
        changeDia(dia);
    }
    if (convocatoria.horario.Sabado == 1) {
        var dia = $('#btnSabado');
        changeDia(dia);
    }
    if (convocatoria.horario.Domingo == 1) {
        var dia = $('#btnDomingo');
        changeDia(dia);
    }
    $('#horaInicio').val(convocatoria.horario.hora_inicio);
    $('#horaFin').val(convocatoria.horario.hora_termino);
});

function changeDia(dia) {
    dia.removeClass('border-azul-univ');
    dia.removeClass('border-[0.2vw]');
    dia.addClass('bg-azul-univ');
    var letter = dia.find('p');
    letter.addClass('text-white');
    letter.removeClass('text-azul-univ');
    var data = dia.data('id');
    var checkbox = $('#' + data);
    checkbox.prop('checked', true);
}

$('#btnEditarConvocatoria').on('click', function(){
    let idActividades = [];
    let fechas_inicio = [];
    let fechas_termino = [];
    let diasDispo = [];

    let actividades = $('.actividades');
    let dias = $('.diaCheck');
    
    actividades.each(function(index){
        let id = $(this).attr('id');
        idActividades.push(id);
        let valFechaInicio = $(this).find('.fecha_inicio').val();
        let valFechaTermino = $(this).find('.fecha_termino').val();
        fechas_inicio.push(valFechaInicio);
        fechas_termino.push(valFechaTermino);
    })
    
    dias.each(function(index){
        let selected = $(this).prop('checked');
        diasDispo.push(selected);
    });

    let vefDias = diasDispo.some(elemento => elemento === true);

    if(!vefDias){
        alert('Seleccione al menos un Día de Atención');
        return;
    }

    if(fechas_inicio.includes("") || fechas_termino.includes("")){
        alert("Complete las fechas en el Cronograma");
        return;
    }

    let semestre = $('#lstSemestres').val();
    let fechaInicio = $('#fecha_inicio').val();
    let fechaTermino = $('#fecha_termino').val();
    let horaInicio = $('#horaInicio').val();
    let horaTermino = $('#horaFin').val();
    let fileBases = $('#inputFile')[0].files[0];
    let pago = $('input[name="respuesta"]:checked').val();
    let comentario = $('#comentarios').val();

    let formData = new FormData();

    formData.append('_token', token);
    formData.append('semestre', semestre);
    formData.append('fechaInicio', fechaInicio);
    formData.append('fechaTermino', fechaTermino);
    formData.append('horaInicio', horaInicio);
    formData.append('horaFin', horaTermino);
    formData.append('fileBases', fileBases);
    formData.append('pago', pago);
    formData.append('comentarios', comentario);
    
    idActividades.forEach(function(id,index){
        formData.append('idActividades[]', id);
        formData.append('fechas_inicio[]', fechas_inicio[index]);
        formData.append('fechas_termino[]', fechas_termino[index]);
    });

    diasDispo.forEach(function(id,index){
        formData.append('diasAtencion[]', diasDispo[index]);
    });

    $.ajax({
        url: urlEditarConvocatoria,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response){
            alert('Convocatoria Actualizada Correctamente');
            window.location.href = response.redirect;
        }
    });
});

$(function(){
    const today = new Date();
    const formatedToday = today.toISOString().split('T')[0];
    $('#fecha_inicio').attr('min', formatedToday);
});

$('#fecha_inicio').on('change', function(){
    let fechaInicio = $(this).val();
    $('#fecha_termino').attr('min',fechaInicio);
    $('#fecha_termino').removeAttr('disabled');

    let actividad = $('.actividades').first();
    actividad.find('input').val(fechaInicio);

    let actividades = $('.actividades');
    actividades.each(function(index){
        $(this).find('input').attr('min',fechaInicio);
    });
});

$('#fecha_termino').on('change',function(){
    let fechaTermino = $(this).val();
    let actividades = $('.actividades');
    actividades.each(function(index){
        $(this).find('input').attr('max',fechaTermino);
        $(this).find('input').removeAttr('disabled');
    });

    actividades.last().find('input').val(fechaTermino);
})