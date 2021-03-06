<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fgretention extends Model
{
    public function box(){
        return $this->belongsTo(Box::class);
    }

    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
