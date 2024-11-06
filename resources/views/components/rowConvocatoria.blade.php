@php
    $nPlaza = 1;
@endphp
<div
    class="w-[95%] my-[1vw] mx-auto grid font-medium text-[1.1vw] text-center border-b-[1px] border-gray-300 rounded-[0.3vw] py-[0.3vw] [grid-template-columns:0.5fr_0.5fr_1fr_1fr_1fr_0.5fr_0.5fr_1fr]">
    <div class="m-auto">{{ $convocatoria->id }}</div>
    <div class="m-auto">{{ $convocatoria->semestreAcademico->nombre }}</div>
    <div class="m-auto grid grid-cols-3">
        <div>{{ $convocatoria->horario->hora_inicio }}</div>
        <div>-</div>
        <div>{{ $convocatoria->horario->hora_termino }}</div>
    </div>
    <div class="m-auto">{{ $convocatoria->fecha_inicio }}</div>
    <div class="m-auto">{{ $convocatoria->fecha_termino }}</div>
    <div class="m-auto">
        <a href="{{ $convocatoria->base }}" target="_blank">
            <span class="material-symbols-outlined text-red-600 text-[2vw]">picture_as_pdf</span>
        </a>
    </div>
    <div class="m-auto">{{ $convocatoria->estado_pago }}</div>
    <div class="m-auto">
        <a class="cursor-pointer" onclick="openDetails('open{{ $convocatoria->id }}')">Detalles</a>
    </div>
