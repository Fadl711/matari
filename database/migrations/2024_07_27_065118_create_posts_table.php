<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.column:
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('titleart');
            $table->string(column:'body');
            $table->string(column:'imgart');
            $table->string(column:'likeart');
            $table->string(column:'noteart');
            $table->string(column:'linknote');
            
            $table->unsignedBigInteger(column:'idsection');
            $table->unsignedBigInteger(column:'userid');
            $table->foreign('idsection')->references('id')->on('sections');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
