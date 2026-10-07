<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::create('pedidos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('cliente');
        $table->string('postre'); // Ej: Tiramisú, Tres leches, Tartaletas
        $table->date('fecha_entrega');
        $table->string('estado')->default('Pendiente'); // Fases de tu Kanban: Pendiente, En Progreso, Completado
        $table->text('notas')->nullable(); // Detalles técnicos como uso de fondant o crema Bariloche
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
