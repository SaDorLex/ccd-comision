@vite('resources/css/app.css')

<div class="flex w-screen h-[5vw] border-b-2 border-gray-400 justify-between ">
    <img class="w-[21vw]" src="{{ asset('img/isotipo_unprg.png') }}">
    <div class="m-auto mr-[2vw] rounded-full border-2 border-black w-[4vw] h-[4vw] cursor-pointer" id="dropdownButton">
        <img class="w-[4vw] h-[4vw]" src="{{ asset('img/user.png') }}">
        <div class="hidden bg-white border-2 border-gray-400 rounded-[1vw] px-[1vw] py-[0.5vw] flex-col absolute w-[12vw] ml-[-8vw] text-[1vw] font-bold" id="dropdownMenu">
            <label>Hola Alexis!</label>
            <a class="mx-0 my-[0.5vw] flex no-underline cursor-pointer" href="#">
                <button class="cursor-pointer flex my-auto">
                    <span class="material-symbols-outlined text-[1.8vw]">lock</span>
                    <label class="font-normal cursor-pointer ml-[1vw] text-[1.1vw]">Cerrar Sesión</label>
                </button>
            </a>
        </div>
    </div>
</div>