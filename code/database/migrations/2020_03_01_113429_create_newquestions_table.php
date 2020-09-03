<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewquestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newquestions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('subject')->unsigned();
            $table->text('question');
            // $table->text('answer');
            // $table->boolean('is_active')->default(1);
            // $table->integer('uploaded_by_admin')->unsigned();
            $table->integer('asked_by_userId')->unsigned();
            $table->string('asked_by_userName');
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
        Schema::dropIfExists('newquestions');
    }
}
