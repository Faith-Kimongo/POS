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
            $table->string('session_id');
            $table->string('product_id');
            $table->string('hotel_id');
            $table->string('branch_id');
            $table->string('quantity');
            $table->string('amount');
            $table->string('table_id');
            $table->string('status')->nullable();
            $table->string('user_id')->nullable();
            $table->string('paid')->nullable();
            $table->string('checkout_id')->nullable();
            $table->string('points')->nullable();
            $table->softdeletes();
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
        Schema::dropIfExists('carts');
    }
}
