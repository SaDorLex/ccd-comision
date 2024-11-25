function mostrarForm(){
    let form = $('#formAgregarRubro');
    form.toggleClass('grid');
    form.toggleClass('hidden');
}

$('#btnEvMerito').on('click', function(){
    $.ajax({
        url: urlListarPorMeritos,
        type: 'GET',
        success: function(response){
            $('#EvaluacionMeritos').html(response.html);
        }
    });
})

$('#btnEvDes').on('click', function(){
    $.ajax({
        url: urlListarPorDesempeño,
        type: 'GET',
        success: function(response){
            $('#EvaluacionDesempeño').html(response.html);
        }
    });
});

$(function () {
    // Evento para manejar el clic en los botones de pestañas
    $('.tab-button').on('click', function () {
      // Remover clases activas de todos los botones
      $('.tab-button').removeClass('text-blue-500 border-b-2 border-blue-500 font-semibold');
      // Agregar clases activas al botón clickeado
      $(this).addClass('text-blue-500 border-b-2 border-blue-500 font-semibold');

      // Ocultar todos los contenidos de pestañas
      $('.tab-content').addClass('hidden');
      // Mostrar el contenido asociado al botón clickeado
      const activeTab = $(this).data('tab');
      $('#' + activeTab).removeClass('hidden');
    });
  });

function toggleForm(button){
    var form = $(button).closest('div').next('form');
    form.toggleClass('hidden');
}