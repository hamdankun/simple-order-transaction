<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_number', 'order_date', 'note', 'shipping_number', 'status', 'total_qty', 'sub_total', 'shipping_fee', 'grand_total'
    ];

    public function details() {
    	return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public function customer() {
    	return $this->hasOne(OrderCustomerData::class, 'order_id');
    }
}
