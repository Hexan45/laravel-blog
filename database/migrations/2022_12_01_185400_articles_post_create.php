<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('excerpt');
            $table->string('image_path')->default('uploaded/images/office.png');
            $table->string('image_alternate')->default('Man sitting in office and working on computer');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamp('article_created_at')->useCurrent();
            $table->timestamp('article_updated_at')->nullable();
            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('articles_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
