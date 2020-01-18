<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class slidesRequest extends FormRequest
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
            'name' => 'required|string',
            'categories' => 'required',
            'status' => 'required'
        ];

    }

    public function messages()
    {
        return [
            'name.required' => 'إسم الصفحة مطلوب',
            'categories.required' => 'يجب اختيار قسم واحد على الاقل',
            'name.unique' => 'هذا الإسم مستخدم من قبل',
            'status.required' => 'الحالة  مطلوبة',
        ];
    }
}
