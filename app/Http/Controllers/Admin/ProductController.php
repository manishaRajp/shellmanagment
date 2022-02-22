<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\productContract;
use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\storeRequest;
use App\Http\Requests\Product\updateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(productContract $productService)
    {
        $this->productService = $productService;
    }
 
    public function index(ProductDataTable $dataTable)
    {
        $productedit = Product::get();
        return $dataTable->render('admin.product.index', compact('productedit'));
    }

    
    public function create()
    {
        return view('admin.product.add');
    }

  
    public function store(storeRequest $request)
    {
        return $this->productService->store($request->all()); 
    }

   
    public function show($id)
    {
        //
    }

  

     public function edit(Request $request,$id)
     {
        $productedit  = Product::find($request->id);
        return response()->json(['data'=>$productedit]);
     }

    public function update(Request $request)
    {
        return $this->productService->update($request->all()); 
    }

  
    public function destroy(Request $request)
    {
        $delete = Product::where('id', $request->id)->delete();
        return response()->json(['data' => $delete]);
    }
}
