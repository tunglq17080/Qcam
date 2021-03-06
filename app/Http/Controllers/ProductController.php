<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $product = Product::findOrFail($id);
        $category = Category::findOrFail($product->category_id);
        $product_relations = Product::where('category_id', $product->category_id)->where('id', '!=' , $product->id)->get();
        return view('page.product-detail', compact('category','product','product_relations'));
    }

    public function searchProducts(Request $request)
    {
        // $data = $request->all();
        $search = $request->search;
        $products =  new Product;
        if($search != "") {
            $products = $products->where('name', 'like', "%".$search."%");   
        }    
        $products = $products->paginate(3); 
        $categorys = Category::all();
        return view('page.shop', compact('search', 'products', 'categorys'));
    }

    public function getAll(Request $request)
    {
        // $products =  new Product;    
        // $products = Product::all(); 
        $categorys = Category::all();
        $products = Product::paginate(3); 
        return view('page.shop', compact('products', 'categorys'));
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
