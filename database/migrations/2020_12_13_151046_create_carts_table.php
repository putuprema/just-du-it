<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("qty");
            $table->timestamps();

            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")
                ->references("id")->on("users")
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
        Schema::dropIfExists('carts');
    }
}
