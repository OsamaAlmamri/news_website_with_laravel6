<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LangRequest extends FormRequest
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
            'name' => 'required|unique:languages,name',
            'symbol' => 'required|unique:languages,symbol',
            'local' => 'required',
            'sort' => 'required|numeric'
        ];

        if ($this->method() == 'PUT') {
            $rules['name'] .= ',' . $this->route()->language->id;
            $rules['symbol'] .= ',' . $this->route()->language->id;
        }

        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'إسم اللغة مطلوب',
            'name.unique' => 'الاسم مستخدم من قبل',
            'symbol.unique' => 'الرمز مستخدم من قبل',
            'symbol.required' => 'الرمز مطلوب',
            'local.required' => 'المحلى مطلوب',
            'sort.required' => 'حقل ترتيب الفرز مطلوب',
            'sort.numeric' => 'حقل ترتيب الفرز يجب ان يكون رقم'
        ];
    }
}
