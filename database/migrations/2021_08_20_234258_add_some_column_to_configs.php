<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnToConfigs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('configs', function (Blueprint $table) {
            $table->string('bank_western');
            $table->string('bracnh_name');
            $table->string('iban');
            $table->string('instagram_client_id');
            $table->string('instagram_secret_key');
            $table->string('match_request_fee_euro');
            $table->string('match_cacnel_fee_euro');
            $table->string('edit_profile_fee_euro');
            $table->string('anual_fee_euro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('configs', function (Blueprint $table) {
            $table->dropColumn('bank_western');
            $table->dropColumn('bracnh_name');
            $table->dropColumn('iban');
            $table->dropColumn('instagram_client_id');
            $table->dropColumn('instagram_secret_key');
            $table->dropColumn('match_request_fee_euro');
            $table->dropColumn('match_cacnel_fee_euro');
            $table->dropColumn('edit_profile_fee_euro');
            $table->dropColumn('anual_fee_euro');
        });
    }
}
