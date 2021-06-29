<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Renda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renda', function(Blueprint $table)
        {
            $table->increments('id_renda');
            //$table->unsignedBigInteger('id_categoria')->references('id_categoria')->on('categoria');
            $table->string('nome', 255);
            $table->text('descricao', 255);
            $table->integer('status')->default(1);
            $table->timestamp('data')->nullable();
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
        Schema::dropIfExists('renda');
    }
}
