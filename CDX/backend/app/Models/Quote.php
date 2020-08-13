<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
		/**
		* The attributes that are mass assignable.
		*
		* @var array
		*/
		protected $fillable = [
			'status', 'date', 'unit_price',
		];

		public function customer()
		{
			return $this->belongsTo(Customer::class);
		}

		/**
		* Get the projects record associated with the user.
		*/
		public function invoice()
		{
			return $this->belongsTo(Invoice::class);
		}

		/**
		* Get the projects record associated with the user.
		*/
		public function project()
		{
			return $this->belongsTo(Project::class);
		}
}
