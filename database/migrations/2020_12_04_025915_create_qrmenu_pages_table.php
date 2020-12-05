<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrmenuPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qrmenu_pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('qrmenu_id');
            $table->string('name', 100);
            $table->string('cover', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('qrmenu_id')->references('id')->on('qrmenus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qrmenu_pages');
    }
}
