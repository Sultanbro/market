<?php

namespace App\Http\Services\Cart;

use App\Models\Product;
use App\Repository\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class CartService implements CartServiceInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function add($id)
    {
        $product = $this->productRepository->findOrFail($id);
        $cart = session()->get('cart');
        // если корзина пуста и это первый товар
        if(empty($cart)) {
            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                ]
            ];
            session()->put(['cart', $cart]);
        }
        // если корзина не пуста, проверьте, существует ли этот товар, а затем увеличьте количество
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->push('cart', $cart);
        }
//     если товар не существует в корзине, добавьте в корзину с количеством = 1
        if($cart[$id]){
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
            ];
            session()->put('cart', $cart);
        }
        return $cart;
    }

    public function update(Request $request)
    {
        if($request->id & $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
        }
        return response(['success'=> true, 'message' => 'Корзина успешно обновлена'],200);
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return response(['success'=> true, 'message' => 'Продукт успешно удален'],200);
        }
    }
}


