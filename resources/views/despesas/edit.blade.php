<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Editar Despesa</h2>
    </x-slot>

    <form action="{{ route('despesas.update', $despesa) }}" method="POST" class="bg-white p-6 rounded shadow space-y-4 mt-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-medium">Descrição</label>
            <input name="desdescricao" class="w-full border p-2 rounded" value="{{ old('desdescricao', $despesa->desdescricao) }}" required>
        </div>

        <div>
            <label class="block mb-1 font-medium">Valor</label>
            <input name="desvalor" type="number" step="0.01" class="w-full border p-2 rounded" value="{{ old('desvalor', $despesa->desvalor) }}" required>
        </div>

        <div>
            <label class="block mb-1 font-medium">Data</label>
            <input name="desdata" type="date" class="w-full border p-2 rounded" value="{{ old('desdata', $despesa->desdata) }}" required>
        </div>

        <div>
            <label class="block mb-1 font-medium">Categoria</label>
            <select name="catcodigo" class="w-full border p-2 rounded" required>
                <option value="">-- Escolha --</option>
                @foreach($categorias as $cat)
                    <option value="{{ $cat->catcodigo }}" @if(old('catcodigo', $despesa->catcodigo) == $cat->catcodigo) selected @endif>
                        {{ $cat->catnome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Salvar</button>
            <a href="{{ route('despesas.index') }}" class="ml-2 text-gray-600 hover:underline">Cancelar</a>
        </div>
    </form>
</x-app-layout>