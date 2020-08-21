<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
						$table->string('number')->unique();
						$table->integer('customer_id')->unsigned();
						$table->date('date');
						$table->string('bank');
						$table->string('method');
						$table->integer('receipt_id')->unsigned()->nullable();
						$table->string('currency');
						$table->string('amount');
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
        Schema::dropIfExists('payments');
    }
}
