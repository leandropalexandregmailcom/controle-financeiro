<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    use HasFactory;

    public $table = "despesa";
    public $timestamp = false;

    protected $fillable = ['id_despesa', 'nome', 'descricao', 'data', 'id_categoria', 'status', 'created_at', 'updated_at'];
}
