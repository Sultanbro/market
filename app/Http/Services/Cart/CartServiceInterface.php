<?php

namespace App\Http\Services\Cart;

use Illuminate\Http\Request;

interface CartServiceInterface
{
    public function add($id);
    public function update(Request $request);
    public function remove(Request $request);

}
