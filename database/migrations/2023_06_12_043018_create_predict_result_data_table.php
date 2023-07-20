<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePredictResultDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predict_result_data', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('category_id');
            // $table->text('opinion');
            // $table->dateTime('date');
            // $table->string('category_prediction');
            $table->text('text');
            $table->text('sentiment');
            $table->double('confidence');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('predict_result_data');
    }
}
