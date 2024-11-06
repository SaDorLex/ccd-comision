<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard - Comision</title>
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
    </head>
    <body class="overflow-x-hidden">
@php    
    $num = 1;
@endphp
        <x-navBarTop />
        <div class="flex h-[80vh]">
            <x-navBarLeft />
            <div class="w-[79vw]">
                <div class="w-fit my-[1vw] mx-auto text-[2vw] font-bold text-azul-univ">
                    Editar Convocatoria
                </div>
                <div class="grid grid-cols-3 w-[95%] mx-auto">
                    <div class="grid grid-cols-2">
                        <label class="text-center my-auto text-[1.5vw] text-azul-univ font-semibold">Semestre Académico</label>
                        <select id="lstSemestres" class="h-fit my-auto px-[0.5vw] py-[0.5vw] text-[1.1vw] border-azul-univ border-[0.2vw] rounded-[1vw]">
                            <option disabled selected hidden>---</option>
                        </select>
                    </div>
                    <div class="grid grid-cols-2">
                        <label class="text-center my-auto text-[1.5vw] text-azul-univ font-semibold">Fecha de<br>Inicio</label>
                        <input id="fecha_inicio" class="h-fit my-auto px-[0.5vw] py-[0.5vw] text-[1.1vw] border-azul-univ border-[0.2vw] rounded-[1vw]" type="date" min="" value="{{ $convocatoria->fecha_inicio }}">
                    </div>
                    <div class="grid grid-cols-2">
                        <label class="text-center my-auto text-[1.5vw] text-azul-univ font-semibold">Fecha de<br>Término</label>
                        <input id="fecha_termino" class="h-fit my-auto px-[0.5vw] py-[0.5vw] text-[1.1vw] border-azul-univ border-[0.2vw] rounded-[1vw]" type="date" value="{{ $convocatoria->fecha_termino }}">
                    </div>
                </div>
                <div class="w-full mx-auto my-[2vw] grid gap-[1vw] text-[1.5vw] text-center relative">
                    <div id="changeLastHour" class="absolute left-[80%] top-[50%] text-[1vw] font-bold bg-azul-univ text-white px-[0.4vw] py-[0.2vw] rounded-[0.5vw] cursor-pointer transition-all duration-300 ease-linear hover:bg-azul-pedro-700">
                        Usar Último Horario
                    </div>
                    <label class="text-azul-univ font-bold">Horario de Atención</label>
                    <div class="w-fit mx-auto grid grid-cols-2">
                        <div class="grid grid-cols-2">
                            <label class="text-center my-auto text-[1.5vw] text-azul-univ font-semibold">Hora de<br>Inicio</label>
                            <input id="horaInicio" class="h-fit my-auto px-[0.5vw] py-[0.5vw] text-[1.1vw] border-azul-univ border-[0.2vw] rounded-[1vw] w-[10vw]" type="time" value="{{ $convocatoria->horario->hora_inicio }}">
                        </div>
                        <div class="grid grid-cols-2">
                            <label class="text-center my-auto text-[1.5vw] text-azul-univ font-semibold">Hora de<br>Término</label>
                            <input id="horaFin" class="h-fit my-auto px-[0.5vw] py-[0.5vw] text-[1.1vw] border-azul-univ border-[0.2vw] rounded-[1vw] w-[10vw]" type="time" value="{{ $convocatoria->horario->hora_termino }}">
                        </div>
                    </div>
                    <label class="text-azul-univ font-bold">Escoge los Días de Atención</label>
                    <div class="w-fit m-auto grid gap-[1vw] [grid-template-columns:1fr_1fr_1fr_1fr_1fr_1fr_1fr]">
                        <div id="btnLunes" data-id="lunes" class="w-[3vw] h-[3vw] border-azul-univ border-[0.2vw] flex rounded-[0.5vw] cursor-pointer dia">
                            <p class="m-auto text-[1.5vw] font-bold text-azul-univ">L</p>
                        </div>
                        <div id="btnMartes" data-id="martes" class="w-[3vw] h-[3vw] border-azul-univ border-[0.2vw] flex rounded-[0.5vw] cursor-pointer dia">
                            <p class="m-auto text-[1.5vw] font-bold text-azul-univ">M</p>
                        </div>
                        <div id="btnMiercoles" data-id="miercoles" class="w-[3vw] h-[3vw] border-azul-univ border-[0.2vw] flex rounded-[0.5vw] cursor-pointer dia">
                            <p class="m-auto text-[1.5vw] font-bold text-azul-univ">M</p>
                        </div>
                        <div id="btnJueves" data-id="jueves" class="w-[3vw] h-[3vw] border-azul-univ border-[0.2vw] flex rounded-[0.5vw] cursor-pointer dia">
                            <p class="m-auto text-[1.5vw] font-bold text-azul-univ">J</p>
                        </div>
                        <div id="btnViernes" data-id="viernes" class="w-[3vw] h-[3vw] border-azul-univ border-[0.2vw] flex rounded-[0.5vw] cursor-pointer dia">
                            <p class="m-auto text-[1.5vw] font-bold text-azul-univ">V</p>
                        </div>
                        <div id="btnSabado" data-id="sabado" class="w-[3vw] h-[3vw] border-azul-univ border-[0.2vw] flex rounded-[0.5vw] cursor-pointer dia">
                            <p class="m-auto text-[1.5vw] font-bold text-azul-univ">S</p>
                        </div>
                        <div id="btnDomingo" data-id="domingo" class="w-[3vw] h-[3vw] border-azul-univ border-[0.2vw] flex rounded-[0.5vw] cursor-pointer dia">
                            <p class="m-auto text-[1.5vw] font-bold text-azul-univ">D</p>
                        </div>
                    </div>
                    <div class="hidden">
                        <!-- INPUTS PARA LOS CHECKBOX PARA LOS DÍAS -->
                        <input type="checkbox" id="lunes" class="diaCheck">
                        <input type="checkbox" id="martes" class="diaCheck">
                        <input type="checkbox" id="miercoles" class="diaCheck">
                        <input type="checkbox" id="jueves" class="diaCheck">
                        <input type="checkbox" id="viernes" class="diaCheck">
                        <input type="checkbox" id="sabado" class="diaCheck">
                        <input type="checkbox" id="domingo" class="diaCheck">
                    </div>
                </div>
                <div class="w-fit mx-auto my-[2vw] flex gap-[1vw] text-[1.5vw]">
                    <label class="text-azul-univ font-bold">Bases:</label>
                    <label id="nombreArchivo" class="text-black">Bases.pdf</label>
                    <button onclick="inputFileClick('inputFile')" class="flex gap-[0.5vw] text-[1.3vw] bg-azul-univ text-white px-[0.4vw] py-[0.2vw] rounded-[0.5vw] transition-all duration-300 ease-linear hover:bg-white hover:text-azul-univ hover:outline hover:outline-[0.15vw] ">
                        <span class="material-symbols-outlined text-[1.8vw] m-auto">upload</span>
                        <p class="m-auto">Subir Archivo</p>
                    </button>
                    <input id="inputFile" class="hidden" type="file" accept=".pdf">
                </div>
                <div class="grid grid-cols-2 w-[70%] mx-auto">
                    <div class="w-fit grid h-fit gap-[1vw]">
                        <label class=" text-center text-[1.5vw] text-azul-univ font-bold">Requiere Datos de Voucher de Pago</label>
                        <div class="w-fit m-auto text-[1.5vw] grid grid-cols-2 gap-[1vw]">
                            @if($convocatoria->estado_pago == 1)
                                <label>
                                    <input type="radio" name="respuesta" value="0" required checked>
                                    Sí
                                </label>
                                <label>
                                    <input type="radio" name="respuesta" value="1" required>
                                    No
                                </label> 
                            @else
                                <label>
                                    <input type="radio" name="respuesta" value="0" required>
                                    Sí
                                </label>
                                <label>
                                    <input type="radio" name="respuesta" value="1" required checked>
                                    No
                                </label>
                            @endif
                            
                        </div>
                    </div>
                    <div class="grid">
                        <label class="text-center text-[1.5vw] text-azul-univ font-bold">Agregar Comentarios</label>
                        <textarea id="comentarios" class="border-azul-univ border-[0.2vw] rounded-[1vw] resize-none p-[1vw] w-full my-[1vw] text-[1.2vw]">{{ $convocatoria->comentarios }}</textarea>
                    </div>
                </div>
                <div class="w-fit my-[1vw] mx-auto text-[1.8vw] font-bold text-azul-univ">
                    Definir Cronograma de Actividades
                </div>
                <div class="grid [grid-template-columns:0.1fr_1fr_0.5fr_0.5fr] w-[80%] mx-auto text-[1.3vw]">
                    <div class="m-auto">N°</div>
                    <div class="m-auto">Actividad</div>
                    <div class="m-auto">Fecha de Inicio</div>
                    <div class="m-auto">Fecha de Término</div>
                </div>
                @foreach($convocatoria->actividades as $actividad)
                    <x-rowActividadConvocatoriaEditar :actividad="$actividad" :num="$num" />
                    @php
                    $num += 1;
                    @endphp
                @endforeach
                <div class="w-[90%] mx-auto my-[2vw] flex pb-[3vw]">
                    <button id="btnEditarConvocatoria" class="ml-auto bg-amber-500 text-white font-bold px-[0.4vw] py-[0.2vw] text-[1.3vw] rounded-[0.5vw] duration-300 transition-all ease-linear hover:bg-amber-600">
                        Guardar Cambios
                    </button>
                </div>
            </div>
        </div>
        <script>
            var urlSemestreAcademico = '{{ route('listarSemestres') }}';
            var urlGetLastHour = '{{route('ultimoHorario')}}';
            var urlCrearConvocatoria = '{{route('crearConvocatoria')}}';
            var urlEditarConvocatoria = '{{route('updateConvocatoria', $convocatoria->id)}}'
            var token = '{{ csrf_token() }}';
            var convocatoria = @json($convocatoria);
        </script>
        <script src="{{ asset('js/editarConvocatoria.js') }}"></script>
    </body>
</html>