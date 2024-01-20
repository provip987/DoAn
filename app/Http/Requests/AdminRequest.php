<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'ten'=>'required|min:1',
            'ten_dang_nhap'=>'required|min:1',
            'password'=>'required|min:1',
            'email'=>'required|min:1',
            'sdt'=>'required|min:1',
            'dia_chi'=>'required|min:1',
            'quyen_id'=>'required|min:1',
        ];
    }
    public function messages(){
        return [

       
        'ten.required'=>"Tên không được bỏ trống!",
        'ten_dang_nhap.required'=>"Tên đăng nhập không được bỏ trống!",
        'password.required'=>"Passwordkhông được bỏ trống",
        'email.required'=>"Email không được bỏ trống !",
        'sdt.required'=>"Sdt không được bỏ trống!",
        'dia_chi.required'=>"Địa chỉ không được bỏ trống!",
        'quyen_id.required'=>"Quyền không được bỏ trống!",
        ];
        }
}
