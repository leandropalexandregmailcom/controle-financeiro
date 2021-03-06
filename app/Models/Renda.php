<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Renda extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = "renda";
    public $timestamp = false;

    protected $fillable = ['id_renda', 'nome', 'descricao', 'id_categoria', 'data', 'status', 'created_at', 'updated_at'];
}
