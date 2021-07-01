<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormaRecebimento extends Model
{
    use HasFactory;

    use SoftDeletes;

    public $timestamps = false;
    public $table = "forma_recebimento";

    protected $fillable = ['nome', 'id_user', 'created_at', 'updated_at'];
}
