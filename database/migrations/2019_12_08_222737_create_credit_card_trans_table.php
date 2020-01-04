<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditCardTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_card_trans', function (Blueprint $table) {
            $table->increments('id');
            $table->date('trans_date');
            $table->string('particulars')->nullable();
            $table->enum('card', [1, 2]);
            $table->string('trans_by')->nullable();
            $table->decimal('amount', 10, 2)->default(0);
            $table->json('emi')->nullable();
            $table->timestamps();
            $table->enum('status', ['Paid', 'Unpaid'])->default('Unpaid');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credit_card_trans');
    }
}
