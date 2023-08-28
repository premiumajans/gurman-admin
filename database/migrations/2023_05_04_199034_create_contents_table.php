<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->longText('photo')->nullable();
            $table->string('slug')->unique();
            $table->foreignId('category_id')->unsigned();
            $table->integer('view')->default(0);
            $table->string('pdf')->nullable();
            $table->boolean('status')->default(1);
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
