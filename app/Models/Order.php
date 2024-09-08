<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function cupon()
    {
        return $this->belongsTo(cupon::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class,'orders_products','order_id','product_id')
        ->withTimestamps()
        ->withPivot(['price','qty']);
    }

    public function addresses()
    {
        return $this->hasMany(OrderAddress::class);
    }

    public function billingaddress()
    {
        return $this->hasOne(OrderAddress::class,'order_id','id')
        ->where('type','=','billing');
    }
    public function shibbingaddress()
    {
        return $this->hasOne(OrderAddress::class,'order_id','id')
        ->where('type','=','shibbing');
    }
}
