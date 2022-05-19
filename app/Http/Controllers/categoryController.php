<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use PhpParser\Node\Stmt\Catch_;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catobj = Categories::all();

        return view('category.index', compact('catobj'));
    }

    public function search(Request $request)
    {
        $term = $request->input('term');

        $catsearch = Categories::query()
            ->where('cat_name', 'LIKE', "%{$term}%")
            ->get();

        return view('category.search', compact('catsearch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $catobj = new Categories();

        $catobj->cat_name = $request->input('cat_name');
        $catobj->status = $request->input('status');

        $catobj->save();
        return redirect( route('categories.index'));
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
        $catobj = Categories::find($id);

        return view('category.edit', compact('catobj'));
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
        $catobj = Categories::find($id);

        $catobj->fill($request->all());
        $catobj->save();

        return redirect( route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catobj = Categories::find($id);

        $catobj->delete();

        return redirect( route('categories.index'));
    }
}
