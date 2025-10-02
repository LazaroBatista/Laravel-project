<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">{{ $noticia->title }}</h2>
    </x-slot>

    <div class="p-6">
        <p>{{ $noticia->content }}</p>
        <p class="text-sm text-gray-500 mt-2">Criado por: {{ $noticia->user->name }}</p>
    </div>

    <div class="p-6 flex gap-2">
        <a href="{{ route('noticias.edit', $noticia) }}" class="px-4 py-2 bg-yellow-500 text-white rounded">Editar</a>

        <form method="POST" action="{{ route('noticias.destroy', $noticia) }}">
            @csrf
            @method('DELETE')
            <button class="px-4 py-2 bg-red-500 text-white rounded">Excluir</button>
        </form>
    </div>
</x-app-layout>
