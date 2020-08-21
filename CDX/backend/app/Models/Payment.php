<?php

namespace App\Models;

use App\Helper\DataViewer;
use App\Helper\HasManyRelation;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
		use HasManyRelation, DataViewer;

		protected $fillable = [
				'customer_id', 'date', 'bank', 'method', 'receipt_id',
				'amount', 'currency'
		];

		protected $allowedFilters = [
				'customer_id', 'date', 'bank', 'method', 'receipt_id',
				'amount', 'currency'
		];
		protected $orderable = [
				'customer_id', 'date', 'bank', 'method', 'receipt_id',
				'amount', 'currency'
		];

		public function customer()
		{
				return $this->belongsTo(Contact::class);
		}
}
