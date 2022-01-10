<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWantToSignupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('want_to_signups', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('gender');
            $table->string('ethnicity_residence');
            $table->string('age_height');
            $table->string('background');
            $table->string('potential');
            $table->string('before_married');
            $table->text('scholar');
            $table->string('other_scholar')->nullable();
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
        Schema::dropIfExists('want_to_signups');
    }
}
