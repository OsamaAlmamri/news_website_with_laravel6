<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UniversitiesRequest extends FormRequest
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
            'name' => [
                'required' , 'string' , $this->method() == 'PUT' ? Rule::unique('universities' , 'name')->ignore($this->route()->university->id):
                    Rule::unique('universities' , 'name')],
        ];


    }

    public function messages()
    {
        return [
            'cname.required' => 'إسم الجامعة مطلوب',
            'name.unique' => 'هذا الاسم مستخدم من قبل'
        ];
    }
}
