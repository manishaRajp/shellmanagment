<?php

namespace App\Http\Controllers\Api;


use App\Contracts\CustomerContract;
use App\Http\Controllers\Admin\OrderDetails;
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

    public function Register(Request $request)
    {
        $result = $this->userservices->Register($request->all());
        return $this->sendResponse($result, 'User Register successfully.', 200);
    }

    public function Login(Request $request)
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


    public function Order(Request $request)
    {
        $order = new order();
        $order->user_id = Auth::user()->id;
        $order->save();
        

        $orderid = order::select('id')->where('user_id',Auth::user()->id)->get();
        dd($orderid);
        $p_ids = explode(',', $request->product_id);
        foreach ($p_ids as $key => $p_id) {
            $orderdetails = new OrderDetails;
            
        }
        
    }



    


  

}



