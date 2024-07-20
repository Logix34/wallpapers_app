<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function dashboard()
    {
        $userCount = User::whereUserType(2)->count();
        $categoryCount = Category::count();
      return view('dashboard',compact('categoryCount','userCount'));
    }


    public function postLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'user_type'=>1],$request->remember)) {
            $request->session()->regenerate();
            Session::flash('success', 'Login Successfully');
            return redirect('dashboard');
        }else{
            Session::flash('error', 'User Password Is Wrong!');
            return redirect('login');
        }
    }
    public function logout(Request $request){
        $request->session()->invalidate();
        Auth::logout();
        return redirect()->route('login');
    }
}
