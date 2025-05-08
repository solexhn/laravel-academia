@extends('layouts.app')

@section('titulo', 'Dashboard')

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
@endsection

@section('content')
<!-- Mensaje de bienvenida -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h4 class="card-title">Bienvenido/a {{ Auth::user()->name }}</h4>
                <p class="card-text">Este es tu panel de control personal donde podrás gestionar tus actividades académicas.</p>
                @if(isset($message))
                    <div class="alert alert-info mt-3">
                        {{ $message }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Estadísticas básicas -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>3</h3>
                <p>Cursos inscritos</p>
            </div>
            <div class="icon">
                <i class="bi bi-book"></i>
            </div>
            <a href="{{ route('miscursos') }}" class="small-box-footer">
                Ver cursos <i class="bi bi-arrow-right-circle"></i>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>85%</h3>
                <p>Progreso promedio</p>
            </div>
            <div class="icon">
                <i class="bi bi-graph-up"></i>
            </div>
            <a href="#" class="small-box-footer">
                Ver detalles <i class="bi bi-arrow-right-circle"></i>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>2</h3>
                <p>Eventos próximos</p>
            </div>
            <div class="icon">
                <i class="bi bi-calendar-event"></i>
            </div>
            <a href="{{ route('calendario') }}" class="small-box-footer">
                Ver calendario <i class="bi bi-arrow-right-circle"></i>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>1</h3>
                <p>Tareas pendientes</p>
            </div>
            <div class="icon">
                <i class="bi bi-clipboard-check"></i>
            </div>
            <a href="#" class="small-box-footer">
                Ver tareas <i class="bi bi-arrow-right-circle"></i>
            </a>
        </div>
    </div>
</div>

<!-- Actividad reciente -->
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Actividad reciente</h3>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Clase asistida: Introducción a la programación</h5>
                            <small class="text-muted">Hace 3 días</small>
                        </div>
                        <p class="mb-1">Has completado la clase con éxito.</p>
                    </div>
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Tarea entregada: Algoritmos básicos</h5>
                            <small class="text-muted">Hace 5 días</small>
                        </div>
                        <p class="mb-1">Tu tarea ha sido calificada con 95/100.</p>
                    </div>
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Curso iniciado: Diseño web</h5>
                            <small class="text-muted">Hace 1 semana</small>
                        </div>
                        <p class="mb-1">Te has inscrito en un nuevo curso.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <!-- Calendario en miniatura o widget -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Calendario</h3>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <i class="bi bi-info-circle me-2"></i> Próximos eventos
                </div>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Examen parcial
                        <span class="badge bg-primary rounded-pill">15 Mayo</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Entrega de proyecto
                        <span class="badge bg-primary rounded-pill">22 Mayo</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
