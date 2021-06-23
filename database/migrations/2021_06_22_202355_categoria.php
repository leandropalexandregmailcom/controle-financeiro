<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Categoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria', function(Blueprint $table)
        {
            $table->increments('id_categoria');
            $table->string('nome', 255)->unique();
            $table->text('descricao', 255);
            $table->integer('status')->default(1);
            $table->unsignedBigInteger('id_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_tipo_financa')->references('id_tipo_financa')->on('tipo_financa');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('NULL ON UPDATE CURRENT_TIMESTAMP'))->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria');
    }
}
