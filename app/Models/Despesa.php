<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Despesa extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = "despesa";
    public $timestamp = false;

    protected $fillable = ['id_despesa', 'nome', 'descricao', 'data', 'id_categoria', 'status', 'created_at', 'updated_at'];
}
