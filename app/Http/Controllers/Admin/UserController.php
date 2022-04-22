<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\roles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PostAddUser;
use App\Models\user_role as userRole;
class UserController extends Controller
{
    protected $user;
    protected $role;
    public function __construct(User $user, roles $role)
    {
        $this->user = $user;
        $this->role = $role;
    }
    public function index()
    {
        $dataUser = User::with('roles')->where('level',1)->get();
        // dd($dataUser);
        return view('admin/user/index',
        [
            'data' => $dataUser
        ]);
    }
    public function showAddUser()
    {
        $dataRoles = roles::all();
        return view('admin/user/addUser',compact('dataRoles'));
    }
    public function handleAddUser(Request $request)
    {
        try{
            DB::beginTransaction();
            $dataInsert = [
                'name' => $request->username,
                'fullname'=>$request->fullname,
                'email'=>$request->emailUser,
                'password'=>bcrypt($request->password),
                'level'=>1
            ];
            // dd($request->role_id);
            $user = User::create($dataInsert);
            $roleIds = $request->role_id;
            $user->roles()->attach($roleIds);    
            DB::commit();
        return redirect()->route('admin.showUser')->with('msg','Thêm người dùng thành công')->with('type','success');
        }catch(\Exception $exception)
        {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . '--- Line:' .$exception->getLine());

        }  
    }
    public function showEditUser($id)
    {
        $roles = $this->role->all();
        // dd($roles);
        $user = $this->user->find($id);
        $rolesOfUser = $user->roles;
        return view('admin/user/editUser',compact('roles','user','rolesOfUser'));
    }
    public function handleUpdateUser(Request $request,$id)
    {
        try{
            DB::beginTransaction();
            $this->user->find($id)->update([
                'name' => $request->username,
                'fullname'=>$request->fullname,
                'email'=>$request->emailUser,
            ]);
            $user = $this->user->find($id);
            $user->roles()->sync($request->role_id);    
            DB::commit();
            return redirect()->route('admin.showUser')->with('msg','Chỉnh sửa người dùng thành công')->with('type','success');
        }catch(\Exception $exception)
        {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . '--- Line:' .$exception->getLine());
        }  
    }
}
