<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;



    public function products()
    {
        return $this->belongsToMany(Product::class,'products_offers','offer_id','product_id')->withTimestamps()->withPivot('price_after_offer');
    }
}
