<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\posts as dataPosts;
use App\Models\categories;
use App\Models\comment;
use DB;
use Illuminate\Pagination\Paginator;

class DashboardController extends Controller
{
    public function showDashboard(Request $request)
    {
        // dd(config('permissions.access.list-categories'));
        // die();
        $sessionUser = $request->session()->get('sessionEmailUser');
        $paginator = dataPosts::with('categories','user')->paginate(6);
        // dd($paginator);
        if(auth::check())
        {
            return view('admin/dashboard/index',[
                'user'=>$sessionUser,
                'paginator'=>$paginator,
            ]);
        }
        return redirect()->route('admin.login');
    }
}
