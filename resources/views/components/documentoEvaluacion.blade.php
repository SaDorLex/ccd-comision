<div class=" text-[1.4vw] my-[0.8vw] w-full grid [grid-template-columns:0.1fr_1fr_0.3fr_0.4fr]">
    <div class="m-auto">{{ $item->id }}</div>
    <div class="">{{ $item->requisito->itemArchivo->nombre }}</div>
    <a class="m-auto text-blue-900 hover:underline hover:decoration-1" href="{{ asset('archivos/' . $item->nombre) }}" target="_blank">Ver</a>
    @if ($item->estado == 1)
    <div id="actions-{{$item->id}}" class="m-auto text-[1.2vw] grid grid-cols-2 gap-[0.5vw]">
        <button onclick="aceptarArchivo({{$item->id}})"
            class="text-lime-500 border-lime-500 rounded-[0.5vw] border-[0.2vw] px-[0.2vw] transition-all duration-300 ease-linear hover:bg-lime-500 hover:text-white">Aceptar</button>
        <div class="relative">
            <button onclick="openAgregarComentarios({{$item->id}})"
                class="text-red-500 border-red-500 rounded-[0.5vw] border-[0.2vw] px-[0.2vw] transition-all duration-300 ease-linear hover:bg-red-500 hover:text-white relative">
                Rechazar
            </button>
            <div id="window-file-{{$item->id}}"
                class="w-[20vw] border-[0.2vw] border-red-600 rounded-[1vw] absolute
            bg-white p-[1vw] left-[-10vw] top-[-12vw] hidden flex-col">
                <div class="grid [grid-template-columns:1fr_0.1fr]">
                    <div class="mb-[0.5vw]">Agrega Comentarios:</div>
                    <button onclick="closeAgregarComentarios({{$item->id}})"><span class="material-symbols-outlined">close</span></button>
                </div>
                <textarea id="comentario-file-{{$item->id}}" class="w-full border-[0.15vw] resize-none px-[0.5vw]"></textarea>
                <button onclick="rechazarArchivo({{$item->id}})"
                    class="text-red-500 w-fit mt-[1vw] ml-auto mr-0 border-red-500 rounded-[0.5vw] border-[0.2vw] px-[0.2vw] transition-all duration-300 ease-linear hover:bg-red-500 hover:text-white">Listo</button>
            </div>
        </div>
    </div>
    @else
    <div class="m-auto text-[1.2vw] gap-[0.5vw]">Revisado</div>
    @endif
</div>
