

function closeForm(id){
    let window = document.getElementById(id);
    window.classList.toggle('hidden');
    window.classList.toggle('flex');
}


function formEditar(URLform){
    
    let window = document.getElementById('editActividadForm');
    window.classList.toggle('hidden');
    window.classList.toggle('flex');
    $.ajax({
        url: URLform,
        type: 'GET',
        success: function(response) {
            let textArea = $('#descripcion');
            textArea.val(response.descripcion);
            
            let inputId = $('#editFormId');
            inputId.val(response.id);
        }
    })
}

function closeFormEditar(){
    let window = document.getElementById('editActividadForm');
    window.classList.toggle('hidden');
    window.classList.toggle('flex');

    let textArea = document.getElementById('descripcion');
    textArea.value = "";
}

function openDetails(id){
    let window = document.getElementById(id);
    window.classList.toggle('max-h-0');
    window.classList.toggle('max-h-screen');
    window.classList.toggle('py-[1vw]');
    
}