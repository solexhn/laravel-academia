<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function enrolledCourses()
    {
        return $this->belongsToMany(Course::class, 'enrollments');
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }
    
    public function isAdmin()
    {
        return $this->role_id == 1; // Asumiendo que 1 es el ID del rol de administrador
    }
    
    public function isTeacher()
    {
        return $this->role_id == 2; // Asumiendo que 2 es el ID del rol de profesor
    }
    
    public function isStudent()
    {
        return $this->role && $this->role->name === 'student';
    }
}