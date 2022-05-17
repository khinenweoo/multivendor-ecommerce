<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use Illuminate\Support\Str;
class DummyAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $products = Product::all();

        $response = array('response' => ["message"=>"", "data"=> $products], 'success'=>true);
        return Response::json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:products,product_slug',
            'sku' => 'required',
            'short_description' => 'string|min:10|max:100',
            'childcategory' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,brand_id',
            'seller_id' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'video' => 'nullable',
            'stock_status' => 'required',
            'quantity' => 'required|integer|min:1',
            'weight' => 'required|string',
            'price' => 'required|numeric',
            'discount' => 'numeric|nullable|max:80',
            'description' => 'string',
            'conditions' => 'required|in:new,popular,recommend',
            'status' => 'required'
        ];

        $response = array('response' => '', 'success'=> false);
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        }else{

            if($image = $request->file('image')){

                $image_name = Str::random(20);
                $ext = strtolower($image->getClientOriginalExtension()); 
                $imageFullName = $image_name.'.'.$ext;

                $path = $image->storeAs('products', $imageFullName, 'public');
                

                $product = new Product([
                    'category_id' => $request->get('childcategory'),
                    'brand_id' => $request->get('brand_id'),
                    'seller_id' => $request->get('seller_id'),
                    'product_name' => $request->get('name'),
                    'product_slug' => $request->get('slug'),
                    'sku' => $request->get('sku'),
                    'short_description' => $request->get('short_description'),
                    'product_image' => $imageFullName,
                    'stock_status' => $request->get('stock_status'),
                    'quantity' => $request->get('quantity'),
                    'weight' => $request->get('weight'),
                    'price' => $request->get('price'),
                    'discount' => $request->get('discount'),
                    'description' => $request->get('description'),
                    'conditions' => $request->get('conditions'),
                    'status' => $request->get('status'),
                    'added_by' => $request->get('added_by'),
                ]);
    
                $product->save();
                $response['response'] = ["message"=> "The product has been created successfully", "data"=>$product];
                $response['success'] = true;
            }
        }
        return Response::json($response, 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
