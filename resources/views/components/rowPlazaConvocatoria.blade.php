<div class="w-[95%] mx-auto grid [grid-template-columns:1fr_1fr_1fr_1fr_1fr_1fr] text-center">
    <div class="py-[0.5vw] m-auto">{{ $nPlaza }}</div>
    @if (count($plaza->asignaturas) > 0)
    <div class="m-auto">{{ $plaza->asignaturas->first()->depAcad->nombre }}</div>
    @else
    <div class="m-auto">Plaza sin Asignaturas</div>
    @endif
    <div class="py-[0.5vw] m-auto ">{{ $plaza->horas_lectivas }}</div>
    <div class="py-[0.5vw] m-auto ">{{ $plaza->horas_no_lectivas }}</div>
    <div class="py-[0.5vw] m-auto">{{ $plaza->horas_semanales }}</div>
    <div class="py-[0.5vw] m-auto">{{ $plaza->clasificacion->nombre }}</div>
</div>