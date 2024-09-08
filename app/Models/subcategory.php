<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    use HasFactory;

protected $guarded = [];


    public function catogry()
    {
        return $this->belongsTo(catogry::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
