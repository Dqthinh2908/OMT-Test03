<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\roles;
use App\Models\permissions;
class RoleController extends Controller
{
    private $role;
    private $permission;
    public function __construct(roles $roles,permissions $permission)
    {
        $this->permission = $permission;
        $this->role = $roles;
    }
    public function index()
    {
        $dataRoles = roles::all();
        return view('admin/roles/index',compact('dataRoles'));
    }
    public function showAddRoles()
    {
        $permissionsParent = $this->permission->where('parent_id',0)->get();
        return view('admin/roles/addRoles',compact('permissionsParent'));
    }
    public function handleAddRoles(Request $request)
    {
        $role = $this->role->create([
            'name'=> $request->name,
            'description'=>$request->display_name,


        ]);
        $role->permissions()->attach($request->permission_id);
        return redirect()->route('admin.showRoles')->with('msg','Thêm vai trò thành công')->with('type','success');
    }
    public function showEditRoles(Request $request,$id)
    {
        $permissionsParent = $this->permission->where('parent_id',0)->get();
        $role = $this->role->find($id);
        $permissionsChecked = $role->permissions;
        // dd($permissionsChecked);
        return view('admin/roles/editRoles',compact('permissionsParent','role','permissionsChecked'));
    }
    public function handleEditRoles(Request $request, $id)
    {
        $role = $this->role->find($id);
        $role->update([
            'name'=> $request->name,
            'description'=>$request->display_name,
        ]);
        
        $role->permissions()->sync($request->permission_id);
        return redirect()->route('admin.showRoles')->with('msg','Cập nhật vai trò thành công')->with('type','success');
    }
    public function handleDeleteRoles(Request $request, $id)
    {
        $deleteRole = roles::destroy($id);
        if($deleteRole)
        {
            return redirect()->route('admin.showRoles')->with('msg','Vai trò đã được chuyển vào thùng rác')->with('type','success');
        }else
        {
            return back()->with('msg','Xóa dữ liệu thất bại')->with('type','danger');
        }
    }


}
