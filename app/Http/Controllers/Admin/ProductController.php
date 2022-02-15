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
 
    public function index(ProductDataTable $dataTable,$id)
    {
        $product = Product::get();
        return $dataTable->render('admin.product.index', compact('product'));
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

   
    public function edit(ProductDataTable $dataTable,$id)
    {
        $product = Product::find( $id);
        return $dataTable->render('admin.product.index', compact('product'));
    }

    
    public function update(updateRequest $request, $id)
    {
        return $this->productService->store($request->all()); 
    }

  
    public function destroy($id)
    {
        //
    }
}
