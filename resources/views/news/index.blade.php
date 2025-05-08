@extends('layouts.app')

@section('titulo', 'Noticias')

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Noticias</li>
@endsection

@section('content')
<div class="row">
    <!-- Formulario para crear noticias -->
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Crear Nueva Noticia</h3>
            </div>

            <form action="{{ route('news.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="form-group mb-3">
                        <label for="title">Título</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Título de la noticia" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="content">Contenido</label>
                        <textarea class="form-control" id="content" name="content" rows="5" placeholder="Escribe el contenido de la noticia..." required></textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Publicar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Lista de noticias publicadas -->
    <div class="col-md-6">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Noticias Publicadas</h3>
            </div>
            <div class="card-body">
                @if(isset($news) && count($news) > 0)
                @foreach($news as $item) <!-- Usamos $item en lugar de $news para cada elemento -->
                <div class="post">
                    <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('dist/img/user-avatar.jpg') }}" alt="User Image">
                        <span class="username">
                            <a href="#">{{ $item->title }}</a>
                            <form action="{{ route('news.destroy', $item->id) }}" method="POST" class="float-end">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </span>
                        <span class="description">Publicado por {{ $item->author->name ?? 'Usuario' }} - {{ $item->created_at->diffForHumans() }}</span>
                    </div>
                    <p>{{ $item->content }}</p>
                    <p>
                        <a href="{{ route('news.edit', $item->id) }}" class="link-black text-sm">
                            <i class="bi bi-pencil me-1"></i> Editar
                        </a>
                    </p>
                </div>
                <hr>
                @endforeach
                @else
                <p class="text-center">No hay noticias publicadas.</p>
                @endif
            </div>
            @if(isset($news) && $news->hasPages())
            <div class="card-footer">
                {{ $news->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Si quieres usar un editor de texto enriquecido, puedes agregar el código aquí
    document.addEventListener('DOMContentLoaded', function() {
        // Ejemplo: CKEDITOR.replace('content');
    });
</script>
@endsection