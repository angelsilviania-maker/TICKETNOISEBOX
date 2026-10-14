<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'customer_email',
        'total_price',
        'status',
    ];

     /**
     * Relasi ke OrderDetails (Satu order bisa ada di banyak detail pesanan)
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
