<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransaksiDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('transaksi_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transaksi_id');
            $table->string('product_id');
            $table->integer('user_id');
            $table->float('harga');
            $table->string('qty');
            $table->string('subTotal');
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
        //
    }
}
