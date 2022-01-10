<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('dob');
            $table->string('gender');
            $table->string('profile_code');
            $table->string('residence');
            $table->string('type');
            $table->string('ethnicity');
            $table->integer('age');
            $table->string('height');
            $table->text('about');
            $table->string('potential_spouse');
            $table->string('scholars');
            $table->text('any_other_information');
            $table->string('visibility');
            $table->string('status');
            $table->string('guardian')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('dob');
            $table->dropColumn('gender');
            $table->dropColumn('profile_code');
            $table->dropColumn('residence');
            $table->dropColumn('type');
            $table->dropColumn('ethnicity');
            $table->dropColumn('age');
            $table->dropColumn('height');
            $table->dropColumn('about');
            $table->dropColumn('potential_spouse');
            $table->dropColumn('scholars');
            $table->dropColumn('any_other_information');
            $table->dropColumn('visibility');
            $table->dropColumn('status');
            $table->dropColumn('guardian');
           
        });
    }
}
