<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $request){
        $incomeF = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required',
        ]);

        if(auth()->attempt(['name' => $incomeF['loginname'], 'password' => $incomeF['loginpassword']])) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    public function logout(){
        auth()->logout();
        return redirect ('/');
    }

    //
    public function register(Request $request){
        
        $income = $request->validate([
            'name' => ['required', 'min:5', 'max:10', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6', 'max:50']
        ]);

        $income['password'] = bcrypt($income['password']);
        $user = User::create($income);
        auth()->login($user);

        return redirect('/');
    }
}
