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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('description')->nullable();
            $table->string('slug')->index();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->integer('price')->index();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products',function (Blueprint $table){
            $table->dropIndex(['name']);
            $table->dropIndex(['slug']);
            $table->dropIndex(['price']);
        });
        Schema::dropIfExists('products');
    }
};
