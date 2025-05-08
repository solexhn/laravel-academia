<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <!-- Sidebar Brand -->
  <div class="sidebar-brand">
    <a href="/" class="brand-link">
      <img
        src="/dist/assets/img/cacademiaLogo.png"
        alt="cAcademia Logo"
        class="brand-image opacity-75 shadow" />
      <span class="brand-text fw-light">cAcademia</span>
    </a>
  </div>
  
  <!-- Sidebar Wrapper -->
  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <!-- Sidebar Menu -->
      <ul
        class="nav sidebar-menu flex-column"
        data-lte-toggle="treeview"
        role="menu"
        data-accordion="false">
        
        <!-- Dashboard / Home -->
        <li class="nav-item">
          <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
            <i class="nav-icon bi bi-house-fill"></i>
            <p>Inicio</p>
          </a>
        </li>
        
        <!-- Mis Cursos -->
        <li class="nav-item">
          <a href="#" class="nav-link {{ request()->is('miscursos*') ? 'active' : '' }}">
            <i class="nav-icon bi bi-book-fill"></i>
            <p>
              Mis Cursos
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/miscursos" class="nav-link {{ request()->is('miscursos') ? 'active' : '' }}">
                <i class="nav-icon bi bi-circle"></i>
                <p>Información</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/miscursos/inscripciones" class="nav-link {{ request()->is('miscursos/inscripciones') ? 'active' : '' }}">
                <i class="nav-icon bi bi-circle"></i>
                <p>Inscripciones</p>
              </a>
            </li>
          </ul>
        </li>
        
        <!-- Calendario -->
        <li class="nav-item">
          <a href="/calendario" class="nav-link {{ request()->is('calendario') ? 'active' : '' }}">
            <i class="nav-icon bi bi-calendar-week"></i>
            <p>Calendario</p>
          </a>
        </li>
        
        <!-- Noticias -->
        <li class="nav-item">
          <a href="{{ route('news.index') }}" class="nav-link {{ request()->routeIs('news.*') ? 'active' : '' }}">
            <i class="nav-icon bi bi-newspaper"></i>
            <p>Noticias</p>
          </a>
        </li>
        
        <!-- Login / Registro (solo para invitados) -->
        @guest
        <li class="nav-item">
          <a href="{{ route('login') }}" class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}">
            <i class="nav-icon bi bi-box-arrow-in-right"></i>
            <p>Iniciar Sesión</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('register') }}" class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}">
            <i class="nav-icon bi bi-person-plus"></i>
            <p>Registrarse</p>
          </a>
        </li>
        @endguest
        
        <!-- Sección de Administración (solo para admins) -->
        @auth
          @if(Auth::user()->isAdmin())
          <li class="nav-header">ADMINISTRACIÓN</li>
          <li class="nav-item">
            <a href="/admin/users" class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}">
              <i class="nav-icon bi bi-people"></i>
              <p>Usuarios</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/courses" class="nav-link {{ request()->is('admin/courses*') ? 'active' : '' }}">
              <i class="nav-icon bi bi-mortarboard"></i>
              <p>Gestión de Cursos</p>
            </a>
          </li>
          @endif
        @endauth
        
        <!-- Sección Profesores (solo para profesores) -->
        @auth
          @if(Auth::user()->isTeacher())
          <li class="nav-header">PROFESORADO</li>
          <li class="nav-item">
            <a href="/teacher/courses" class="nav-link {{ request()->is('teacher/courses*') ? 'active' : '' }}">
              <i class="nav-icon bi bi-easel"></i>
              <p>Mis Clases</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/teacher/students" class="nav-link {{ request()->is('teacher/students*') ? 'active' : '' }}">
              <i class="nav-icon bi bi-mortarboard"></i>
              <p>Alumnos</p>
            </a>
          </li>
          @endif
        @endauth
      </ul>
    </nav>
  </div>
</aside>