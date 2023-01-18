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
        Schema::create('promotion_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('ve_present')->default(0);
            $table->integer('ve_distance')->default(0);
            $table->integer('ei')->default(0);
            $table->integer('ss_present')->default(0);
            $table->integer('ss_distance')->default(0);
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
        Schema::dropIfExists('promotion_types');
    }
};
