<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard - Comision</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
    </head>
    <body class="overflow-x-hidden">
        <x-navBarTop />
        <div class="flex h-[80vh]">
            <x-navBarLeft />
            <div class="w-[79vw]">
                <div class="text-[1.8vw] mx-[1.5vw] my-[1vw] font-bold text-azul-pedro-600">
                    <p>Bienvenido, *Usuario*</p>
                </div>
                <div class="grid grid-cols-3 w-[95%] mx-auto gap-[1vw]">
                    <div class="mx-auto w-[18vw] bg-azul-pedro-600 h-auto text-[1.5vw] font-bold text-white px-[1.4vw] py-[1vw] rounded-[0.5vw]">
                        <div class="flex justify-between">
                            <p class="my-auto">{{ $cantC }}</p>
                            <span class="material-symbols-outlined my-auto text-[3vw]">list_alt</span>
                        </div>
                        <p>Convocatorias</p>
                    </div>
                    <div class="mx-auto w-[18vw] bg-[#7BD2E6] h-auto text-[1.5vw] font-bold text-white px-[1.4vw] py-[1vw] rounded-[0.5vw]">
                        <div class="flex justify-between">
                            <p class="my-auto">{{ $cantP }}</p>
                            <span class="material-symbols-outlined my-auto text-[3vw]">description</span>
                        </div>
                        <p>Plazas</p>
                    </div>
                    <div class="mx-auto w-[18vw] bg-[#747474] h-auto text-[1.5vw] font-bold text-white px-[1.4vw] py-[1vw] rounded-[0.5vw]">
                        <div class="flex justify-between">
                            <p class="my-auto">{{ $cantE }}</p>
                            <span class="material-symbols-outlined my-auto text-[3vw]">mail</span>
                        </div>
                        <p class="my-auto">Evaluaciones</p>
                    </div>
                    <div class="mx-auto w-[18vw] bg-azul-pedro-600 h-auto text-[1.5vw] font-bold text-white px-[1.4vw] py-[1vw] rounded-[0.5vw]">
                        <div class="flex justify-between">
                            <p class="my-auto">{{ $cantC }}</p>
                            <span class="material-symbols-outlined my-auto text-[3vw]">list_alt</span>
                        </div>
                        <p class="text-[1.3vw]">Convocatorias<br>Cerradas</p>
                    </div>
                    <div class="mx-auto w-[18vw] bg-[#7BD2E6] h-auto text-[1.5vw] font-bold text-white px-[1.4vw] py-[1vw] rounded-[0.5vw]">
                        <div class="flex justify-between">
                            <p class="my-auto">{{ $cantP }}</p>
                            <span class="material-symbols-outlined my-auto text-[3vw]">description</span>
                        </div>
                        <p class="text-[1.3vw]">Plazas<br>Cubiertas</p>
                    </div>
                    <div class="mx-auto w-[18vw] bg-[#747474] h-auto text-[1.5vw] font-bold text-white px-[1.4vw] py-[1vw] rounded-[0.5vw]">
                        <div class="flex justify-between">
                            <p class="my-auto">{{ $cantEC . ' de ' . $cantE }}</p>
                            <span class="material-symbols-outlined my-auto text-[3vw]">mail</span>
                        </div>
                        <p class="text-[1.3vw]">Evaluaciones<br>Completadas</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script type="module" src="{{asset('js/dashboard.js')}}"></script>    
</html>