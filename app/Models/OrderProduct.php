<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasOne, HasMany, BelongsTo};
use App\Models\{Order,Product};

class OrderProduct extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
