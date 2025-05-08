<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">
        <!-- Botón para mostrar/ocultar el sidebar -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>
            <li class="nav-item d-none d-md-block"><a href="/" class="nav-link">Home</a></li>
            <li class="nav-item d-none d-md-block"><a href="{{ route('news.index') }}" class="nav-link">Noticias</a></li>
        </ul>
        
        <!-- Links del lado derecho -->
        <ul class="navbar-nav ms-auto">
            <!-- Buscador -->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="bi bi-search"></i>
                </a>
            </li>
            
            <!-- Mensajes -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-bs-toggle="dropdown" href="#">
                    <i class="bi bi-chat-text"></i>
                    <span class="navbar-badge badge text-bg-danger">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <!-- Mensajes aquí -->
                    <a href="#" class="dropdown-item dropdown-footer">Ver todos los mensajes</a>
                </div>
            </li>
            
            <!-- Notificaciones -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-bs-toggle="dropdown" href="#">
                    <i class="bi bi-bell-fill"></i>
                    <span class="navbar-badge badge text-bg-warning">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <!-- Notificaciones aquí -->
                    <a href="#" class="dropdown-item dropdown-footer">Ver todas las notificaciones</a>
                </div>
            </li>
            
            <!-- Pantalla completa -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                    <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                    <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                </a>
            </li>
            
            <!-- Usuario -->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img src="/dist/assets/img/user2-160x160.jpg" class="user-image rounded-circle shadow" alt="User Image" />
                    <span class="d-none d-md-inline">
                        @auth
                            {{ Auth::user()->name }}
                        @else
                            Invitado
                        @endauth
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <!-- Usuario -->
                    <li class="user-header text-bg-primary">
                        <img src="/dist/assets/img/user2-160x160.jpg" class="rounded-circle shadow" alt="User Image" />
                        <p>
                            @auth
                                {{ Auth::user()->name }}
                                <small>Miembro desde {{ Auth::user()->created_at->format('M. Y') }}</small>
                            @else
                                Invitado
                                <small>No has iniciado sesión</small>
                            @endauth
                        </p>
                    </li>
                    
                    <!-- Menú de usuario -->
                    <li class="user-body">
                        <div class="row">
                            <div class="col-4 text-center"><a href="#">Perfil</a></div>
                            <div class="col-4 text-center"><a href="#">Cursos</a></div>
                            <div class="col-4 text-center"><a href="#">Notas</a></div>
                        </div>
                    </li>
                    
                    <!-- Footer de usuario -->
                    <li class="user-footer">
                        @auth
                            <a href="#" class="btn btn-default btn-flat">Perfil</a>
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-default btn-flat float-end">Cerrar sesión</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-default btn-flat">Iniciar sesión</a>
                            <a href="{{ route('register') }}" class="btn btn-default btn-flat float-end">Registrarse</a>
                        @endauth
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>