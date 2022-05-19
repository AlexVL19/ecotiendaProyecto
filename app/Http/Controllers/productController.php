<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodobj = Products::all();

        return view('products.index', compact('prodobj'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catobj = Categories::all();
        return view('products.create', compact('catobj'));
    }

    public function search(Request $request)
    {
        $term = $request->input('term');

        $prosearch = Products::query()
            ->where('product_name', 'LIKE', "%{$term}%")
            ->get();

        return view('products.search', compact('prosearch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prodobj = new Products();

        $prodobj->product_name = $request->input('product_name');
        $prodobj->cost = $request->input('cost');
        $prodobj->desc = $request->input('desc');
        $prodobj->quantity = $request->input('quantity');
        $prodobj->status = $request->input('status');
        $prodobj->image = $request->input('image');
        $prodobj->cat_id = $request->input('cat_id');

        if ($request->hasFile('image')){
            $prodobj->image = $request->file('image')->store('public');
        }

        $prodobj->save();

        return redirect( route('products.index'));
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
        $prodobj = Products::find($id);
        $catobj = Categories::all();

        return view('products.edit', compact('prodobj', 'catobj'));


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
        $prodobj = Products::find($id);

        $prodobj->fill($request->except('image'));

        if ($request->hasFile('image')) {
            $prodobj->image = $request->file('image')->store('public');
        }

        $prodobj->save();

        return redirect( route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prodobj = Products::find($id);

        $urlimage = $prodobj->image;
        $imgname = str_replace('public/','\storage\\',$urlimage);

        $comproute = public_path().$imgname;

        unlink($comproute);
        $prodobj->delete();

        return redirect( route('products.index'));
    }
}
