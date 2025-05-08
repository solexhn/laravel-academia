<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class NewsController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth:web', except: ['index', 'show']),
        ];
    }

    public function index(Request $request)
    {
        $news = News::with('author')->latest()->paginate(5);
        $news2 = News::query()
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('news.index', compact('news'));
        
        
        // try {
        //     $newsList = News::latest()->paginate(5); // Aquí usamos paginate en lugar de get para que funcione la paginación
        //     return view('news.index', compact('newsList'));
        // } catch (\Exception $e) {
        //     return "Error: " . $e->getMessage();
        // }
    }

    public function create()
    {
        // Verificar directamente el rol_id en lugar de usar isTeacher/isAdmin
        if (Auth::check() && (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)) {
            return view('news.create');
        }
        
        return redirect('/')->with('error', 'No tienes permiso para crear noticias.');
    }

    public function store(Request $request)
    {
        // Verificar directamente el rol_id en lugar de usar isTeacher/isAdmin
        if (!Auth::check() || (Auth::user()->role_id != 1 && Auth::user()->role_id != 2)) {
            return redirect('/')->with('error', 'No tienes permiso para publicar noticias.');
        }

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $published = $request->has('is_published');

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
            'is_published' => $published,
            'published_at' => $published ? now() : null,
        ]);

        return redirect()->route('news.index')->with('success', 'Noticia publicada correctamente.');
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function edit(News $news)
    {
        $newsList = News::with('author')->orderBy('created_at', 'desc')->paginate(5);
        return view('news.edit', compact('news', 'newsList'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $news->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('news.index')->with('success', 'Noticia actualizada correctamente.');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('success', 'Noticia eliminada correctamente.');
    }
}