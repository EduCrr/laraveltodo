<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $table = 'tarefas'; 
    public $timestamps = false;
    protected $fillable = ['titulo'];

    // const CREATED_AT = 'date_created'
    // const UPDATED_AT = 'date_update'
    use HasFactory;
}
