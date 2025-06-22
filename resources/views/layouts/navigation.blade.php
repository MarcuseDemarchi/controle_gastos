<nav class="bg-indigo-700 p-4 text-white">
    <div class="flex items-center space-x-4">
        @if(Auth::user()->foto)
            <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto" class="h-8 w-8 rounded-full object-cover border-2 border-white">
        @endif
        <span>{{ Auth::user()->name }}</span>
        <a href="{{ route('usuarios.edit', Auth::user()->id) }}" class="hover:underline">Editar Perfil</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="hover:underline">Sair</button>
        </form>
    </div>
    <div class="max-w-6xl mx-auto flex justify-between">
        <div class="flex space-x-6">
            <a href="{{ route('despesas.index') }}" class="hover:underline">Despesas</a>
            <a href="{{ route('usuarios.index') }}" class="hover:underline">Usuários</a>
            {{-- <a href="{{ route('categorias.index') }}" class="hover:underline">Categorias</a>
            <a href="{{ route('despesas.relatorio') }}" class="hover:underline">Relatório</a> --}}
        </div>
    </div>
</nav>