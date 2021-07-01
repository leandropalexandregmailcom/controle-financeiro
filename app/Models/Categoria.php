<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'categoria';
    public $timestamp = false;

    protected $fillable = ['id_categoria', 'nome', 'descricao', 'nome_tipo_financa', 'tipo', 'id_user', 'status', 'create_date', 'update_date'];
}
