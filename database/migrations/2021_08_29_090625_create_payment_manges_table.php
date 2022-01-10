<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_manges', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('transaction_id')->nullable();
            $table->string('payment_method');
            $table->string('payment_status');
            $table->string('mtn_no')->nullable();
            $table->string('evidence')->nullable();
            $table->string('currency')->nullable();
            $table->string('amount')->nullable();
            $table->string('paid_against');
            $table->string('paid_by')->nullable();
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
        Schema::dropIfExists('payment_manges');
    }
}
