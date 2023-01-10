<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_name');
            $table->tinyInteger('account_type')->comment('1=>Saving; 2=>Current;');
            $table->integer('account_number');
            $table->string('bank_name');
            $table->string('branch_name');
            $table->double('current_balance', 10, 2 )->nullable()->default(0);
            $table->tinyInteger('status')->default(1)->comment('1=>Active; 0=>Deactivate;');
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
        Schema::dropIfExists('bank_accounts');
    }
};
