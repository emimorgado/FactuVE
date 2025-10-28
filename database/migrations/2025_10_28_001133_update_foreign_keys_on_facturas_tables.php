<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    // Primero, elimina las restricciones actuales
    Schema::table('facturas', function (Blueprint $table) {
        $table->dropForeign(['cliente_id']);
    });

    Schema::table('factura_items', function (Blueprint $table) {
        $table->dropForeign(['producto_id']);
    });

    // Luego, vuelve a crearlas con 'restrict'
    Schema::table('facturas', function (Blueprint $table) {
        $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('restrict');
    });

    Schema::table('factura_items', function (Blueprint $table) {
        $table->foreign('producto_id')->references('id')->on('productos')->onDelete('restrict');
    });
}

public function down()
{
    // Revertir a 'cascade' si es necesario
    Schema::table('facturas', function (Blueprint $table) {
        $table->dropForeign(['cliente_id']);
        $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
    });

    Schema::table('factura_items', function (Blueprint $table) {
        $table->dropForeign(['producto_id']);
        $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
    });
}
};
