<div
    class="bg-gray-200 my-[0.4vw] rounded-[0.5vw] px-[1vw] py-[0.5vw] text-[1.4vw] grid [grid-template-columns:0.1fr_2fr_1fr_0.5fr] w-[80%] mx-auto">
    <div>
        <input data-id="{{ $item->id }}" type="checkbox" class="accent-azul-pedro-600 scale-125">
    </div>
    <div class="m-auto">{{ $item->nombre }}</div>
    <div class="m-auto">
        {{ $item->tipo_carpeta }}
    </div>
    <div class="m-auto"><button onclick="updateArchivo({{ $item->id }})">
            <span class="my-auto text-[1.8vw] material-symbols-outlined text-amber-600 right-0">edit</span>
        </button>
        <button onclick="deleteArchivo({{ $item->id }})">
            <span class="my-auto text-[1.8vw] material-symbols-outlined text-red-600 right-0">close</span>
        </button>
    </div>
</div>
