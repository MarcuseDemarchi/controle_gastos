<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Novo Usuário</h2>
    </x-slot>

    <form action="{{ route('usuarios.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow space-y-4 mt-4 max-w-lg">
        @csrf

        <div>
            <label class="block mb-1 font-medium">Nome</label>
            <input name="name" class="w-full border p-2 rounded" value="{{ old('name') }}" required>
        </div>

        <div>
            <label class="block mb-1 font-medium">Email</label>
            <input name="email" type="email" class="w-full border p-2 rounded" value="{{ old('email') }}" required>
        </div>

        <div>
            <label class="block mb-1 font-medium">Senha</label>
            <input name="password" type="password" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block mb-1 font-medium">Confirme a Senha</label>
            <input name="password_confirmation" type="password" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block mb-1 font-medium">Foto</label>
            <input type="file" name="foto" class="w-full border p-2 rounded">
        </div>

        <div>
            <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Salvar</button>
            <a href="{{ route('usuarios.index') }}" class="ml-2 text-gray-600 hover:underline">Cancelar</a>
        </div>
    </form>
</x-app-layout>