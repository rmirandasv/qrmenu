<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrmenuPageItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qrmenu_page_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('qrmenu_page_id');
            $table->string('item_name', 100);
            $table->string('item_desc', 255);
            $table->string('item_ṕhoto', 255)->nullable();
            $table->double('item_price', 12, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('qrmenu_page_id')->references('id')->on('qrmenu_pages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qrmenu_page_items');
    }
}
