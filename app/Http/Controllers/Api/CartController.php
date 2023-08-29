<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\Cart\CartServiceInterface;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;

class CartController extends Controller
{
    /**
     * @var CartServiceInterface
     */
    private $cartService;

    /**
     * CartController constructor.
     * @param CartServiceInterface $cartService
     */
    public function __construct(CartServiceInterface $cartService)
    {
        $this->cartService = $cartService;
    }

    public function add($id)
    {
        return $this->cartService->add($id);
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
