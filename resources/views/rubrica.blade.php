<!DOCTYPE html>
<html>

<head>
    <title>Rúbrica - Comision</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
</head>

<body class="overflow-x-hidden">
    <x-navBarTop />
    <div class="flex h-[80vh]">
        <x-navBarLeft />
        <div class="w-[79vw]">
            <div class="text-[2vw] text-azul-pedro-600 font-bold text-center my-[1vw]">
                Rúbrica
            </div>
            <div class="w-[95%] mx-auto my-[1vw]">
                <button onclick="mostrarForm()"
                    class="flex gap-[0.3vw] text-[1.2vw] bg-lime-500 text-white font-bold px-[0.8vw] py-[0.4vw] rounded-[0.5vw] transition-all duration-300 ease-linear hover:bg-lime-700">
                    <p>Agregar Seccion</p>
                    <span class="material-symbols-outlined my-auto">add</span>
                </button>
            </div>
            <form id="formAgregarRubro" class="grid [grid-template-columns:0.3fr_1fr] gap-[1vw] text-[1.2vw] w-fit mx-auto my-[1vw]">
                <p class="my-auto">Nombre:</p>
                <input name="nombre" placeholder="Nombre" class="px-[0.6vw] bg-gray-200 rounded-[0.5vw] w-[30vw]" type="text">
                <p class="my-auto">Puntaje Máximo:</p>
                <input name="nombre" placeholder="Puntaje Máximo" class="px-[0.6vw] bg-gray-200 rounded-[0.5vw] w-[30vw]" type="text">
                <p class="my-auto">Tipo:</p>
                <input name="nombre" placeholder="Tipo de Evaluacion" class="px-[0.6vw] bg-gray-200 rounded-[0.5vw] w-[30vw]" type="text">
                <button class="bg-lime-500 text-white font-bold px-[0.8vw] py-[0.4vw] rounded-[0.5vw] transition-all duration-300 ease-linear hover:bg-lime-700">Agregar</button>
            </form>
        </div>
    </div>
</body>
<script src="{{asset('js/rubro.js')}}"></script>

</html>
