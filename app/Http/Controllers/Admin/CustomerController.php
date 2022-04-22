<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class CustomerController extends Controller
{
    public function index()
    {
        $dataCustomer = User::where('level',2)->get();
        return view('admin/customer/index',compact('dataCustomer'));
    }
}
