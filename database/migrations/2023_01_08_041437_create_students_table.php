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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId("workload_id")->constrained("workloads");
            $table->foreignId("colaborator_id")->constrained("colaborators");
            $table->foreignId("promotion_id")->constrained("promotions");
            $table->integer("nr_students")->unsigned()->default(0);
            $table->integer("days")->unsigned()->default(0);
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
        Schema::dropIfExists('students');
    }
};
