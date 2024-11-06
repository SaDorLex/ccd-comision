<!DOCTYPE html>
<html>
    <head>
        <title>Plazas - Comision</title>
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
    </head>
@php
    $convActual = 0;
    $cont = 1;
@endphp
    <body class="overflow-x-hidden">
        <x-navBarTop />
        <div class="flex">
            <x-navBarLeft />
            <div class="w-[79vw] mb-[1vw]">
                <div class="w-fit my-[1vw] mx-auto text-[2vw] font-bold text-azul-univ">
                    Plazas
                </div>
                <div class="w-fit my-[1vw] ml-[1vw] flex gap-[0.5vw] items-center">
                    <form class="flex gap-[0.5vw] text-[1.2vw] items-center" action="{{ route('filtrarPlazas') }}" method="GET">
                        <p>Seleccionar<br>Convocatoria</p>
                        <select id="lstConvocatoria" name=" idConv"
                        class="h-fit my-auto px-[0.5vw] py-[0.3vw] text-[1.1vw] border-azul-univ border-[0.2vw] rounded-[1vw]">
                            <option disabled selected hidden>---</option>
                        </select>
                        <button id="filtrarPlazas" class="flex bg-azul-univ px-[0.6vw] py-[0.3vw] text-white rounded-[0.5vw] gap-[0.3vw] items-center">
                            <span class="material-symbols-outlined">search</span>
                            <p>Buscar</p>
                        </button>
                    </form>
                    <form action="{{ route('crearPlaza') }}" method="GET">
                        <button class="bg-lime-500 px-[0.4vw] py-[0.4vw] text-white font-bold rounded-[0.5vw] text-[1.2vw] flex transition-all ease-linear duration-500 hover:bg-lime-600">
                            <span class="material-symbols-outlined font-bold text-[1.7vw] my-auto">add</span>
                            <label class="ml-[0.3vw] my-auto cursor-pointer">Agregar</label>
                        </button>
                    </form>
                </div>
                <div class="w-[95%] my-[1vw] mx-auto grid font-bold text-[1.2vw] bg-gray-200 rounded-[0.3vw] py-[0.3vw] [grid-template-columns:1fr_1fr_1fr_1fr_1fr_1fr_1fr_1fr]">
                    <div class="m-auto">Id Conv.</div>
                    <div class="m-auto">Dep. Acad.</div>
                    <div class="m-auto">N° Plaza</div>
                    <div class="m-auto">H. Lectivas</div>
                    <div class="m-auto">H. no Lectivas</div>
                    <div class="m-auto">H. Semanales</div>
                    <div class="m-auto">Clasificación</div>
                    <div class="m-auto">Acciones</div>
                </div>
                @foreach($plazas as $plaza)
                    @if($plaza->id_convocatoria == $convActual)
                        <x-rowPlaza :plaza="$plaza" :nPlaza="$cont"/>
                        @php
                        $cont += 1;
                        @endphp
                    @else
                        @php
                        $convActual += 1;
                        $cont = 1
                        @endphp
                    @endif
                @endforeach
            </div>
        </div>
    </body>
    <script>
        var urlConvocatoria = '{{ route('listarConvocatorias') }} ';
        var urlFiltrarPlazas = '{{ route('filtrarPlazas') }}';
    </script>
    <script src="{{ asset('js/plazas.js') }}"></script>
    <script src="{{ asset('js/general.js') }}"></script>
</html>