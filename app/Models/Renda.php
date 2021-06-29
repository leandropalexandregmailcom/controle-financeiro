<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renda extends Model
{
    use HasFactory;

    public $table = "renda";
    public $timestamp = false;

    protected $fillable = ['id_renda', 'nome', 'descricao', 'id_categoria', 'data', 'status', 'created_at', 'updated_at'];
}
