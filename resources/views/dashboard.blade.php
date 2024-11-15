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
                <div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </body>
    <script type="module" src="{{asset('js/dashboard.js')}}"></script>    
</html>