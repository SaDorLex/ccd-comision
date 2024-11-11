<!DOCTYPE html>
<html>
    <head>
        <title>Prueba</title>
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
    </head>
    <body class="w-full">
        
        <div class="w-[15vw] p-[1vw] rounded-[2vw] bg-gray-200">
            <div class="flex">
                <img class="border-black m-auto border-[0.15vw] rounded-full bg-white w-[80%] h-auto" src="img/user.png">
            </div>
            <div class="mx-auto my-[0.5vw] text-center font-bold text-[1.1vw]">
                <p>RODAS ROSALES OSCAR ALEXIS</p>
            </div>
            <div class="w-fit bg-white mx-auto px-[0.5vw] rounded-full">
                <p class="text-lime-600 font-bold">Evaluado</p>
            </div>
        </div>
    </body>
</html>
