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
    Schema::create('contracts', function (Blueprint $table) {
        $table->id();
        $table->string('nume');
        $table->string('prenume');
        $table->string('data_incepere');
        $table->string('data_incheiere');
        $table->text('locul_terenului');
        $table->decimal('suprafata_terenului', 8, 2);
        $table->text('mentiuni')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
