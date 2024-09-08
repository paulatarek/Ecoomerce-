<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function subcatogery()
    {
        return $this->belongsTo(subcategory::class);
    }

    public function offers()
    {
        return $this->belongsToMany(Offer::class,'products_offers','product_id','offer_id')->withTimestamps()->withPivot('price_after_offer');
    }

    public function specs()
    {
        return $this->belongsToMany(Spec::class,'products_specs','product_id','spec_id')->withTimestamps()->withPivot('value');
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'carts','product_id','user_id')->withTimestamps()
        ->withPivot('qty');
    }

    public function users_wishlist()
    {
        {
            return $this->belongsToMany(User::class,'wishlist','product_id','user_id')->withTimestamps();

        }
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class,'orders_products','product_id','order_id');
    }

}
