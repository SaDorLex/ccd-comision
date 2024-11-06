<!DOCTYPE html>
<html>
    <head>
        <title>Actividades - Comision</title>
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
    </head>
    <body class="overflow-x-hidden">
        <div id="crearActividadForm" class="hidden bg-black bg-opacity-25 w-full h-full fixed">
            <div class="bg-white w-[30vw] m-auto rounded-[1vw] border-2 border-azul-univ flex flex-col relative">
                <button onclick="closeForm('crearActividadForm')" class="w-fit absolute right-1 top-1">
                    <span class="material-symbols-outlined text-azul-univ">close</span>
                </button>
                <form class="flex flex-col" method="POST" action="{{ route('crearActividad') }}">
                    @csrf
                    <div class="mx-auto w-fit text-[1.8vw] my-[1vw] font-bold text-azul-univ ">
                        Crear Actividad
                    </div>
                    <div class="my-[0.5vw] mx-[1.5vw] font-bold flex flex-col text-[1.2vw] text-gray-600">
                        <p>Descripción</p>
                        <textarea name="descripcion" class="border-2 border-azul-univ rounded-[1vw] my-[1vw] px-[0.5vw] font-normal resize-none"></textarea>
                    </div>
                    <button type="submit" class="bg-lime-500 w-fit mx-auto mb-[1vw] px-[0.5vw] py-[0.4vw] text-white font-bold rounded-[0.5vw] transition-all duration-500 ease-linear hover:bg-lime-600">
                        Crear Actividad
                    </button>
                </form>
            </div>
        </div>
        <div id="editActividadForm" class="hidden bg-black bg-opacity-25 w-full h-full fixed">
            <div class="bg-white w-[30vw] m-auto rounded-[1vw] border-2 border-azul-univ flex flex-col relative">
                <button onclick="closeFormEditar()" class="w-fit absolute right-1 top-1">
                    <span class="material-symbols-outlined text-azul-univ">close</span>
                </button>
                <form class="flex flex-col" method="POST" action="{{ route('saveActividad') }}">
                    @csrf
                    <div class="mx-auto w-fit text-[1.8vw] my-[1vw] font-bold text-azul-univ ">
                        Editar Actividad
                    </div>
                    <input name="id" id="editFormId" hidden>
                    <div class="my-[0.5vw] mx-[1.5vw] font-bold flex flex-col text-[1.2vw] text-gray-600">
                        <p>Descripción</p>
                        <textarea id="descripcion" name="descripcion" class="border-2 border-azul-univ rounded-[1vw] my-[1vw] px-[0.5vw] font-normal resize-none"></textarea>
                    </div>
                    <button type="submit" class="bg-amber-500 w-fit mx-auto mb-[1vw] px-[0.5vw] py-[0.4vw] text-white font-bold rounded-[0.5vw] transition-all duration-500 ease-linear hover:bg-amber-600">
                        Guardar Cambios
                    </button>
                </form>
            </div>
        </div>
        <x-navBarTop />
        <div class="flex">
            <x-navBarLeft />
            <div class="w-[79vw] mb-[1vw]">
                <div class="w-fit my-[1vw] mx-auto text-[2vw] font-bold text-azul-univ">
                    Actividades
                </div>
                <div class="w-fit my-[1vw] ml-[1vw]">
                    <button onclick="closeForm('crearActividadForm')" class="bg-lime-500 px-[0.4vw] py-[0.4vw] text-white font-bold rounded-[0.5vw] text-[1.2vw] flex transition-all ease-linear duration-500 hover:bg-lime-600">
                        <span class="material-symbols-outlined font-bold text-[1.7vw] my-auto">add</span>
                        <label class="ml-[0.3vw] my-auto cursor-pointer">Agregar</label>
                    </button>
                </div>
                <div class="w-[95%] my-[1vw] mx-auto grid font-bold text-[1.2vw] bg-gray-200 rounded-[0.3vw] py-[0.3vw] [grid-template-columns:0.5fr_3fr_1fr]">
                    <div class="m-auto">Id</div>
                    <div class="m-auto">Descripción</div>
                    <div class="m-auto">Acciones</div>
                </div>
            @if ($actividades)
                @foreach ($actividades as $actividad)
                    <x-rowActividad :actividad="$actividad" />
                @endforeach
            @endif
                
            </div>
        </div>
    </body>
    <script src="{{ asset('js/general.js') }}"></script>
</html>