<div id="cursoSelected" data-cursoId="{{ $asignatura->id }}" class="mx-auto my-[0.5vw] grid [grid-template-columns:1fr_1fr_1fr_1fr_0.5fr] w-[90%] font-normal text-center text-[1.1vw]">
    <div class="w-fit m-auto">{{ $asignatura->codigo }}</div>
    <div class="w-fit m-auto">{{ $asignatura->nombre }}</div>
    <div id="hTeo" class="w-fit m-auto">{{ $asignatura->horas_teoricas }}</div>
    <div id="hPrac" class="w-fit m-auto">{{ $asignatura->Horas_practicas }}</div>
    <div class="w-fit m-auto" id="deleteAsignatura">
        <span class="material-symbols-outlined text-red-600 cursor-pointer" >close</span>
    </div>
</div>