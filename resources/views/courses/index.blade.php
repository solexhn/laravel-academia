@extends('layouts.app')

@section('titulo', 'Mis Cursos')

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Mis Cursos</li>
@endsection

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Mis Cursos Inscritos</h3>
                <div>
                    <a href="#" class="btn btn-sm btn-primary">
                        <i class="bi bi-search"></i> Buscar Cursos
                    </a>
                </div>
            </div>
            <div class="card-body">
                <!-- Aquí se pueden cargar los cursos de la base de datos -->
                <div class="row" id="courses-container">
                    <!-- Si no hay cursos, mostrar mensaje -->
                    <div class="col-12 text-center py-5" id="no-courses" style="display: none;">
                        <i class="bi bi-mortarboard-fill" style="font-size: 5rem; color: #ccc;"></i>
                        <h4 class="mt-3">No estás inscrito en ningún curso</h4>
                        <p class="text-muted">Explora nuestro catálogo de cursos y comienza tu aprendizaje</p>
                        <a href="#" class="btn btn-primary mt-3">Ver catálogo de cursos</a>
                    </div>
                    
                    <!-- Ejemplo de cursos -->
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="position-relative">
                                <img src="https://placehold.co/600x400/3498db/FFFFFF/png?text=Web+Development" class="card-img-top" alt="Web Development">
                                <span class="badge bg-success position-absolute" style="top: 10px; right: 10px;">En progreso</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Desarrollo Web Frontend</h5>
                                <p class="card-text">Aprende HTML, CSS y JavaScript para crear sitios web interactivos.</p>
                                <div class="progress mb-3">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Instructor: Juan Pérez</span>
                                    <span class="text-muted">Duración: 12 semanas</span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-primary w-100">Continuar Curso</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="position-relative">
                                <img src="https://placehold.co/600x400/8e44ad/FFFFFF/png?text=Laravel" class="card-img-top" alt="Laravel">
                                <span class="badge bg-warning position-absolute" style="top: 10px; right: 10px;">Nuevo</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Laravel 12 para principiantes</h5>
                                <p class="card-text">Aprende a desarrollar aplicaciones web con el popular framework PHP.</p>
                                <div class="progress mb-3">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">10%</div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Instructor: Ana Gómez</span>
                                    <span class="text-muted">Duración: 10 semanas</span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-primary w-100">Continuar Curso</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="position-relative">
                                <img src="https://placehold.co/600x400/2c3e50/FFFFFF/png?text=Databases" class="card-img-top" alt="Databases">
                                <span class="badge bg-danger position-absolute" style="top: 10px; right: 10px;">Avanzado</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Diseño y Optimización de Bases de Datos</h5>
                                <p class="card-text">Aprende a diseñar, implementar y optimizar bases de datos relacionales.</p>
                                <div class="progress mb-3">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40%</div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Instructor: Carlos Sánchez</span>
                                    <span class="text-muted">Duración: 8 semanas</span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-primary w-100">Continuar Curso</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Sección de progreso general -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Mi progreso</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Progreso promedio en todos los cursos</h5>
                        <div class="progress" style="height: 25px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 42%" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100">42%</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5>Estadísticas</h5>
                        <div class="d-flex justify-content-between">
                            <div class="text-center">
                                <h4>3</h4>
                                <p class="text-muted">Cursos activos</p>
                            </div>
                            <div class="text-center">
                                <h4>15</h4>
                                <p class="text-muted">Lecciones completadas</p>
                            </div>
                            <div class="text-center">
                                <h4>8</h4>
                                <p class="text-muted">Horas de estudio</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Script para mostrar "No hay cursos" si el contenedor está vacío
    document.addEventListener('DOMContentLoaded', function() {
        const coursesContainer = document.getElementById('courses-container');
        const courseItems = coursesContainer.querySelectorAll('.col-md-4');
        const noCoursesMessage = document.getElementById('no-courses');
        
        // Verificar si hay cursos en el contenedor
        if (courseItems.length === 0) {
            noCoursesMessage.style.display = 'block';
        } else {
            noCoursesMessage.style.display = 'none';
        }
        
        // Añadir comportamiento a los botones de curso
        const continueButtons = document.querySelectorAll('.card-footer .btn');
        continueButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                // Esta función se puede modificar para enviar al usuario al curso correcto
                // Actualmente solo para demostración
                const courseTitle = this.closest('.card').querySelector('.card-title').textContent;
                alert('Redirigiendo al curso: ' + courseTitle);
            });
        });
    });
</script>
