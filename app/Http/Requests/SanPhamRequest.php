<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
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
            'hinh_anh' => 'required|min:1',
            'loai_san_pham_id' => 'required|min:1',
            'ten_san_pham' => 'required|min:1',
            'gia' => 'required|min:1',
            'gia_cu' => 'required|min:1',
            'mo_ta' => 'required|min:1',
         
        ];
    }

    public function messages()
    {
        return [
            'hinh_anh.required' => "Hình ảnh không được bỏ trống!",
            'loai_san_pham_id.required' => "Loai sản phẩm không được bỏ trống!",
            'ten_san_pham.required' => "Tên sản phẩm không được bỏ trống",
            'gia.required' => "Giá không được bỏ trống !",
            'gia_cu.required' => "Giá không được bỏ trống !",
            'mo_ta.required' => "Mô tả không được bỏ trống!",
        ];
    }
}
