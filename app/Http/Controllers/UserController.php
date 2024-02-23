<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request){
        $config = $request->validate([
            'name' => ['required', 'min:3' , 'max:10' , Rule::unique('users' , 'name')],
            'email' => ['required', 'email' , Rule::unique('users' , 'email')],
            'password' => ['required' , 'min:4' ,'max:12'],
        ]);
        $config['password'] = bcrypt($config['password']);
        $user = User::create($config);
        auth()->login($user);
        return redirect('/');
        

    }

    public function logout(){
        auth()->logout();
        return redirect('/');

    }

    public function login(Request $request){
        $config = $request->validate([
            'name' => 'required',        
            'password' => 'required',
        ]);
        if (auth()->attempt($config)) {
            $request->session()->regenerate();
        }
            return redirect('/');
        
    }
}
