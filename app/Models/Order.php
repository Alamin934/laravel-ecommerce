<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasOne, HasMany, BelongsTo};
use App\Models\User;

class Order extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function customer(){
        return $this->belongsTo(User::class);
    }

    public function processor(){
        return $this->hasOne(User::class, 'processed_by');
    }

    public function products(){
        return $this->hasMany(OrderProduct::class);
    }
}
