<!DOCTYPE html>
<html>
    <head>
        <title>Evaluaciones - Comision</title>
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
    </head>
    <body class="overflow-x-hidden">
        <x-navBarTop />
        <div class="flex h-[80vh]">
            <x-navBarLeft />
            <div class="w-[79vw]">
                <div class="w-fit my-[1vw] mx-auto text-[2vw] font-bold text-azul-univ">
                    Evaluaciones
                </div>
                <div class="w-fit my-[1vw] ml-[1vw] flex gap-[0.5vw] items-center">
                    <form class="flex gap-[1vw] text-[1.2vw] items-center" action="{{ route('buscarEvaluacion') }}" method="GET">
                        <p>Seleccionar<br>Convocatoria</p>
                        <select id="lstConvocatoria" name=" idConv"
                        class="h-fit my-auto px-[0.5vw] py-[0.3vw] text-[1.1vw] border-azul-univ border-[0.2vw] rounded-[1vw]">
                            <option disabled selected hidden>---</option>
                        </select>
                        <p>Seleccionar<br>Plaza</p>
                        <select id="lstPlaza" name=" idPlaza"
                        class="h-fit my-auto px-[0.5vw] py-[0.3vw] text-[1.1vw] border-azul-univ border-[0.2vw] rounded-[1vw]">
                            <option disabled selected hidden>---</option>
                        </select>
                        <button id="buscarEvaluacion" class="flex bg-azul-univ px-[0.6vw] py-[0.3vw] text-white rounded-[0.5vw] gap-[0.3vw] items-center">
                            <span class="material-symbols-outlined">search</span>
                            <p>Buscar</p>
                        </button>
                    </form>
                </div>
                <div class="w-[95%] my-[1vw] mx-auto grid font-bold text-[1.2vw] bg-gray-200 rounded-[0.3vw] py-[0.3vw] [grid-template-columns:0.5fr_1fr_0.5fr_1fr_0.5fr_1fr]">
                    <div class="m-auto">Id Plaza</div>
                    <div class="m-auto">Postulante</div>
                    <div class="m-auto">N° Voucher</div>
                    <div class="m-auto">Observación</div>
                    <div class="m-auto">Puntaje Total</div>
                    <div class="m-auto">Acciones</div>
                </div>
                @foreach($evaluaciones as $evaluacion)
                    <x-rowEvaluacion :evaluacion="$evaluacion" />
                @endforeach
            </div>
        </div>
    </body>
    <script src="{{ asset('js/evaluaciones.js') }}"></script>
    <script>
        var urlConvocatoria = '{{ route('listarConvocatorias') }} ';
        var urlLstPlazas = '{{route('listarPlazas')}}';
    </script>
</html>