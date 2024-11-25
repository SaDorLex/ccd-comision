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
            <form id="formAgregarRubro" action="{{route('storeRubrica')}}" method="POST" class="hidden grid-cols-4 gap-[1vw] text-[1.2vw] w-fit mx-auto my-[1vw] bg-gray-100 px-[1vw] py-[2vw] rounded-[1vw]">
                @csrf
                <div>
                    <p class="my-auto">Nombre Sección:</p>
                    <input name="nombre" placeholder="Nombre" class="px-[0.6vw] bg-gray-200 rounded-[0.5vw]" type="text">
                </div>
                <div>
                    <p class="my-auto">Puntaje Máximo:</p>
                <input name="puntaje" placeholder="Puntaje Máximo" class="px-[0.6vw] bg-gray-200 rounded-[0.5vw]" type="text">
                </div>
                <div>
                    <p class="my-auto">Tipo de Evaluación:</p>
                    <select name="tipo" id="tipo">
                        <option default selected hidden>---</option>
                        <option value="0">Méritos</option>
                        <option value="1">Desempeño Docente</option>
                    </select>
                </div>
                <button class="bg-lime-500 text-white font-bold px-[0.8vw] py-[0.4vw] rounded-[0.5vw] w-fit mx-auto transition-all duration-300 ease-linear hover:bg-lime-700">Agregar</button>
            </form>
            <div class="w-[95%] mx-auto grid grid-cols-2 text-[1.3vw] bg-gray-200 rounded-[1vw] text-center">
                <div id="btnEvMerito" data-tab="EvaluacionMeritos" class="tab-button px-[1vw] py-[1vw] hover:bg-gray-400 cursor-pointer hover:rounded-s-[1vw]">
                    Evaluación de Méritos
                </div>
                <div id="btnEvDes" data-tab="EvaluacionDesempeño" class="tab-button px-[1vw] py-[1vw] hover:bg-gray-400 cursor-pointer hover:rounded-e-[1vw]">
                    Evaluación de Clase Desempeño Docente
                </div>
            </div>
            <div class="grid [grid-template-columns:1fr_0.2fr_0.3fr] my-[1vw] bg-azul-pedro-400 w-[95%] mx-auto text-white text-[1.2vw] font-bold py-[0.6vw] rounded-[1vw]">
                <div class="mx-auto">Nombre</div>
                <div class="mx-auto">Puntaje Máximo</div>
                <div class="mx-auto">Acciones</div>
            </div>
            <div id="EvaluacionMeritos" class="tab-content">
            </div>
            <div id="EvaluacionDesempeño" class=" tab-content hidden">

            </div>
        </div>
    </div>
</body>
<script>
    var urlListarPorMeritos = "{{route('listarPorMeritos')}}";
    var urlListarPorDesempeño = "{{route('listarPorDesempeño')}}";
</script>
<script src="{{asset('js/rubro.js')}}"></script>

</html>
