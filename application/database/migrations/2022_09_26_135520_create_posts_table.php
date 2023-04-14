<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', '32');
            $table->string('slug', '191');
            $table->text('content');
            $table->string('category', '32');
            $table->timestamps();
        });

        Schema::create('image_post', function (Blueprint $table) {
            $table->id();
            $table->integer('post_id');
            $table->string('files', '32');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
