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
        if(Schema::hasTable('producto_ingresados') && Schema::hasColumn('producto_ingresados', 'nombreProducto')) {
            Schema::table('producto_ingresados', function (Blueprint $table){
                $table->dropColumn('nombreProducto');
            });
        } 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('producto_ingresados', function (Blueprint $table) {
            //
        });
    }
};
