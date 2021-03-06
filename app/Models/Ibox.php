<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fgbox extends Model
{
    protected $fillable = [
        'name',
    ];


    public function retentions(){
        return $this->hasMany(Fgretetions::class);

    }

    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
