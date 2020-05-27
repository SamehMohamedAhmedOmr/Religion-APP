<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_keywords', function (Blueprint $table) {

            $table->unsignedInteger('keyword_id');
            $table->foreign('keyword_id')->references('id')->on('keywords')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedInteger('question_id');
            $table->foreign('question_id')->references('id')->on('questions')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->primary(['keyword_id' , 'question_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions_keywords');
    }
}
