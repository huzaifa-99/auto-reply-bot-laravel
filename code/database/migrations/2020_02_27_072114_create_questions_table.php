<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->integer('m_id');
            $table->integer('subject')->unsigned();
            $table->text('question');
            $table->text('answer');
            $table->boolean('is_active')->default(1);
            $table->integer('uploaded_by_admin')->unsigned();
            $table->timestamps();
            // $table->timestamp('replied_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
