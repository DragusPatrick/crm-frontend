<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
		protected $fillable = [
			'overview',
			'status',
			'budget',
			'due_date',
			'start_date',
			'name',
			'customer_id'
		];

		public function customer()
		{
			return $this->belongsTo(Customer::class);
		}

		public function quote()
		{
			return $this->belongsTo(Quote::class);
		}

		public function contact()
		{
			return $this->belongsTo(Contact::class);
		}
}
