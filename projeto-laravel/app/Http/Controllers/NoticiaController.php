<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * Lista todas as notícias
     */
    public function index()
    {
        $noticias = Noticia::with('user')->latest()->get();
        return view('noticias.index', compact('noticias'));
    }

    /**
     * Mostra o formulário de criação
     */
    public function create()
    {
        return view('noticias.create');
    }

    /**
     * Salva uma nova notícia
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // vincula ao usuário logado
        $request->user()->noticias()->create($request->only('title','content'));

        return redirect()->route('noticias.index')
                         ->with('success', 'Notícia criada com sucesso!');
    }

    /**
     * Exibe uma notícia específica
     */
    public function show(Noticia $noticia)
    {
        return view('noticias.show', compact('noticia'));
    }

    /**
     * Mostra o formulário de edição
     */
    public function edit(Noticia $noticia)
    {
        // segurança: só o dono pode editar
        if ($noticia->user_id !== auth()->id()) {
            abort(403);
        }

        return view('noticias.edit', compact('noticia'));
    }

    /**
     * Atualiza a notícia
     */
    public function update(Request $request, Noticia $noticia)
    {
        if ($noticia->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $noticia->update($request->only('title','content'));

        return redirect()->route('noticias.index')
                         ->with('success', 'Notícia atualizada com sucesso!');
    }

    /**
     * Remove a notícia
     */
    public function destroy(Noticia $noticia)
    {
        if ($noticia->user_id !== auth()->id()) {
            abort(403);
        }

        $noticia->delete();

        return redirect()->route('noticias.index')
                         ->with('success', 'Notícia excluída!');
    }
}
