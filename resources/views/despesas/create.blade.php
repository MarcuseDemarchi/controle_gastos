<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Nova Despesa</h2>
    </x-slot>

    <form action="{{ route('despesas.store') }}" method="POST" class="bg-white p-6 rounded shadow space-y-4 mt-4">
        @csrf

        <div>
            <label class="block mb-1 font-medium">Descrição</label>
            <input name="desdescricao" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block mb-1 font-medium">Valor</label>
            <input name="desvalor" type="number" step="0.01" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block mb-1 font-medium">Data</label>
            <input name="desdata" type="date" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block mb-1 font-medium">Categoria</label>
            <select name="catcodigo" class="w-full border p-2 rounded" required>
                <option value="">-- Escolha --</option>
                @foreach($categorias as $cat)
                    <option value="{{ $cat->catcodigo }}">{{ $cat->catnome }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Salvar</button>
        </div>
    </form>
</x-app-layout>
