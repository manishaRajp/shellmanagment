<?php

namespace App\Repositories;

use App\Contracts\productContract;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class productRepository implements productContract
{

    public function store(array $request)
    {
        Product::create($request);
        return response()->json(["statusCode" => 200]);
    }
    public function update(array $request)
    {
        $product = Product::find($request['id']);
        $product->update($request);
        return response()->json(['success' => 'Product updated successfully']);
    }
   
}
