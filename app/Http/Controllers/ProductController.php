<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::latest()->paginate(20)->withQueryString();
        return view('stock/list',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stock/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'image' =>'nullable|max:1024',
            'description' => 'nullable',
            'type'=>'required',
            'weight'=>'required',
            'price' =>'required',
        ]);

        if($validator->fails()) {
                return $validator->errors();
        }

        $image = null;
        if($request->hasFile('image')) {
            $image = $request->file('image')->store('/products');
        }
        $input = $request->all();
        
        $add = new Product;
        $add->name = $input['name'];
        $add->user_id = $request->user()->id;
        $add->description = $input['description'];
        $add->type = $input['type'];
        $add->weight = $input['weight'];
        $add->price = $input['price'];
        $add->image = $image;
        $add->save();

        return redirect()->route('product.all');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('stock/show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
