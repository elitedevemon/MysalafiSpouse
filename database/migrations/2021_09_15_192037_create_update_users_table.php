<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('update_users', function (Blueprint $table) {
            $table->id();
           
           
            $table->integer('user_id');
            $table->string('residence');
           
            $table->string('ethnicity');
            $table->integer('age');
            $table->string('height');
            $table->text('about');
            $table->string('potential_spouse');
            $table->string('scholars');
            $table->text('any_other_information');
           
            
            $table->string('guardian')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('update_users');
    }
}
