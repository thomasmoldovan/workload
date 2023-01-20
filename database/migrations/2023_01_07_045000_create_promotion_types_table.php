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
            $table->float('ve_present', 5, 2)->default(0);
            $table->float('ve_distance', 5, 2)->default(0);
            $table->float('ei', 5, 2)->default(0);
            $table->float('ss_present', 5, 2)->default(0);
            $table->float('ss_distance', 5, 2)->default(0);
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
