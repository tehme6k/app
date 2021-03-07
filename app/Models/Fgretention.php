<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fgretention extends Model
{
    use SoftDeletes;

    public function box(){
        return $this->belongsTo(FGBox::class);
    }

    public function user(){
        return $this->belongsTo(User::class)->whereId(1);
    }

    public function getProductAttribute(){
        return Product::where('id', $this->lot_id)->first();
    }

    public function getLotIdAttribute(){
        return substr($this->lot, 0, 4);
    }


    protected $appends = ['product'];













}
