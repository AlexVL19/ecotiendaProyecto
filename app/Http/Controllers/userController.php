<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userobj = User::all();

        return view('users.index', compact('userobj'));
    }

    public function search(Request $request)
    {
        $term = $request->input('term');

        $usersearch = User::query()
            ->where('name', 'LIKE', "%{$term}%")
            ->get();

        return view('users.search', compact('usersearch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userobj = new User();

        $userobj->name = $request->input('name');
        $userobj->sndname = $request->input('sndname');
        $userobj->email = $request->input('email');
        $userobj->password = $request->input('password');

        $userobj->save();
        return redirect( route('userList.index'));
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
        $userobj = User::find($id);

        return view('users.edit', compact('userobj'));
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
        $userobj = User::find($id);

        $userobj->fill($request->all());
        $userobj->save();

        return redirect( route('userList.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userobj = User::find($id);

        $userobj->delete();

        return redirect( route('userList.index'));
    }
}
