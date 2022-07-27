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
        Schema::create('facturacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('clienteId')->unsigned();
            $table->bigInteger('productoId')->unsigned();
            $table->string('cliente');
            $table->string('direccion_cliente');
            $table->string('producto');
            $table->integer('cantidad');
            $table->float('precio',5,2);
            $table->float('ISV',5,2);
            $table->float('subtotal',5,2);
            $table->float('total',5,2);
            $table->timestamps();

            $table->foreign('clienteId')->references('id')->on('clientes');
            $table->foreign('productoId')->references('id')->on('productos');
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
