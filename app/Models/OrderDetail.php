<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id',
        'event_id',
        'quantity',
        'subtotal',
    ];

    /**
     * Relasi ke Order (Detail ini milik satu order utama)
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Relasi ke Event (Detail ini merujuk ke satu konser tertentu)
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
