<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmitAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submit_assessments', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->integer('module_id')->nullable();
            $table->enum('type',['pre','post'])->nullable();
            $table->integer('assessment_id');
            $table->integer('aoption_id');
            $table->string('correct')->default('no');
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
        Schema::dropIfExists('submit_assessments');
    }
}
