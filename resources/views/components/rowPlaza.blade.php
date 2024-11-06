<div class="w-[95%] my-[1vw] mx-auto grid font-medium text-[1.1vw] text-center border-b-[1px] border-gray-300 rounded-[0.3vw] py-[0.3vw] [grid-template-columns:1fr_1fr_1fr_1fr_1fr_1fr_1fr_1fr]">
    <div class="m-auto">{{ $plaza->id_convocatoria }}</div>
    @if (count($plaza->asignaturas) > 0)
    <div class="m-auto">{{ $plaza->asignaturas->first()->depAcad->nombre }}</div>
    @else
    <div class="m-auto">Plaza sin Asignaturas</div>
    @endif
    <div class="m-auto">{{ $nPlaza }}</div>
    <div class="m-auto">{{ $plaza->horas_lectivas }}</div>
    <div class="m-auto">{{ $plaza->horas_no_lectivas }}</div>
    <div class="m-auto">{{ $plaza->horas_semanales }}</div>
    <div class="m-auto">{{ $plaza->clasificacion->nombre }}</div>
    <div class="m-auto">
        <a class="cursor-pointer" onclick="openDetails('open{{ $plaza->id }}')">Detalles</a>
    </div>
</div>
<div id="open{{ $plaza->id }}" class="bg-gray-200 w-[95%] mx-auto rounded-[1vw] max-h-0 overflow-hidden transition-all duration-300 ease-linear">
    <div class="text-[1.2vw] text-azul-univ font-bold w-fit mx-auto border-b-2 border-azul-univ">
        Asignaturas
    </div>
    <div class="grid my-[1vw] text-[1.1vw] [grid-template-columns:1fr_1fr_1fr_1fr] font-bold">
        <div class="m-auto">Código</div>
        <div class="m-auto">Nombre</div>
        <div class="m-auto">Horas Teóricas</div>
        <div class="m-auto">Horas Prácticas</div>
    </div>
    @php
        $asignaturas = $plaza->asignaturas;    
    @endphp
    @foreach($asignaturas as $asignatura)
        <x-rowCurso :asignatura="$asignatura"/>
    @endforeach
    <div class="grid mx-[1vw] [grid-template-columns:0.5fr_2fr] py-[0.5vw] ">
        <div class="text-[1.2vw] text-azul-univ font-bold w-fit m-auto border-b-2 border-azul-univ">
            Requisitos
        </div>
        <div class="text-center text-[1.2vw]">
            {{ $plaza->requisitos_descripcion }}
        </div>
    </div>
    <div class="flex justify-end mr-[1vw] gap-[1vw]">
    <form action="{{ route('editarPlaza', $plaza->id) }}" method="GET">
        <button class="bg-amber-500 text-white px-[0.4vw] py-[0.4vw] font-bold rounded-[0.5vw] text-[1.2vw] flex transition-all ease-linear duration-500 hover:bg-amber-600">
            <span class="material-symbols-outlined text-[2vw] my-auto">edit</span>
            <label class="my-auto">Editar</label>
        </button>
    </form>
    <form action="{{ route('deletePlaza', $plaza->id) }}" method="POST">
        @csrf
        <button class="bg-red-500 text-white px-[0.4vw] py-[0.4vw] font-bold rounded-[0.5vw] text-[1.2vw] flex transition-all ease-linear duration-500 hover:bg-red-700">
            <span class="material-symbols-outlined text-[2vw] my-auto">delete</span>
            <label class="my-auto">Eliminar</label>
        </button>
    </form>
    </div>
</div>