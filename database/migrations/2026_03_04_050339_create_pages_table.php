<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('header_title');
            $table->string('hero_title');
            $table->text('hero_description');
            $table->string('hero_image')->nullable();
            $table->string('hero_button_title');
            $table->enum('hero_button_color', ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark', 'link'])->default('primary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
