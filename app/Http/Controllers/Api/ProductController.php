<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFilterRequest;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function productFilter(ProductFilterRequest $params)
    {
        return Product::with('params')
            //product
            ->id(isset($params['id']) ? $params['id'] : null)
            ->name(isset($params['name']) ? $params['name'] : null)
            ->slug(isset($params['slug']) ? $params['slug'] : null)
            ->category_id(isset($params['category_id']) ? $params['category_id'] : null)
            ->price(isset($params['price']) ? $params['price'] : null)
            //product_params
            ->length(isset($params['length']) ? $params['length'] : null)
            ->width(isset($params['width']) ? $params['width'] : null)
            ->weight(isset($params['weight']) ? $params['weight'] : null)
            ->get();
    }
}

