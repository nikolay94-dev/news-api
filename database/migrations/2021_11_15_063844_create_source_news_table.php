<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSourceNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('source_news', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('outer_id', 255)->nullable();
            $table->timestamps();
        });

        Schema::table('news', function (Blueprint $table) {
            $table->unsignedBigInteger('source_news_id');
            $table->foreign('source_news_id')->references('id')->on('source_news');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {

            $table->dropForeign('news_source_news_id_foreign');
            $table->dropColumn('source_news_id');
        });

        Schema::dropIfExists('source_news');
    }
}
