<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard - Comision</title>
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
    </head>
@php
 use Carbon\Carbon;
@endphp
    <body class="overflow-x-hidden">
        <x-navBarTop />
        <div class="flex h-[80vh]">
            <x-navBarLeft />
            <div class="w-[79vw]">
                <div class="w-[90%] m-auto border-azul-pedro-600 border-[0.2vw] my-[2vw] relative rounded-[2vw] px-[2vw]">
                    <p class="text-[2vw] text-azul-pedro-600 font-medium absolute bg-white top-[-1.8vw] px-[0.5vw]">Datos Personales:</p>
                    <div class=" text-[1.4vw] my-[1.5vw] w-full grid grid-cols-2 gap-[1vw]">
                        <div class="grid [grid-template-columns:0.5fr_1fr]">
                            <p>Nombre:</p>
                            <p>{{ $evaluacion->postulante->apellido_paterno . " " . $evaluacion->postulante->apellido_materno . " " . $evaluacion->postulante->nombres }}</p>
                        </div>
                        <div class="grid [grid-template-columns:0.5fr_1fr]">
                            <p>Documento:</p>
                            @if ($evaluacion->postulante->tipo_documento == 1)
                                <p>DNI</p>
                            @else
                                <p>Carnét de Extranjería</p>
                            @endif
                        </div>
                        <div class="grid [grid-template-columns:0.5fr_1fr]">
                            <p>Email:</p>
                            <p>{{ $evaluacion->postulante->email }}</p>
                        </div>
                        <div>
                            
                        </div>
                        <div class="grid [grid-template-columns:0.5fr_1fr]">
                            <p>Telefono:</p>
                            <p>{{ $evaluacion->postulante->numero_telefono }}</p>
                        </div>
                        <div class="grid [grid-template-columns:0.5fr_1fr]">
                            <p>Celular:</p>
                            <p>{{ $evaluacion->postulante->numero_celular }}</p>
                        </div>
                        <div class="grid [grid-template-columns:0.5fr_1fr]">
                            <p>Nacimiento:</p>
                            <p>{{ Carbon::createFromFormat('Y-m-d', $evaluacion->postulante->fecha_nacimiento)->format('d/m/Y') }}</p>
                        </div>
                        <div class="grid [grid-template-columns:0.5fr_1fr]">
                            <p>Estado Civil:</p>
                            <p>{{ $evaluacion->postulante->estado_civil }}</p>
                        </div>
                    </div>
                </div>
                <div class="w-[90%] m-auto border-azul-pedro-600 border-[0.2vw] my-[2vw] relative rounded-[2vw] px-[2vw]">
                    <p class="text-[2vw] text-azul-pedro-600 font-medium absolute bg-white top-[-1.8vw] px-[0.5vw]">Datos Geográficos:</p>
                    <div class=" text-[1.4vw] my-[1.5vw] w-full grid grid-cols-2 gap-[1vw]">
                        <div class="grid [grid-template-columns:0.5fr_1fr]">
                            <p>Direccion:</p>
                            <p>{{ $evaluacion->postulante->direccion}}</p>
                        </div>
                        <div>

                        </div>
                        <div class="grid [grid-template-columns:0.5fr_1fr]">
                            <p>Distrito:</p>
                            <p>{{ $evaluacion->postulante->distrito->nombre}}</p>
                        </div>
                        <div class="grid [grid-template-columns:0.5fr_1fr]">
                            <p>Provincia:</p>
                            <p>{{ $evaluacion->postulante->provincia->nombre}}</p>
                        </div>
                        <div class="grid [grid-template-columns:0.5fr_1fr]">
                            <p>Departamento:</p>
                            <p>{{ $evaluacion->postulante->departamento->nombre}}</p>
                        </div>
                        <div class="grid [grid-template-columns:0.5fr_1fr]">
                            <p>Pais:</p>
                            <p>{{ $evaluacion->postulante->pais->nombre}}</p>
                        </div>
                    </div>
                </div>
                @if ($evaluacion->postulante->discapacidad == 1)
                <div class="w-[90%] m-auto border-red-600 border-[0.2vw] my-[2vw] relative rounded-[2vw] px-[2vw]">
                    <p class="text-[2vw] text-red-600 font-medium absolute bg-white top-[-1.8vw] px-[0.5vw]">Discapacidad:</p>
                    <div class=" text-[1.4vw] my-[1.5vw] w-full grid grid-cols-2 gap-[1vw]">
                        <div class="grid [grid-template-columns:1fr_1fr]">
                            <p>Tipo de Discapacidad:</p>
                            <p>{{ $evaluacion->postulante->tipo_discapacidad}}</p>
                        </div>
                        <div class="grid [grid-template-columns:0.5fr_1fr]">
                            <p>N° CONADIS:</p>
                            <p>{{ $evaluacion->postulante->numero_conadis}}</p>
                        </div>
                    </div>
                </div>
                @endif
                <div class="w-[90%] m-auto border-azul-pedro-600 border-[0.2vw] my-[2vw] relative rounded-[2vw] px-[2vw]">
                    <p class="text-[2vw] text-azul-pedro-600 font-medium absolute bg-white top-[-1.8vw] px-[0.5vw]">Documentación:</p>
                    <div class=" text-[1.4vw] mt-[1.5vw] mb-[1vw] w-full grid [grid-template-columns:0.1fr_1fr_0.3fr_0.4fr]">
                        <div class="m-auto">N°</div>
                        <div>Nombre del Documento</div>
                        <div class="m-auto">URL</div>
                        <div class="m-auto">Acciones</div>
                    </div>
                    <div class=" text-[1.4vw] my-[0.8vw] w-full grid [grid-template-columns:0.1fr_1fr_0.3fr_0.4fr]">
                        <div class="m-auto">1</div>
                        <div class="">Curriculum</div>
                        <a class="m-auto text-blue-900 hover:underline hover:decoration-1" href="#" target="_blank">Ver</a>
                        <div class="m-auto text-[1.2vw] grid grid-cols-2 gap-[0.5vw]">
                            <button class="text-lime-500 border-lime-500 rounded-[0.5vw] border-[0.2vw] px-[0.2vw] transition-all duration-300 ease-linear hover:bg-lime-500 hover:text-white">Aceptar</button>
                            <div class="relative">
                            <button class="text-red-500 border-red-500 rounded-[0.5vw] border-[0.2vw] px-[0.2vw] transition-all duration-300 ease-linear hover:bg-red-500 hover:text-white relative">
                                Rechazar
                            </button>
                            <div class="w-[20vw] border-[0.2vw] border-red-600 rounded-[1vw] absolute
                                bg-white p-[1vw] left-[-10vw] top-[-12vw] flex flex-col">
                                    <div class="mb-[0.5vw]">Agrega Comentarios:</div>
                                    <textarea class="w-full border-[0.15vw] resize-none px-[0.5vw]" ></textarea>
                                    <button class="text-red-500 w-fit mt-[1vw] ml-auto mr-0 border-red-500 rounded-[0.5vw] border-[0.2vw] px-[0.2vw] transition-all duration-300 ease-linear hover:bg-red-500 hover:text-white">Listo</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>