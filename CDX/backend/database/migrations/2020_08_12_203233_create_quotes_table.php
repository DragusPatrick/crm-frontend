<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
						$table->increments('id');
						$table->integer('invoice_id')->unsigned();
						$table->integer('organization_id')->unsigned();
						$table->integer('project_id')->unsigned();
						$table->date('date');
						$table->string('status');
						$table->double('unit_price');
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
        Schema::dropIfExists('quotes');
    }
}
