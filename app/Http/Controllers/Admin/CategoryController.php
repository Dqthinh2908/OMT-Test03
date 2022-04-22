<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categories;
class CategoryController extends Controller
{
    public function index()
    {
        $data = categories::all();
        return view('admin.categories.index',compact('data'));
    }
    public function showAddCategory()
    {
        return view('admin.categories.addView');
    }
}
