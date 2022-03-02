<?php

namespace App\Http\Controllers\Api;


use App\Contracts\CustomerContract;
use App\Http\Controllers\Admin\OrderDetails;
use App\Http\Requests\Order\storeRequest;
use App\Http\Requests\User\loginRequest;
use App\Http\Requests\User\registerRequest;
use App\Models\order;
use App\Models\orderdetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends BaseController
{
    public function __construct(CustomerContract $userservices)
    {
        $this->userservices = $userservices;
    }

    public function Register(registerRequest $request)
    {
        $result = $this->userservices->Register($request->all());
        return $this->sendResponse($result, 'User Register successfully.', 200);
    }

    public function Login(loginRequest $request)
    {
        $result = $this->userservices->Login($request->all());
        if ($result['status'] == 200) {
            return $this->sendResponse($result['data'], $result['message']);
        } else {
            if ($result['status'] == 422) {
                return $this->sendValidationError('password', $result['message'], $result['status']);
            } else {
                return $this->sendValidationError('email', $result['message'], $result['status']);
            }
        }
    }

    public function Order(storeRequest $request)
    {      
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->amount = $request->amount;
        $order->discount_ammount = $request->discount_ammount;
        $order->discount_parsent = $request->discount_parsent;
        $order->save();
        $orderId = $order->id;

        
        $products = Product::whereIn('id', $request->product_id)->get();
        foreach ($products as $key => $product) {
            $orderDetails = new Orderdetail();
            $orderDetails->order_id = $orderId;
            $orderDetails->product_id = $product->id;
            $orderDetails->quantity = $request->quantity;
            $orderDetails->price = $product->price;
            $orderDetails->total_price = $request->quantity;
            $orderDetails->discount_price = $request->discount_price;
            $orderDetails->save();
        
        }
        $data = Order::with('orderDetails')->where('id', $orderId)->first();
        return $this->sendResponse($data, 'Order done successfully.', 200);
    
    }

}
