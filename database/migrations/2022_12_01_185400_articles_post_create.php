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
            $table->longText('description');
            $table->text('excerpt');
            $table->string('image_path')->default('uploaded/images/office.png');
            $table->string('image_alternate')->default('Man sitting in office and working on computer');
            $table->integer('author_id');
            $table->integer('category_id');
            $table->timestamp('article_created_at')->nullable();
            $table->timestamp('article_updated_at')->nullable();
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
