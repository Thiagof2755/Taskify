<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'password'];
    public $timestamps = false;

    // Relacionamento com as tarefas do usuário
    public function tasks()
    {
        return $this->hasMany(Task::class, 'user_id');
    }
}

