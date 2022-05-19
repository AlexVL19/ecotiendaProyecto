<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistroController extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function store() {

        $this->validate(request(), [
            'name' => 'required',
            'sndname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::create(request(['name', 'sndname', 'email', 'password']));

        auth()->login($user);
        return redirect()->to('/');
    }
}
