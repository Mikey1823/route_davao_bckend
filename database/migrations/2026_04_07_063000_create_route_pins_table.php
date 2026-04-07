<?php

use App\Models\JeepneyRoutes;
use App\Models\Pins;
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
        Schema::disableForeignKeyConstraints();

        Schema::create('route_pins', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pins::class, 'pin_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(JeepneyRoutes::class, 'jeepney_route_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('route_pins');
    }
};
