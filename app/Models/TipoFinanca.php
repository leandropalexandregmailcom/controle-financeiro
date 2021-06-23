<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoFinanca extends Model
{
    use HasFactory;

    public $timestamp = false;

    protected $fillable = ['id_tipo_financa', 'nome', 'id_user', 'descricao', 'status', 'created_at', 'updated_at'];
}
