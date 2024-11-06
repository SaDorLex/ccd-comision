<!DOCTYPE html>
<html>
    <head>
        <title>Convocatorias - Comision</title>
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
                    Convocatorias
                </div>
                <div class="w-fit my-[1vw] ml-[1vw] flex gap-[0.5vw] items-center">
                    <form action="{{ route('crearConvocatoria') }}" method="GET">
                        <button class="bg-lime-500 px-[0.4vw] py-[0.4vw] text-white font-bold rounded-[0.5vw] text-[1.2vw] flex transition-all ease-linear duration-500 hover:bg-lime-600">
                            <span class="material-symbols-outlined font-bold text-[1.7vw] my-auto">add</span>
                            <label class="ml-[0.3vw] my-auto cursor-pointer">Agregar</label>
                        </button>
                    </form>
                </div>
                <div class="w-[95%] my-[1vw] mx-auto grid font-bold text-[1.2vw] bg-gray-200 rounded-[0.3vw] py-[0.3vw] [grid-template-columns:0.5fr_0.5fr_1fr_1fr_1fr_0.5fr_0.5fr_1fr]">
                    <div class="m-auto">Id</div>
                    <div class="m-auto">Semestre</div>
                    <div class="m-auto">Atención</div>
                    <div class="m-auto">F. Inicio</div>
                    <div class="m-auto">F. Término</div>
                    <div class="m-auto">Bases</div>
                    <div class="m-auto">Pago</div>
                    <div class="m-auto">Acciones</div>
                </div>
                @foreach($convocatorias as $convocatoria)
                    <x-rowConvocatoria :convocatoria="$convocatoria" />
                @endforeach
            </div>
        </div>
    </body>
    <script src="{{ asset('js/general.js') }}"></script>
</html>