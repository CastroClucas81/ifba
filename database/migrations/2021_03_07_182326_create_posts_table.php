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
            $table->string('NomeAutorPublicacao', 200);
            $table->integer('DestinoPost');
            $table->string('NomeDestinoPost', 60);
            $table->string('tituloPost', 100);
            $table->longText('DescricaoPost');
            $table->longText('CorpoPost')->nullable();
            $table->string('ImgPost', 100)->nullable();
            $table->string('NomeImgPost', 100)->nullable();
            $table->string('AnexoPost', 100)->nullable();
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
        Schema::dropIfExists('posts');
    }
}
