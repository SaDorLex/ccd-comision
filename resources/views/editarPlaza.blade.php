<!DOCTYPE html>
<html>
    <head>
        <title>Editar Plaza - Comision</title>
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
    </head>
    <body class="overflow-x-hidden">
        <x-navBarTop />
        <div class="flex h-[80vh]">
            <x-navBarLeft />
            <div class="w-[79vw]">
                <div class="text-azul-univ text-[2vw] mx-auto w-fit font-bold my-[1vw]">
                    Editar Plaza
                </div>
                <div class="w-[70%] grid grid-cols-2 mx-auto my-[1vw]">
                    <div class="grid grid-cols-2">
                        <label class="text-center my-auto text-[1.5vw] text-azul-univ font-semibold">Departamento
                            Académico</label>
                        <select id="lstDepAcad"
                            class="h-fit my-auto px-[0.5vw] py-[0.5vw] text-[1.1vw] border-azul-univ border-[0.2vw] rounded-[1vw]">
                            <option disabled selected hidden>---</option>
                        </select>
                    </div>
                    <div class="grid grid-cols-2">
                        <label class="text-center my-auto text-[1.5vw] text-azul-univ font-semibold">Convocatoria</label>
                        <select id="lstConvocatoria"
                            class="h-fit my-auto px-[0.5vw] py-[0.5vw] text-[1.1vw] border-azul-univ border-[0.2vw] rounded-[1vw]">
                            <option disabled selected hidden>---</option>
                        </select>
                    </div>
                </div>
                <div class="w-[90%] mx-auto grid grid-cols-4 my-[2vw] gap-[1vw]">
                    <div class="grid grid-cols-2">
                        <label class="text-center my-auto text-[1.3vw]">Clasificación:</label>
                        <select id="lstClasificacion" class="h-fit my-auto px-[0.5vw] py-[0.2vw] text-[1.1vw] border-[0.15vw] border-black rounded-[1vw]">
                            <option disabled selected hidden>---</option>
                        </select>
                    </div>
                    <div class="grid grid-cols-2">
                        <label class="text-center my-auto text-[1.3vw]">Horas Lectivas: </label>
                        <input id="hlectivas" class="w-[50%] h-fit text-[1.3vw] my-auto mx-auto border-[0.15vw] border-black rounded-[1vw] p-[0.5vw]" type="number" disabled value="{{ $plaza->horas_lectivas }}">
                    </div>
                    <div class="grid grid-cols-2">
                        <label class="text-center my-auto text-[1.3vw]">Horas No Lectivas: </label>
                        <input id="hnolectivas" class="w-[50%] h-fit text-[1.3vw] my-auto mx-auto border-[0.15vw] border-black rounded-[1vw] p-[0.5vw]" type="number" disabled value="{{ $plaza->horas_no_lectivas }}">
                    </div>
                    <div class="grid grid-cols-2">
                        <label class="text-center my-auto text-[1.3vw]">Horas Totales: </label>
                        <input id="htotal" class="w-[50%] h-fit text-[1.3vw] my-auto mx-auto border-[0.15vw] border-black rounded-[1vw] p-[0.5vw]" type="number" disabled value="{{ $plaza->horas_semanales }}">
                    </div>
                </div>
                <div class="text-azul-univ text-[1.5vw] mx-auto w-fit font-bold my-[1vw]">
                    Seleccion de Cursos
                </div>
                <div class="w-[90%] mx-auto relative">
                    <input id="buscadorCursos" class="border-azul-univ border-[0.15vw] text-[1.2vw] px-[1vw] py-[0.5vw] w-full rounded-[1vw]" type="text" autocomplete="off">
                    <div id="lstAsignaturas" class="w-full absolute">
                        <ul class="font-bold text-azul-univ text-[1.2vw] w-[98%] mx-auto bg-white">
    
                        </ul>
                    </div>
                </div>
                <div class="text-azul-univ text-[1.5vw] mx-auto w-fit font-bold my-[1vw]">
                    Cursos Seleccionados
                </div>
                <div id="selectedCursos" class="mx-auto grid [grid-template-columns:1fr_1fr_1fr_1fr_0.5fr] w-[90%] text-azul-univ font-bold text-center text-[1.2vw]">
                    <div>Código</div>
                    <div>Nombre</div>
                    <div>Horas Teóricas</div>
                    <div>Horas Prácticas</div>
                    <div></div>
                </div>
                <div class="mx-auto w-[90%] my-[1vw]">
                    <div class="text-azul-univ text-[1.2vw] font-bold">
                        Descripción de Requisitos
                    </div>
                    <textarea id="requisitos" class="border-black border-2 rounded-[1vw] resize-none p-[1vw] w-full h-[10vw] my-[1vw] text-[1.2vw]">{{ $plaza->requisitos_descripcion }}</textarea>
                </div>
                <div class="w-[90%] mx-auto my-[2vw] flex pb-[3vw]">
                    <button id="btnEditarPlaza" class="ml-auto bg-amber-500 text-white font-bold px-[0.4vw] py-[0.2vw] text-[1.3vw] rounded-[0.5vw] duration-300 transition-all ease-linear hover:bg-amber-600">
                        Guardar Cambios
                    </button>
                </div>
            </div>
        </div>
    </body>
    <script>
        var plazaID = {{ $plaza->id }};
        var urlClasificacion = ' {{ route('listarClasificacion') }} ';
        var urlConvocatoria = '{{ route('listarConvocatorias') }} ';
        var urlDepAcad = ' {{ route('listarDepAcad') }} ';
        var urlAsignatura = '{{route('buscarAsignatura')}}';
        var urlGetAsignatura = '{{route('getAsignatura')}}';
        var urlCrearPlaza = '{{ route('savePlaza') }}';
        var urlUpdatePlaza = '{{ route('updatePlaza',':id') }}';
        urlUpdatePlaza = urlUpdatePlaza.replace(':id', plazaID);
        var token = '{{ csrf_token() }}';
        var plaza = @json($plaza);
        var depAcad = @json($plaza->asignaturas->first()->depAcad ?? null);
        var asignaturas = @json($plaza->asignaturas);
    </script>
    <script src="{{ asset('js/crearPlaza.js') }}"></script>
    <script src="{{ asset('js/editarPlaza.js') }}"></script>
</body>
</html>