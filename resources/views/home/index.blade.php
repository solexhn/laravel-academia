@extends('layouts.app')

@section('titulo', 'Plataforma de Gestión Académica')

@section('styles')
<style>
    .welcome-banner {
        background: linear-gradient(135deg, #3498db, #8e44ad);
        color: white;
        border-radius: 8px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .feature-card {
        transition: transform 0.3s, box-shadow 0.3s;
        margin-bottom: 20px;
        height: 100%;
    }
    
    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .feature-icon {
        font-size: 2.5rem;
        margin-bottom: 15px;
    }
</style>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Inicio</li>
@endsection

@section('content')
<!-- Banner de bienvenida -->
<div class="welcome-banner">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h1>Bienvenido a cAcademia</h1>
            <p class="lead">Tu plataforma integral para la gestión académica</p>
            <p>Accede a tus cursos, materiales de estudio, y mantente al día con las últimas noticias académicas.</p>
            
            @guest
            <div class="mt-4">
                <a href="{{ route('login') }}" class="btn btn-light me-2">Iniciar sesión</a>
                <a href="{{ route('register') }}" class="btn btn-outline-light">Registrarse</a>
            </div>
            @endguest
        </div>
        <div class="col-md-4 d-none d-md-block text-center">
            <i class="bi bi-mortarboard-fill" style="font-size: 8rem;"></i>
        </div>
    </div>
</div>

<!-- Características principales -->
<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="card feature-card bg-primary text-white">
            <div class="card-body text-center">
                <div class="feature-icon">
                    <i class="bi bi-book"></i>
                </div>
                <h4 class="card-title">Cursos Online</h4>
                <p class="card-text">Accede a tus materiales de estudio desde cualquier lugar y en cualquier momento.</p>
                <a href="/miscursos" class="btn btn-light mt-3">Mis cursos</a>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 col-md-6">
        <div class="card feature-card bg-success text-white">
            <div class="card-body text-center">
                <div class="feature-icon">
                    <i class="bi bi-newspaper"></i>
                </div>
                <h4 class="card-title">Noticias Académicas</h4>
                <p class="card-text">Mantente informado sobre los eventos y anuncios importantes del campus.</p>
                <a href="{{ route('news.index') }}" class="btn btn-light mt-3">Ver noticias</a>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 col-md-6">
        <div class="card feature-card bg-info text-white">
            <div class="card-body text-center">
                <div class="feature-icon">
                    <i class="bi bi-calendar-week"></i>
                </div>
                <h4 class="card-title">Calendario</h4>
                <p class="card-text">Consulta el calendario académico y no te pierdas ningún evento importante.</p>
                <a href="/calendario" class="btn btn-light mt-3">Ver calendario</a>
            </div>
        </div>
    </div>
</div>

<!-- Contenido adicional basado en el rol -->
@auth
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tu Panel Personal</h3>
                </div>
                <div class="card-body">
                    @if(Auth::user()->isAdmin())
                        <div class="alert alert-info mb-4">
                            <h5><i class="bi bi-info-circle me-2"></i>Panel de Administrador</h5>
                            Como administrador, tienes acceso a todas las funciones de gestión de la plataforma.
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="small-box bg-primary">
                                    <div class="inner">
                                        <h3>Usuarios</h3>
                                        <p>Administra usuarios y roles</p>
                                    </div>
                                    <div class="icon">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <a href="/admin/users" class="small-box-footer">
                                        Administrar <i class="bi bi-arrow-right-circle"></i>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>Cursos</h3>
                                        <p>Gestiona cursos y contenidos</p>
                                    </div>
                                    <div class="icon">
                                        <i class="bi bi-mortarboard"></i>
                                    </div>
                                    <a href="/admin/courses" class="small-box-footer">
                                        Administrar <i class="bi bi-arrow-right-circle"></i>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>Reportes</h3>
                                        <p>Estadísticas y métricas</p>
                                    </div>
                                    <div class="icon">
                                        <i class="bi bi-bar-chart"></i>
                                    </div>
                                    <a href="/admin/reports" class="small-box-footer">
                                        Ver reportes <i class="bi bi-arrow-right-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                    @elseif(Auth::user()->isTeacher())
                        <div class="alert alert-info mb-4">
                            <h5><i class="bi bi-info-circle me-2"></i>Panel de Profesor</h5>
                            Como profesor, puedes gestionar tus cursos y dar seguimiento a tus estudiantes.
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="small-box bg-primary">
                                    <div class="inner">
                                        <h3>Mis Cursos</h3>
                                        <p>Administra tus cursos y materiales</p>
                                    </div>
                                    <div class="icon">
                                        <i class="bi bi-book"></i>
                                    </div>
                                    <a href="/teacher/courses" class="small-box-footer">
                                        Administrar <i class="bi bi-arrow-right-circle"></i>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>Alumnos</h3>
                                        <p>Gestiona tus estudiantes</p>
                                    </div>
                                    <div class="icon">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <a href="/teacher/students" class="small-box-footer">
                                        Ver alumnos <i class="bi bi-arrow-right-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                    @elseif(Auth::user()->isStudent())
                        <div class="alert alert-info mb-4">
                            <h5><i class="bi bi-info-circle me-2"></i>Panel de Estudiante</h5>
                            Accede a tus cursos, materiales de estudio y calificaciones.
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="small-box bg-primary">
                                    <div class="inner">
                                        <h3>Mis Cursos</h3>
                                        <p>Accede a tus cursos inscritos</p>
                                    </div>
                                    <div class="icon">
                                        <i class="bi bi-book"></i>
                                    </div>
                                    <a href="/miscursos" class="small-box-footer">
                                        Ver cursos <i class="bi bi-arrow-right-circle"></i>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>Calificaciones</h3>
                                        <p>Consulta tus calificaciones</p>
                                    </div>
                                    <div class="icon">
                                        <i class="bi bi-clipboard-check"></i>
                                    </div>
                                    <a href="/student/grades" class="small-box-footer">
                                        Ver calificaciones <i class="bi bi-arrow-right-circle"></i>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>Inscripciones</h3>
                                        <p>Inscríbete en nuevos cursos</p>
                                    </div>
                                    <div class="icon">
                                        <i class="bi bi-pencil-square"></i>
                                    </div>
                                    <a href="/student/enrollment" class="small-box-footer">
                                        Inscribirme <i class="bi bi-arrow-right-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@else
    <!-- Contenido para usuarios no autenticados -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title m-0">¿Eres estudiante?</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Regístrate para acceder a los cursos, materiales de estudio y más.</p>
                    <a href="{{ route('register') }}" class="btn btn-primary">Crear cuenta</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title m-0">¿Ya tienes una cuenta?</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Inicia sesión para acceder a tu panel personal.</p>
                    <a href="{{ route('login') }}" class="btn btn-primary">Iniciar sesión</a>
                </div>
            </div>
        </div>
    </div>
@endauth

<!-- Últimas noticias -->
@if(isset($latestNews) && count($latestNews) > 0)
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Últimas Noticias</h3>
                <div class="card-tools">
                    <a href="{{ route('news.index') }}" class="btn btn-tool">
                        <i class="bi bi-arrow-right"></i> Ver todas
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($latestNews as $news)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title m-0">{{ $news->title }}</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ Str::limit($news->content, 100) }}</p>
                                <a href="{{ route('news.show', $news->id) }}" class="btn btn-primary btn-sm">Leer más</a>
                            </div>
                            <div class="card-footer text-muted">
                                Publicado {{ $news->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection