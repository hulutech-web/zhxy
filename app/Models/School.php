<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'domain', 'description', 'tel', 'email', 'icp', 'config', 'rate'];

    protected $casts = [
        'config' => 'json',
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'school_student');
    }

    public function adminUser()
    {
        return $this->belongsTo(User::class, 'users');
    }
}
