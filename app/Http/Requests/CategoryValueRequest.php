<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryValueRequest extends FormRequest
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


    public function rules()
    {
        return [
            'name' => 'required|string',
            'content' => 'required|string',
            'padding' => 'required|string',
            'display_name' => 'required|string',
            'sort' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'عنوان القسم  مطلوب',
            'display_name.required' => 'اسم العرض للقسم مطلوب',
            'content.required' => ' نوع محتوى القسم مطلوب  ',
            'sort.required' => ' ترتيب القسم مطلوب   ',
        ];
    }
}
