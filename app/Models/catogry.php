<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catogry extends Model
{
    use HasFactory;

    protected $guarded = [


    ];


    public function subcategories()
    {
        return $this->hasMany(subcategory::class);
    }
}
