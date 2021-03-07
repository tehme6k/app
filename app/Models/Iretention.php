<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Iretention extends Model
{
    use SoftDeletes;
    public function box(){
        return $this->belongsTo(IBox::class);
    }

    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
