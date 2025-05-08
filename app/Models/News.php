<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    /*
    Permite usar el sistema de factories de Laravel para generar instancias
    del modelo de forma automatizada, útil especialmente en:
        - Pruebas automatizadas (phpunit)
        - Seeders (php artisan db:seed)
        - Poblado masivo de datos (factory()->count(10)->create())
    
    */

    use HasFactory, SoftDeletes;
    
    
    protected $table = 'news';

    /*
        Define qué campos pueden ser asignados en masa.
        Laravel protege por defecto contra Mass Assignment Vulnerabilities, y si no declara
        un News::create($request->all()) fallaría o permitiría inyectar campos peligrosos.
        
    */

    protected $fillable = [
        'title',
        'content',
        'is_published',
        'published_at',
        'user_id',
    ];

    /*
    Transforma automáticamente ciertos campos al tipo correcto cuando los usas desde Laravel
        - is_published: booleano (true/false)
        - published_at: fecha y hora (Carbon)
    
    */

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
