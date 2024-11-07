<div class="flex m-auto gap-[0.5vw] w-[80%] text-[1.4vw] relative border-b-[0.2vw]">
    <input data-id="{{ $item->id }}" type="checkbox" class="accent-azul-pedro-600 scale-125">
    <p>{{ $item->nombre }}</p>
    <div class="m-auto absolute right-0 flex">
        <button onclick="updateArchivo({{$item->id}})">
            <span class="my-auto text-[1.8vw] material-symbols-outlined text-amber-600 right-0">edit</span>
        </button>
        <button onclick="deleteArchivo({{$item->id}})">
            <span class="my-auto text-[1.8vw] material-symbols-outlined text-red-600 right-0">close</span>
        </button>
    </div>
</div>
