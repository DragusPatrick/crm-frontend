<?php

namespace App\Models;

use App\Helper\Dataviewer;
use App\Helper\HasManyRelation;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
     use HasManyRelation, DataViewer;

		 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'email', 'notes', 'address'
    ];

    protected $allowedFilters = [
        'id' ,'name', 'email', 'phone', 'address', 'notes',
        'created_at',
    ];
    protected $orderable = [
        'id' ,'name', 'email', 'phone', 'address', 'notes',
        'created_at',
    ];

		public function invoice()
		{
				return $this->hasMany(Customer::class);
		}
}
