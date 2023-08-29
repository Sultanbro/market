<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function store(Request $request)
    {
        if(empty($request->user_id)){
            foreach ($request->products as $product){
                Order::query()->firstOrCreate([
                    'user_email' => $request->email,
                    'user_phone' => $request->phone,
                    'product_id' => $product['id'],
                    'product_name' => $product['name'],
                    'product_price' => $product['price']
                ]);
            }
        }else{
            $user = User::query()->where('id',$request->user_id)->first();
            foreach ($request->products as $product){
                Order::query()->firstOrCreate([
                    'user_id' => $user['id'],
                    'user_email' => $user['email'],
                    'user_phone' => $user['phone'],
                    'product_id' => $product['id'],
                    'product_name' => $product['name'],
                    'product_price' => $product['price']
                ]);
            }
        }
        return response()->json(['success' => true,'message' => 'Заявка успешно офрмлена!']);
    }

    public function orderUser($user_id)
    {
        return Order::query()->where('user_id',$user_id)->get();
    }

    //Условно для админки
    public function index()
    {
        return Order::all();
    }

    public function show($id)
    {
        return Order::query()->findOrFail($id);
    }

    public function update(Request $request,$id)
    {
        $model = Order::query()->findOrFail($id);
        return $model->update($request->all());
    }

    public function destroy($id)
    {
        return Order::query()->findOrFail($id)->delete();
    }
}