</div>
<div id="open{{ $convocatoria->id }}"
    class="bg-gray-200 w-[95%] mx-auto rounded-[1vw] max-h-0 overflow-hidden transition-all duration-300 ease-linear">
    <div class="text-[1.2vw] text-azul-univ font-bold w-fit mx-auto border-b-2 border-azul-univ">
        Detalles
    </div>
    <div class="grid [grid-template-columns:1fr_1fr] my-[2vw] w-[90%] mx-auto">
        <div class="grid gap-[1vw]">
            <div class="m-auto text-azul-univ font-bold text-[1.5vw]">
                Días de Atención
            </div>
            <div class=" w-fit m-auto grid gap-[1vw] [grid-template-columns:1fr_1fr_1fr_1fr_1fr_1fr_1fr]">
                @if($convocatoria->horario->Lunes == 1)
                <div class="w-[3vw] h-[3vw] bg-azul-univ flex rounded-[0.5vw]">
                    <label class="m-auto text-[1.5vw] font-bold text-white">L</label>
                </div>
                @else
                <div class="w-[3vw] h-[3vw] flex rounded-[0.5vw] border-azul-univ border-[0.2vw]">
                    <label class="m-auto text-[1.5vw] font-bold text-azul-univ">L</label>
                </div>
                @endif
                @if($convocatoria->horario->Martes == 1)
                <div class="w-[3vw] h-[3vw] bg-azul-univ flex rounded-[0.5vw]">
                    <label class="m-auto text-[1.5vw] font-bold text-white">M</label>
                </div>
                @else
                <div class="w-[3vw] h-[3vw] flex rounded-[0.5vw] border-azul-univ border-[0.2vw]">
                    <label class="m-auto text-[1.5vw] font-bold text-azul-univ">M</label>
                </div>
                @endif
                @if($convocatoria->horario->Miercoles == 1)
                <div class="w-[3vw] h-[3vw] bg-azul-univ flex rounded-[0.5vw]">
                    <label class="m-auto text-[1.5vw] font-bold text-white">M</label>
                </div>
                @else
                <div class="w-[3vw] h-[3vw] flex rounded-[0.5vw] border-azul-univ border-[0.2vw]">
                    <label class="m-auto text-[1.5vw] font-bold text-azul-univ">M</label>
                </div>
                @endif
                @if($convocatoria->horario->Jueves == 1)
                <div class="w-[3vw] h-[3vw] bg-azul-univ flex rounded-[0.5vw]">
                    <label class="m-auto text-[1.5vw] font-bold text-white">J</label>
                </div>
                @else
                <div class="w-[3vw] h-[3vw] flex rounded-[0.5vw] border-azul-univ border-[0.2vw]">
                    <label class="m-auto text-[1.5vw] font-bold text-azul-univ">J</label>
                </div>
                @endif
                @if($convocatoria->horario->Viernes == 1)
                <div class="w-[3vw] h-[3vw] bg-azul-univ flex rounded-[0.5vw]">
                    <label class="m-auto text-[1.5vw] font-bold text-white">V</label>
                </div>
                @else
                <div class="w-[3vw] h-[3vw] flex rounded-[0.5vw] border-azul-univ border-[0.2vw]">
                    <label class="m-auto text-[1.5vw] font-bold text-azul-univ">V</label>
                </div>
                @endif
                @if($convocatoria->horario->Sabado == 1)
                <div class="w-[3vw] h-[3vw] bg-azul-univ flex rounded-[0.5vw]">
                    <label class="m-auto text-[1.5vw] font-bold text-white">S</label>
                </div>
                @else
                <div class="w-[3vw] h-[3vw] flex rounded-[0.5vw] border-azul-univ border-[0.2vw]">
                    <label class="m-auto text-[1.5vw] font-bold text-azul-univ">S</label>
                </div>
                @endif
                @if($convocatoria->horario->Domingo == 1)
                <div class="w-[3vw] h-[3vw] bg-azul-univ flex rounded-[0.5vw]">
                    <label class="m-auto text-[1.5vw] font-bold text-white">D</label>
                </div>
                @else
                <div class="w-[3vw] h-[3vw] flex rounded-[0.5vw] border-azul-univ border-[0.2vw]">
                    <label class="m-auto text-[1.5vw] font-bold text-azul-univ">D</label>
                </div>
                @endif
            </div>
        </div>
        <div class="grid gap-[1vw]">
            <div class="m-auto text-azul-univ font-bold text-[1.5vw]">
                Comentarios
            </div>
            <div class="flex">
                <textarea class="w-full border-azul-univ border-[0.2vw] rounded-[0.5vw] px-[0.4vw] py-[0.2vw] resize-none h-[5vw]"
                    disabled>{{ $convocatoria->comentarios }}</textarea>
            </div>
        </div>
    </div>
    <div class="w-[90%] m-auto bg-white rounded-[0.5vw] py-[0.5vw] my-[2vw]">
        <div class="w-fit m-auto text-azul-univ font-bold text-[1.5vw]">Plazas</div>
        <div class="w-[95%] mx-auto grid [grid-template-columns:1fr_1fr_1fr_1fr_1fr_1fr] text-center border-b-[0.2vw] border-azul-univ">
            <div class="  py-[0.5vw]">N° Plaza</div>
            <div class="  py-[0.5vw]">Dep. Acad.</div>
            <div class="  py-[0.5vw]">H. Lectivas</div>
            <div class="  py-[0.5vw]">H. no Lectivas</div>
            <div class="  py-[0.5vw]">H. Semanales</div>
            <div class=" py-[0.5vw]">Clasificación</div>
        </div>
        @foreach ($convocatoria->plazas as $item)
            <x-rowPlazaConvocatoria :plaza="$item" :nPlaza="$nPlaza"/>
            @php
                $nPlaza += 1;
            @endphp
        @endforeach
    </div>
    <div class="flex justify-end mr-[1vw] gap-[1vw]">
        <form action="{{ route('editarConvocatoria', $convocatoria->id) }}" method="GET">
            <button
                class="bg-amber-500 text-white px-[0.4vw] py-[0.4vw] font-bold rounded-[0.5vw] text-[1.2vw] flex transition-all ease-linear duration-500 hover:bg-amber-600">
                <span class="material-symbols-outlined text-[2vw] my-auto">edit</span>
                <label class="my-auto">Editar</label>
            </button>
        </form>
        <form action="{{ route('deleteConvocatoria', $convocatoria->id) }}" method="POST">
            @csrf
            <button
                class="bg-red-500 text-white px-[0.4vw] py-[0.4vw] font-bold rounded-[0.5vw] text-[1.2vw] flex transition-all ease-linear duration-500 hover:bg-red-700">
                <span class="material-symbols-outlined text-[2vw] my-auto">delete</span>
                <label class="my-auto">Eliminar</label>
            </button>
        </form>
    </div>
</div>
