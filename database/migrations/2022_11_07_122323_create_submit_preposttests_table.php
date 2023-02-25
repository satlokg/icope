<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmitPreposttestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submit_preposttests', function (Blueprint $table) {
            $table->id();
            $table->string('email');
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
        Schema::dropIfExists('submit_preposttests');
    }
}
