let comentarios;

function openAgregarComentarios(id){
    let window = $('#window-file-' + id);
    window.addClass('flex');
    window.removeClass('hidden');
}

function closeAgregarComentarios(id){
    let window = $('#window-file-' + id);
    window.removeClass('flex');
    window.addClass('hidden');
}

function aceptarArchivo(id){
    $.ajax({
        url: urlAceptarArchivo,
        method: 'POST',
        data: {
            _token: token,
            id:id
        },
        success: function(response){
            let buttons = $('#actions-' + id);
            buttons.after('<div class="m-auto text-[1.2vw] gap-[0.5vw]">Revisado<div>')
            buttons.removeClass('grid');
            buttons.addClass('hidden');
        }
    })
}

function rechazarArchivo(id){
    let comentario = $('#comentario-file-' + id).val();
    console.log(comentario);
    comentarios = comentarios + '<br>' + comentario;
    aceptarArchivo(id);
}
