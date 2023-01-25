<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use HasFactory, SoftDeletes, Notifiable;
    private $table = 'users';
    private $fillable = [
        'fullName',
        'email',
        'NIP',
    ];

    private $hidden = [
        'password',
    ];

    public function role()
    {
        return $this->belongsTo(RoleUser::class);
    }
}
