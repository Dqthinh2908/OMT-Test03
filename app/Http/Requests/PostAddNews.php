<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostAddNews extends FormRequest
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
            'titleNews'=>'required|min:20',
            'shortDescription'=>'required|min:20',
            'contentNews'=>'required',
            'imageNews'=>'required|image|mimes:jpg,png,jpeg',
        ];
    }
    public function messages()
    {
        return [
            'titleNews.required'=> 'Tiêu đề không được để trống',
            'titleNews.min'=> 'Tiêu đề không được ít hơn :min kí tự',
            'shortDescription.required'=>'Miêu tả ngắn không được để trống',
            'shortDescription.min'=> 'Miêu tả ngắn không được ít hơn :min kí tự',
            'contentNews.required'=>'Nội dung không được để trống',
            'imageNews.required'=>'Ảnh tải lên không được để trống',
            'imageNews.required'=>'Tải lên phải là ảnh',
            'imageNews'=>'Tải lên phải là file :mimes'
        ];
    }
}
