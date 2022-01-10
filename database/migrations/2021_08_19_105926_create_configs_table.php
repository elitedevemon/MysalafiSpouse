<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->integer('email_match_request')->nullable();
            $table->integer('email_decision_request')->nullable();
            $table->string('stripe_client_id')->nullable();
            $table->string('stripe_secret_key')->nullable();
            $table->string('paypal_client_id')->nullable();
            $table->string('paypal_secret_key')->nullable();
            $table->string('match_request_fee')->nullable();
            $table->string('match_receive_fee')->nullable();
            $table->string('match_cacnel_fee')->nullable();
            $table->string('edit_profile_fee')->nullable();
            $table->string('anual_fee')->nullable();
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
        Schema::dropIfExists('configs');
    }
}
