<?php

namespace App\Models;

use App\Helper\DataViewer;
use App\Helper\HasManyRelation;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
			use HasManyRelation, DataViewer;

			protected $fillable = [
					'customer_id', 'date', 'due_date', 'discount',
					'terms_and_conditions'
			];

			protected $guarded = [
					'number', 'sub_total', 'total'
			];

			public static $columns = [
					'id', 'Issue Date', 'Due Date', 'Customer', 'Grand Total', 'Status'
			];

			protected $allowedFilters = [
					'id' ,'number', 'date', 'due_date', 'discount', 'total',
					'created_at',
					// nested
					'invoices.count', 'invoices.id', 'invoices.issue_date','invoices.due_date',
					'invoices.total', 'invoices.created_at'
			];
			protected $orderable = [
					'id' ,'number', 'date', 'due_date', 'discount', 'total',
					'created_at'
			];

			protected $dates = ['date', 'due_date'];

			public function customer()
	    {
	        return $this->belongsTo(Customer::class);
	    }

	    public function items()
	    {
	        return $this->hasMany(InvoiceItem::class);
	    }

	    public function setSubTotalAttribute($value)
	    {
	        $this->attributes['sub_total'] = $value;
	        $this->attributes['total'] = $value ;
	    }
}
