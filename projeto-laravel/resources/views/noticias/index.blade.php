<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Notícias</h2>
    </x-slot>

    <div class="py-6">
        <a href="{{ route('noticias.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded">Nova Notícia</a>

        <ul class="mt-4">
            @forelse($noticias as $noticia)
                <li>
                    <a href="{{ route('noticias.show', $noticia) }}">
                        {{ $noticia->title }} - por {{ $noticia->user->name }}
                    </a>
                </li>
            @empty
                <p>Nenhuma notícia cadastrada.</p>
            @endforelse
        </ul>
    </div>
</x-app-layout>
