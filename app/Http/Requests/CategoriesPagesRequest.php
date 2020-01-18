<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesPagesRequest extends FormRequest
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
            'route' => 'required|string|unique:routes,path,' . $this->route()->category->route()->first()->id,
            'status' => 'required'
        ];
    }

    public function messages() {
        return [
            'route.required' => 'رابط الصفحة مطلوب',
            'route.unique' => 'هذا الرابط مستخدم من قبل',
            'status.required' => 'حالة الصفحة مطلوبة',
        ];
    }
}
