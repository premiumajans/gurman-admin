<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('meta_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meta_id')->unsigned();
            $table->string('locale')->index();
            $table->longText('tag');
            $table->unique(['meta_id', 'locale']);
            $table->foreign('meta_id')->references('id')->on('metas')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('meta_translations');
    }
};
