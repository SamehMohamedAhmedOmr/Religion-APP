<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');

            $table->unsignedInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('branches')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedInteger('chapter_id');
            $table->foreign('chapter_id')->references('id')->on('chapters')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedInteger('section_id');
            $table->foreign('section_id')->references('id')->on('sections')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->string('title');

            $table->longText('question');

            $table->longText('answer');

            $table->timestamps();
            $table->softDeletes();
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
