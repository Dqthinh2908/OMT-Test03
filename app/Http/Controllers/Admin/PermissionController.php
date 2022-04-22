<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\permissions;
class PermissionController extends Controller
{
    public function showPermissionRole()
    {
        return view('admin/permission/addPermission');
    }
    public function handleAddPermission(Request $request)
    {
        $permission = permissions::create([
            'name' => 'Danh mục' . $request->module_parent,
            'display_name'=>$request->module_parent,
            'parent_id'=> 0
        ]);
        foreach($request->module_childrent as $value)
        {
            permissions::create([
                'name' => $value,
                'display_name'=>$value . '_' .$request->module_parent,
                'parent_id'=> $permission->id,
                'key_code'=>$value. '_' .$request->module_parent
            ]);
        }
    }
}
