<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRabBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rab_barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rab_id');
            $table->foreignId('barang_id');
            $table->bigInteger('volume');
            $table->bigInteger('totalMaterial')->default('0');
            $table->bigInteger('totalJasa')->default('0');
            $table->string('keterangan', 255)->nullable();
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
        Schema::dropIfExists('rab_barangs');
    }
}
