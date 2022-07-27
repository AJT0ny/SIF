<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('categoriaId')->unsigned();
            $table->bigInteger('proveedorId')->unsigned();
            $table->string('nombre')->unique();
            $table->string('descripcion');
            $table->float('precio',5,2);
            $table->integer('existencia');
            $table->string('presentacion');
            $table->timestamps();

            $table->foreign('categoriaId')->references('id')->on('categorias');
            $table->foreign('proveedorId')->references('id')->on('provedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
