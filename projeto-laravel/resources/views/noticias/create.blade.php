<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Criar Notícia</h2>
    </x-slot>

    <form method="POST" action="{{ route('noticias.store') }}" class="p-6">
        @csrf
        <div>
            <label for="title">Título</label>
            <input type="text" name="title" class="border w-full" required>
        </div>

        <div class="mt-4">
            <label for="content">Conteúdo</label>
            <textarea name="content" class="border w-full" rows="5" required></textarea>
        </div>

        <button class="mt-4 px-4 py-2 bg-green-500 text-white rounded">Salvar</button>
    </form>
</x-app-layout>
