<?php

use App\Models\Counter;
use Illuminate\Database\Seeder;

class CountersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

			 /*
			 *
			 * ********************** Invoice ***************************
			 *
			 */
			 Counter::create([
					 'key' => 'invoice',
					 'prefix' => 'CDX00'
					 'value' => '0'
			 ]);

			/*
			*
			* ********************** Customer ***************************
			*
			*/
			Counter::create([
					'key' => 'customer',
					'prefix' => 'CD-000'
					'value' => '0'
			]);

			/*
			*
			* ********************** Project ***************************
			*
			*/
			Counter::create([
					'key' => 'project',
					'prefix' => 'PJ-000'
					'value' => '0'
			]);
    }
}
