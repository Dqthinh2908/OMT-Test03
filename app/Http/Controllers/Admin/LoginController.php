<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostLoginRequest as PostLogin;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function showLoginAdmin()
    {
        return view('admin/login/index');
    }
    public function handleLogin(PostLogin $request)
    {
        $user = $request->input('emailUser');
        $password = $request->input('passwordUser');
//        dd($user, $password);
        if (Auth::attempt(['name' => $user, 'password' => $password])) {
            // Authentication was successful...
            $request->session()->put('sessionEmailUser',$user);
            return redirect()->route('admin.dashboard');
        }
        else{
            return redirect()->back()->with('msg','Thông tin đăng nhập không chính xác, vui lòng đăng nhập lại');
        }
    }
    public function handleLogout(Request $request)
    {
        $request->session()->forget('sessionEmailUser');
        return redirect()->route('admin.login');
    }

}
