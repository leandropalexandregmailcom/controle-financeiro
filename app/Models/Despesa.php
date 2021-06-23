<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    use HasFactory;

    public $timestamp = false;

    protected $fillable = ['id_despesa', 'nome', 'descricao', 'id_categoria', 'status', 'created_at', 'updated_at'];
}
