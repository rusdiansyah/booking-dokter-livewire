<?php

use App\Models\Dokter;
use App\Models\Poli;
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
        Schema::create('jadwal_prakteks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Dokter::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Poli::class)->constrained()->cascadeOnDelete();
            $table->string('hari',30);
            $table->string('pukul',30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_prakteks');
    }
};
