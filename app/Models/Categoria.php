<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['id_categoria', 'nome', 'descricao', 'tipo', 'id_user', 'status', 'create_date', 'update_date'];
}
