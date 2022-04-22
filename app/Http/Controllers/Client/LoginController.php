<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\categories;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRegisterRequest as PostRegister;
use App\Http\Requests\PostLoginClientRequest as PostLogin;
use App\Models\User;
class LoginController extends Controller
{
    public function index()
    {
        $dataNavBar = categories::all();
        return view('clients/login/index',compact('dataNavBar'));
    }
    public function handleLogin(PostLogin $request)
    {
        
        $username = $request->input('usernane');
        $password = $request->input('password');

        if (Auth::attempt(['name' => $username, 'password' => $password])) {
            // Authentication was successful...
            $request->session()->put('sessionUserName',$username);
            $request->session()->put('sessionIdUser',Auth::id());
            return redirect()->route('client.showDashboardLogged');
        }
        else{
            return redirect()->back()->with('msg','Thông tin đăng nhập không chính xác, vui lòng đăng nhập lại');
        }
    }
    public function showModalRegister()
    {
        $dataNavBar = categories::all();
        return view('clients/login/register',compact('dataNavBar'));
    }
    public function handleRegister(PostRegister $request,User $users)
    {
        $dataInsert = [
            'name'=>$request->name,
            'fullname'=>$request->fullname,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'level'=>2,
        ];
        $insert = User::create($dataInsert);
        if($insert)
        {
            return back()->with('msg','Đăng kí tài khoản thành công')->with('type','success');
        }else{
            return back()->with('msg','Đăng kí thất bại, vui lòng kiểm tra lại')->with('type','danger');
        }
    }
    public function handleLogout(Request $request)
    {
        $request->session()->forget('sessionUserName','sessionIdUser');
        return redirect()->route('client.home');
    }
}
