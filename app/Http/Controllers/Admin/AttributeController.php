<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class AttributeController extends Controller
{
    /**
     * @var Attribute
     */
    private $attribute;

    /**
     * @var product
     */
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    /**
     * 
     * 
     * Show the form for creating a new attr from product show.
     * @param int $product_id
     * @return view
     */
    public function create($product_id)
    {
        if($product_id){
            return view('attribute.create')->with('product_id', $product_id);
        }else{
            return back()->with('error', 'Product not found');
        }
    }

    /**
     * Show the add attribute component
     *
     * @param Request $request
     * @return Component view
     */
    public function saveAttribute(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required|numeric',
            'attr_name' => 'required',
            'value' => 'required'
        ]);
        $attr = $this->storeAttr($request);
        session()->flash('message', 'New attribute has been created successfully!');
        return response()->json(['data'=>$attr]);
    }

    /**
     * @param $request
     * @return mixed
     */
    private function storeAttr($request)
    {
        $values = [];

        foreach (array_filter($request->input('value')) as $value) {
            array_push($values, [
                'value' => $value
            ]);
        }
        //find attribute product
        $product = $this->product->findOrFail($request->input('product_id'), 'product_id');

        //save attribute name to this product's attr table
        $attribute = $product->attributes()->create(['attr_name'=>$request->input('attr_name')]);

        //use createMany method to create multiple related models
        return $attribute->attributeValues()->createMany($values);
    }

    public function deleteAttribute($id)
    {
        $attr = Attribute::find($id);
        $attr->attributeValues()->delete();
        $attribute = $attr->delete();
        session()->flash('message', 'Attribute Deleted Successfully.');
        return response()->json(['success'=>'Attribute Deleted Successfully.']);
    }
}
