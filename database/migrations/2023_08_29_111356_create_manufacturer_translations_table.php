<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('manufacturer_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manufacturer_id')->unsigned();
            $table->string('locale')->index();
            $table->longText('name');
            $table->unique(['manufacturer_id', 'locale']);
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('manufacturer_translations');
    }
};
