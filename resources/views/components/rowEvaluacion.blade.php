<div class="w-[95%] my-[1vw] mx-auto grid font-medium text-[1.1vw] border-b-[1px] border-gray-300 rounded-[0.3vw] py-[0.3vw] [grid-template-columns:0.5fr_1fr_0.5fr_1fr_0.5fr_1fr] text-center">
    <div class="m-auto">{{ $evaluacion->id_plaza }}</div>
    <div class="m-auto">{{ $evaluacion->postulante->apellido_paterno . " " . $evaluacion->postulante->apellido_materno . " " . $evaluacion->postulante->nombres  }}</div>
    <div class="m-auto">{{ $evaluacion->pago->numero_vaucher }}</div>
    <div class="m-auto">{{ $evaluacion->observacion }}</div>
    <div class="m-auto">{{ $evaluacion->puntaje_total }}</div>
    <div class="m-auto">
        @if ($evaluacion->estado == 1)
            <form action="{{ route('evaluar', $evaluacion->id) }}">
            <button class="bg-azul-univ text-white px-[0.4vw] py-[0.2vw] rounded-[0.5vw] transition-all duration-300 ease-linear hover:bg-azul-pedro-800">Evaluar</button>
            </form>    
        @else
            <button class="bg-azul-pedro-800 text-white px-[0.4vw] py-[0.2vw] rounded-[0.5vw] transition-all duration-300 ease-linear" disabled>Evaluado</button>
        @endif
    </div>
</div>