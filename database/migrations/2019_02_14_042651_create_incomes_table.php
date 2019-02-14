<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'incomes', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->uuid( 'uuid' );
            $table->integer( 'user_id' );
            $table->date( 'date' )->default( null )->nullable();
            $table->string( 'source' )->default( null )->nullable();
            $table->decimal( 'amount', 10, 2 )->default( null )->nullable();
            $table->text( 'remarks' )->default( null )->nullable();
            $table->timestamps();
            $table->boolean( 'status' )->default( 9 )->comment( 'Active=1, Inactive=9' );
            $table->softDeletes();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'incomes' );
    }
}
