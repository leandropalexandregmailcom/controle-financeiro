<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    use HasFactory;

    protected $fillable = ['id_despesa', 'nome', 'descricao', 'id_categoria', 'status', 'create_date', 'update_date'];
}
