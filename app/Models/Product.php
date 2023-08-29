<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'slug',
        'category_id',
        'price',
        'created_by',
        'updated_by'
    ];

    public function params()
    {
        return $this->hasMany(ProductParam::class,'product_id','id');
    }

    public function scopeId($query,$id)
    {
        if (!is_null($id)){
            return $query->where('id',$id);
        }
        return $query;
    }

    public function scopeName($query,$name)
    {
        if (!is_null($name)){
            return $query->where('name',$name);
        }
        return $query;
    }

    public function scopeSlug($query, $slug)
    {
        if (!is_null($slug)){
            return $query->where('slug',$slug);
        }
        return $query;
    }

    public function scopeCategory_id($query,$category_id)
    {
        if (!is_null($category_id)){
            return $query->where('category_id',$category_id);
        }
        return $query;
    }

    public function scopePrice($query,$price)
    {
        if (!is_null($price)){
            return $query->where('price',$price);
        }
        return $query;
    }

    public function scopeLength($query,$length)
    {
        if (!is_null($length)){
            $query->whereHas('params',function ($q) use($length){
                $q->where('length',$length);
            })->get();
        }
    }

    public function scopeWidth($query,$width)
    {
        if (!is_null($width)){
            $query->whereHas('params',function ($q) use($width){
                $q->where('width',$width);
            })->get();
        }
    }

    public function scopeWeight($query,$weight)
    {
        if (!is_null($weight)){
            $query->whereHas('params',function ($q) use($weight){
                $q->where('weight',$weight);
            })->get();
        }
    }
}
