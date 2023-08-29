<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductParam extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'length',
        'width',
        'weight'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
