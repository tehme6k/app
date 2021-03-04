<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'category_id',
        'name',
    ];


    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    
}
