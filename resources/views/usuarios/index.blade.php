<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Usuários</h2>
    </x-slot>

    <a href="{{ route('usuarios.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 mb-4 inline-block">Novo Usuário</a>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">{{ session('success') }}</div>
    @endif

    <table class="w-full bg-white rounded shadow">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-3 text-left">Foto</th>
                <th class="p-3 text-left">Nome</th>
                <th class="p-3 text-left">Email</th>
                <th class="p-3 text-left">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="border-t">
                    <td class="p-3">
                        @if($user->foto)
                            <img src="{{ asset('storage/' . Auth::user()->foto) }}" class="h-10 w-10 rounded-full object-cover">
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="p-3">{{ $user->name }}</td>
                    <td class="p-3">{{ $user->email }}</td>
                    <td class="p-3 space-x-2">
                        <a href="{{ route('usuarios.edit', $user) }}" class="text-blue-600 hover:underline">Editar</a>
                        <form action="{{ route('usuarios.destroy', $user) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button class="text-red-600 hover:underline" onclick="return confirm('Deseja apagar?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
</x-app-layout>