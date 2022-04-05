<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();

        // mengirim data ke view index
        return view('home', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-data');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|min:3|max:255',
            'category' => 'required|min:3|max:255',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        Product::create($validatedData);

        return redirect('/home')->with('success', 'Successfully added data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('edit-data', [
            'product' => Product::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $rules = ([
            'product_name' => 'required|min:3|max:255',
            'category' => 'required|min:3|max:255',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        $validatedData = $request->validate($rules);

        Product::where('id', $id)->update($validatedData);

        return redirect('/home')->with('success', 'Item data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product = Product::find($id);
        $product->delete();

        return redirect('/home')->with('success', 'Item data deleted successfully');
    }
}
