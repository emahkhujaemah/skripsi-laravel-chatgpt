<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabellingDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labelling_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->text('opinion');
            $table->double('positif');
            $table->double('netral');
            $table->double('negatif');
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
        Schema::dropIfExists('labelling_data');
    }
}
