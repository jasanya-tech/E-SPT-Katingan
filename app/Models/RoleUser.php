<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleUser extends Model
{
    use HasFactory, SoftDeletes;
    // private $table = 'role_users';
    // private $fillable = ['roleName', 'access'];

    protected $casts = [
        'access' => 'array'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
