<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_movements', function (Blueprint $table) {
            $table->id();
            $table->string('movement');
            $table->string('description');
            $table->string('from');
            $table->string('to');
            $table->foreignId('constructors_id')->constrained('constructors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_movements');
    }
};
