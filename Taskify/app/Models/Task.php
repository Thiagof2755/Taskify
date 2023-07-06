<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'title', 'description', 'due_date', 'status'];

    // Relacionamento com o usuário da tarefa
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}