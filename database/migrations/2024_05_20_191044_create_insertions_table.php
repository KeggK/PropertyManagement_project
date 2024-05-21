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
        Schema::create('insertions', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->string('title');
            $table->longText('description');
            $table->integer('no_rooms')->nullable();
            $table->integer('no_toilets')->nullable();            
            $table->string('dimensions');
            $table->enum ('tag', ["for_sale","for_rent"])->default("for_sale");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insertions');
    }
};
