<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
						$table->bigIncrements('id');
						$table->string('number');
						$table->string('cif');
						$table->string('name');
						$table->string('reg_com');
						$table->string('client_code');
						$table->string('address');
						$table->string('country');
						$table->string('city');
						$table->string('iban');
						$table->string('bank');
						$table->string('email');
						$table->string('contact_id');
						$table->string('phone');
						$table->string('website');
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
        Schema::dropIfExists('customers');
    }
}
