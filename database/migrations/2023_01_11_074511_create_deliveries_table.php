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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId("workload_id")->constrained("workloads");
            $table->foreignId("colaborator_id")->constrained("colaborators");
            $table->foreignId("project_id")->constrained("projects");
            $table->integer("nr_hours")->unsigned()->default(0);
            $table->float("multiplier", 3, 1)->default(2.0);
            $table->boolean("temporary")->default(true);
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
        Schema::dropIfExists('deliveries');
    }
};
