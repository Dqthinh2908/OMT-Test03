<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRegisterRequest extends FormRequest
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
            'fullname'=>'required',
            'name'=>'required|min:4|unique:users',
            'password'=>'required|min:8|max:32',
            'repassword'=>'required|same:password',
            'email'=>'required|email|unique:users',
        ];
    }
    public function messages()
    {
        return [
            'fullname.required'=>'Họ và tên không được để trống',
            'name.required' => 'Tên đăng nhập không được để trống',
            'name.min'=>'Tài khoản không được dưới :min kí tự',
            'name.unique' => 'Tên tài khoản đã được sử dụng, vui lòng nhập tên khác',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min'=>'Mật khẩu không được dưới :min kí tự ',
            'password.max'=>'Mật khẩu không được dài quá :max kí tự ',
            'repassword.required' =>'Bạn chưa nhập lại mật khẩu',
            'repassword.same'=>'Mật khẩu nhập lại chưa trùng khớp',
            'email.required' => 'Email không được để trống',
            'email.email'=>'Không đúng định dạng email vui lòng nhập lại',
            'email.unique'=>'email đã được sử dụng, vui lòng nhập email khác',
        ];
    }
}
