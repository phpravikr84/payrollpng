<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTransactionFeeWpac extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wpac_setting_banks', function (Blueprint $table) {
            $table->decimal('transaction_fee', 10,2)->after('bank_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wpac_setting_banks', function (Blueprint $table) {
            $table->dropColumn('transaction_fee');
        });
    }
}
