<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Minhas Despesas</h2>
    </x-slot>

    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('despesas.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">+ Nova Despesa</a>
    </div>

    <form method="GET" action="{{ route('despesas.index') }}" class="mb-4 flex space-x-2">
    <input type="text" name="busca" placeholder="Buscar descrição..." value="{{ request('busca') }}" class="border p-2 rounded">
    <select name="catcodigo" class="border p-2 rounded">
        <option value="">Todas categorias</option>
        @foreach($categorias as $cat)
            <option value="{{ $cat->catcodigo }}" @if(request('catcodigo') == $cat->catcodigo) selected @endif>
                {{ $cat->catnome }}
            </option>
        @endforeach
    </select>
    <button class="bg-blue-600 text-white px-4 py-2 rounded">Filtrar</button>
    <a href="{{ route('despesas.index') }}" class="px-4 py-2 rounded bg-gray-300 text-gray-700">Limpar</a>
</form>

    <table class="w-full bg-white rounded shadow">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-3 text-left">Descrição</th>
                <th class="p-3 text-left">Valor</th>
                <th class="p-3 text-left">Categoria</th>
                <th class="p-3 text-left">Data</th>
                <th class="p-3 text-left">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($despesas as $despesa)
                <tr class="border-t">
                    <td class="p-3">{{ $despesa->desdescricao }}</td>
                    <td class="p-3">R$ {{ number_format($despesa->desvalor, 2, ',', '.') }}</td>
                    <td class="p-3">{{ $despesa->categoria?->catnome ?? '-' }}</td>
                    <td class="p-3">{{ \Carbon\Carbon::parse($despesa->desdata)->format('d/m/Y') }}</td>
                    <td class="p-3 space-x-2">
                        <a href="{{ route('despesas.edit', $despesa) }}" class="text-blue-600 hover:underline">Editar</a>
                        <form action="{{ route('despesas.destroy', $despesa) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button class="text-red-600 hover:underline" onclick="return confirm('Deseja apagar?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="mt-4">
        {{ $despesas->links() }}
    </div>
</x-app-layout>
