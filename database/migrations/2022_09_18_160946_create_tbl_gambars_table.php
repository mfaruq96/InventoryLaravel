<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblGambarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_gambars', function (Blueprint $table) {
            $table->mediumIncrements('id_gambar');
            $table->unsignedMediumInteger('id_produk')->nullable();
            $table->string('nama_produk', 200)->nullable();
            $table->timestamps();

            // relasi id_produk dengan tbl_produks
            $table->foreign('id_produk')->references('id_produk')->on('tbl_produks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_gambars');
    }
}
