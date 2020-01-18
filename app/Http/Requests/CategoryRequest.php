<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
//            'parent' => 'required|integer',
            'section_count' => 'required|integer',
            'sort' => 'required|integer',
        ];


    }

    public function messages()
    {
        return [
            'name_ar.required' => 'الاسم باللغة العربية مطلوب',
            'name_en.required' => ' الاسم باللغة الانجليزية مطلوب',
//            'parent.required' => 'يرجى تحديد الى اي صنف ينتمي هذا القسم ',
            'section_count.required' => 'يرجى تحديد كم عدد الاقسام الرئيسية  لهذا القسم ',
            'sort.required' => 'يرجى تحديد ترتب   هذا القسم ',
        ];
    }
}
