 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            // $table->bigIncrements('id');
            // $table->integer('from')->unsigned();
            // $table->integer('to')->unsigned();
            // $table->text('text');
            // $table->timestamps();
            $table->bigIncrements('id');
            $table->text('question')->nullable();
            $table->integer('asked_by')->unsigned();
            $table->integer('subject')->unsigned();
            $table->integer('releated_to')->default(false);
            $table->text('answer')->nullable();
            $table->timestamps();
            $table->timestamp('replied_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
