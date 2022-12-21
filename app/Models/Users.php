<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'email',
        'username',
        'password',
        'is_admin',
        'is_active'
    ];

    public function documents() {
        return $this->hasMany(Documents::class, 'user_id', 'id');
    }
}
