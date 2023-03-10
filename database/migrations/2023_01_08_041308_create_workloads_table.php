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
        Schema::create('workloads', function (Blueprint $table) {
            $table->id();
            $table->foreignId("colaborator_id")->constrained("colaborators");
            $table->integer("national_days")->unsigned()->default(0);
            $table->integer("campus_days")->unsigned()->default(0);
            $table->integer("delivery_days")->unsigned()->default(0);
            $table->float("project_weeks")->decimal(10, 2)->unsigned()->default(0);
            $table->float("project_guidance")->decimal(10, 2)->unsigned()->default(0);
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
        Schema::dropIfExists('workloads');
    }
};
