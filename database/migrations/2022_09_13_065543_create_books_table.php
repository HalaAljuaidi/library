<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date_of_issue');
            $table->enum('status',['available','not available']);
            $table->foreignId('author_id')->constrained('authors');
            $table->foreign('author_id')->references('id')->on('authors');
            $table->foreignId('section_id')->constrained('sections');
            $table->foreign('section_id')->references('id')->on('sections');
            $table->foreignId('metaphor_id')->constrained('metaphors');
            $table->foreign('metaphor_id')->references('id')->on('metaphors');
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
        Schema::dropIfExists('books');
    }
}
