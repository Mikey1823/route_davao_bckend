<?php

use App\Models\JeepneyRoutes;
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

        Schema::create('pins', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(JeepneyRoutes::class, 'jeepney_route_id')->constrained()->cascadeOnDelete();
            $table->string('label');
            $table->geometry('geography_point', 'POINT', 4326);
            $table->boolean('is_major_hub')->default(false);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pins');
    }
};
