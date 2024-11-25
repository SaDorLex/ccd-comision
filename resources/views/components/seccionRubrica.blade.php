<div class="grid first:rounded-t-[1vw] last:rounded-b-[1vw] [grid-template-columns:1fr_0.2fr_0.3fr] bg-azul-pedro-200 w-[95%] mx-auto text-black text-[1.2vw] py-[0.6vw]">
    <div class="mx-auto">{{$rubro->nombre}}</div>
    <div class="mx-auto">{{$rubro->puntaje}}</div>
    <div class="grid grid-cols-3">
        <span onclick="toggleForm(this)" class="material-symbols-outlined text-lime-600 w-fit mx-auto cursor-pointer" title="Añadir Sección">add</span>
        <span onclick="" class="material-symbols-outlined text-amber-600 w-fit mx-auto cursor-pointer" title="Editar">edit</span>
        <span onclick="" class="material-symbols-outlined text-red-600 w-fit mx-auto cursor-pointer" title="Eliminar">delete</span>
    </div>
    <form action="" method="POST" class="[grid-column:1/-1] hidden grid grid-cols-3 gap-[1vw] text-[1.2vw] w-full mx-auto bg-gray-50 px-[1vw] py-[2vw]">
        @csrf
        <div class="mx-auto">
            <p class="my-auto">Nombre Sección:</p>
            <input name="nombre" placeholder="Nombre" class="px-[0.6vw] bg-gray-200 rounded-[0.5vw]" type="text">
        </div>
        <div class="mx-auto">
            <p class="my-auto">Puntaje Máximo:</p>
            <input name="puntaje" placeholder="Puntaje Máximo" class="px-[0.6vw] bg-gray-200 rounded-[0.5vw]" type="text">
        </div>
        <button class="bg-lime-500 text-white font-bold px-[0.8vw] py-[0.4vw] rounded-[0.5vw] w-fit mx-auto transition-all duration-300 ease-linear hover:bg-lime-700">Agregar</button>
    </form>
</div>