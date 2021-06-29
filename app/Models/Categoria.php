<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    public $table = 'categoria';
    public $timestamp = false;

    protected $fillable = ['id_categoria', 'nome', 'descricao', 'nome_tipo_financa', 'tipo', 'id_user', 'status', 'create_date', 'update_date'];
}
