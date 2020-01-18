<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainPagesRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|unique:main_pages,name',
            'route' => 'required|string|unique:routes,path',
            'status' => 'required'
        ];
        if($this->method() == 'PUT'){
            $rules['name'] .= ',' . $this->route()->main->id;
            $rules['route'] .= ',' . $this->route()->main->route()->first()->id;
        }

        return $rules;
    }

    public function messages() {
        return [
            'name.required' => 'إسم الصفحة مطلوب',
            'name.unique' => 'هذا الإسم مستخدم من قبل',
            'route.required' => 'رابط الصفحة مطلوب',
            'route.unique' => 'هذا الرابط مستخدم من قبل',
            'status.required' => 'حالة الصفحة مطلوبة',
        ];
    }
}
