<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Editar Notícia</h2>
    </x-slot>

    <form method="POST" action="{{ route('noticias.update', $noticia) }}" class="p-6">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Título</label>
            <input type="text" name="title" class="border w-full" value="{{ $noticia->title }}" required>
        </div>

        <div class="mt-4">
            <label for="content">Conteúdo</label>
            <textarea name="content" class="border w-full" rows="5" required>{{ $noticia->content }}</textarea>
        </div>

        <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Atualizar</button>
    </form>
</x-app-layout>
