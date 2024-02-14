<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function submit(Request $req)
    {
        $req->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $req->input('username');
        $password = $req->input('password');

        $user = Admin::where('username', '=', $username)->first();

        if ($user) {
            if (Hash::check($req->password, $user->password)) {
                Session::put('admin', $user);
                return redirect()->route('home')->with('success', 'Logged in successfully');
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        } else {
            return back()->with('fail', 'Invalid username');
        }
    }

    public function signup(Request $req)
    {
        $req->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $req->input('username');
        $password = $req->input('password');

        $user = Admin::where('username', '=', $username)->first();
        if ($user){
            return redirect()->back()->with('fail', "Username already exists!");
        }

        $user = new Admin;
        $user->username = $username;
        $user->password = Hash::make($password);
        $user->save();

        return redirect()->route('login')->with('success', 'Account created successfully');
    }

    public function password(Request $req){
        $req->validate([
            'current' => 'required',
            'password' => 'required',
            'confirmPassword' => 'required'
        ]);

        $current = $req->input('current');
        $password = $req->input('password');
        $confirmPassword = $req->input('confirmPassword');

        $user = Admin::where('username', '=', Session::get('admin')->username)->first();
        if ($user){
            if (Hash::check($current, $user->password)) {
                if($password == $confirmPassword){
                    $user->password = Hash::make($password);
                    $user->save();
                    return redirect()->route('home')->with('success', 'Password changed successfully');
                }else{
                    return back()->with('fail', 'Password does not match');
                }
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        }else{
            return back()->with('fail', 'No account found for this username');
        }
    }

}
