<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostAddUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username'=>'required|min:4|unique',
            'password'=>'required|confirmed|min:8',
            'email'=>'required|email|unique',
            'imageUser'=>'required|image|mimes:jpg,png,jpeg',
        ];
    }
    public function messages()
    {
        return [
          'username.required' => 'Tên đăng nhập không được để trống',
          'username.min'=>'Tài khoản không được dưới :min kí tự',
          'username.unique' => 'Tên tài khoản đã được sử dụng, vui lòng nhập tên khác',
          'password.required' => 'Mật khẩu không được để trống',
          'password.confirmed'=>'Mật khẩu chưa trùng khớp vui lòng nhập lại',
          'password.min'=>'Mật khẩu không được dưới :min kí tự ',
          'email.required' => 'Email không được để trống',
          'email.email'=>'Phải nhập là email',
          'email.unique'=>'email đã được sử dụng, vui lòng nhập email khác',
          'imageUser.required' => 'Ảnh đại diện không được để trống',
          'imageUser.image'=>'Tải lên phải là ảnh',
          'imageUser.mimes'=>'Ảnh tải lên phải là file :mimes',
        ];
    }
}
