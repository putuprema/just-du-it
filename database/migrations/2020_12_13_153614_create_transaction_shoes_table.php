<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionShoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_shoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("qty");
            $table->unsignedBigInteger("price");
            $table->timestamps();

            $table->unsignedBigInteger("transaction_id");
            $table->foreign("transaction_id")
                ->references("id")->on("transactions")
                ->onUpdate("cascade")
                ->onDelete("cascade");

            $table->unsignedBigInteger("shoe_id");
            $table->foreign("shoe_id")
                ->references("id")->on("shoes")
                ->onUpdate("cascade")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_shoes');
    }
}
