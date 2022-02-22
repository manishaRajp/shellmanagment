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
        $image = uploadFile($request['image'], 'ProductImage');
        $input = $request;
        $input['image'] = $image;
        Product::create($input);
        return response()->json(["statusCode" => 200]);
    }
    public function update(array $request)
    {

        $product = Product::find($request['id']);
        if (isset($request['image'])) {
            $image = uploadFile($request['image'], 'ProductImage');
        } else {
            $image = $product->getRawOriginal('image');
        }
        $input = $request;
        $input['image'] = $image;
        $product->update($input);
        return response()->json(['success' => 'Product updated successfully']);
        
    
    }
   
}
