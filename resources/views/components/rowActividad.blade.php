<div class="w-[95%] my-[1vw] mx-auto grid font-medium text-[1.1vw] border-b-[1px] border-gray-300 rounded-[0.3vw] py-[0.3vw] [grid-template-columns:0.5fr_3fr_1fr] text-center">
    <div class="m-auto">{{ $actividad->id }}</div>
    <div class="m-auto">{{ $actividad->descripcion }}</div>
    <div class="m-auto grid grid-cols-2 gap-5">
        <button onclick="formEditar('{{ route('editarActividad', $actividad->id) }}')">
            <span class="material-symbols-outlined text-[2vw] text-amber-500">edit</span>
        </button>
        <form action="{{ route('eliminarActividad', $actividad->id) }}" method="POST" class="">
            @csrf
            <button>
                <span class="material-symbols-outlined text-[2vw] text-red-600">delete</span>
            </button>
        </form>
    </div>
</div>