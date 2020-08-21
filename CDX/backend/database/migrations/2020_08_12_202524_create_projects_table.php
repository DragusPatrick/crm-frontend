<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
						$table->increments('id');
						$table->string('number');
						$table->integer('customer_id')->unsigned();
						$table->date('due_date');
						$table->date('start_date');
						$table->string('name');
						$table->text('overview');
						$table->string('budget');
						$table->string('status')->default('Pending');
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
        Schema::dropIfExists('projects');
    }
}
