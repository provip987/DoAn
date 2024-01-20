<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhaCungCapRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
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
            'email'=>'required|min:1',
          
            'dia_chi'=>'required|min:1',
            'so_dien_thoai'=>'required|min:1',
         
        ];
    }
    public function messages(){
        return [

        'ten.required'=>"Tên không được bỏ trống!",
        
        'email.required'=>"Email không được bỏ trống !",
        'so_dien_thoai.required'=>"Sdt không được bỏ trống!",
        'dia_chi.required'=>"Địa chỉ không được bỏ trống!",
       
        ];
        }
}
