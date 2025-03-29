<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name', // ✅ Allow mass assignment for customer_name
        'email', // ✅ Allow mass assignment for email
        'product_id', // ✅ Allow mass assignment for product_id
        'quantity', // ✅ Allow mass assignment for quantity
    ];

    // Define relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
