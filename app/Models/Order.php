<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'note',
        'delivered',
    ];

    public function items(){
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // if order is deleted than auto delete depended data
    public static function boot() {
        parent::boot();
        static::deleting(function($order) {
            $order->items()->delete();
        });
    }
}
