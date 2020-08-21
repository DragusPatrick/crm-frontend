<?php

namespace App\Models;

use App\Helper\DataViewer;
use App\Helper\HasManyRelation;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
		use HasManyRelation, DataViewer;

		protected $fillable = [
				'number', 'name', 'reg_com', 'cif', 'client_code', 'address',
				'country', 'city', 'bank', 'iban', 'email',
				'contact_id', 'phone', 'website'
		];

		protected $allowedFilters = [
				'number', 'id' ,'number', 'date', 'due_date', 'discount', 'total',
				'created_at',
				// nested
				'invoices.count', 'invoices.id', 'invoices.issue_date','invoices.due_date',
				'invoices.total', 'invoices.created_at'
		];
		protected $orderable = [
				'number', 'id' ,'number', 'date', 'due_date', 'discount', 'total',
				'created_at'
		];

		public function invoice()
		{
				return $this->hasMany(Invoice::class);
		}

		public function payments()
		{
				return $this->hasMany(Payment::class);
		}

		public function contact()
		{
				return $this->belongsTo(Contact::class);
		}
}
