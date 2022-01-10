<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTawkTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tawk_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('tawk_id');
            $table->string('nombre');
            $table->string('nombre_solicitante');
            $table->string('correo_solicitante');
            $table->string('asunto');
            $table->longText('mensaje');
            $table->string('fecha_ingreso');
            $table->string('fecha_solucion')->nullable();
            $table->integer('agente_solicitante_id')->nullable();
            $table->string('agente_solicitante_correo')->nullable();
            $table->integer('usuario_asignado_id')->nullable();
            $table->integer('estado_ticket_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tawk_tickets');
    }
}
