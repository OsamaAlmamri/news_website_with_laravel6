<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class advertismentRequest extends FormRequest
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
            'title' => 'required|string',
            'image' => 'required|image',
            'editor' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'عنوان الاعلان مطلوب',
            'image.required' => ' الصورة مطلوبة',
            'image.image' => 'يجب ان يكون صورة وليس ملف اخر',
            'editor.required' => 'يرجى نص  الاعلان ',
        ];
    }
}
