<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

// Ruta principal
Route::get('/', function () {
    try {
        $latestNews = App\Models\News::where('is_published', true)
                        ->latest()
                        ->take(3)
                        ->get();
    } catch (\Exception $e) {
        // Si hay algún error, inicializa como array vacío
        $latestNews = collect();
    }
    
    return view('home.index', ['latestNews' => $latestNews]);
})->name('welcome');

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// Auth Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/home', function () {
        return view('dashboard.index');
    })->name('home');
    
    // Rutas de cursos
    Route::get('/miscursos', function () {
        return view('courses.index');
    })->name('miscursos');
    
    // Rutas de calendario
    Route::get('/calendario', function () {
        // Nota: Este es un placeholder hasta que se cree una vista de calendario
        return view('dashboard.index', ['message' => 'Calendario próximamente']);
    })->name('calendario');
});

// Rutas de noticias
Route::resource('news', NewsController::class);
