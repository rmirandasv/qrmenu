<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrmenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qrmenus', function (Blueprint $table) {
            $table->id();
            $table->string('name', 160);
            $table->string('qrcode', 255)->nullable();
            $table->string('cover', 255)->nullable();
            $table->unsignedBigInteger('manager_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('manager_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qrmenus');
    }
}
