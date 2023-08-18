<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * Os atributos que podem ser preenchidos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id',
        'title',
        'description',
        'due_date',
        'status',
    ];

    /**
     * Os atributos que devem ser convertidos em tipos específicos.
     *
     * @var array
     */
    protected $casts = [
        'due_date' => 'datetime', // O campo "due_date" será tratado como um objeto "datetime"
    ];

    /**
     * Obtém o funcionário responsável pela tarefa.
     */
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
