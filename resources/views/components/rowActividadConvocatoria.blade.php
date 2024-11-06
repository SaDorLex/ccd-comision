<div id="{{ $actividad->id }}" class="grid [grid-template-columns:0.1fr_1fr_0.5fr_0.5fr] w-[80%] mx-auto text-[1.3vw] py-[0.5vw] border-t-[0.2vw] border-azul-univ actividades">
    <div class="m-auto">{{ $num }}</div>
    <div class="text-[1vw]">{{ $actividad->descripcion }}</div>
    <div class="m-auto"><input class="fecha_inicio" type="date" min="" max="" disabled></div>
    <div class="m-auto"><input class="fecha_termino" type="date" min="" max="" disabled></div>
</div>