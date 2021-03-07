<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ibox extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
    ];


    public function retentions(){
        return $this->hasMany(Iretetions::class);

    }

    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }


}