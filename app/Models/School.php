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

    public function adminUser()
    {
        return $this->belongsTo(User::class, 'users');
    }

    /**
     * 定义用户关联
     *
     */
    public function users(){
        return $this->belongsToMany(User::class,'school_user')->withTimestamps();
    }
}
