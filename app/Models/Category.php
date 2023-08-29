<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_id',
        'name',
        'created_by',
        'updated_by'
    ];

    public function children()
    {
        return $this->hasMany(self::class,'parent_id')->with(['children','products']);
    }

    public function products()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }

}
