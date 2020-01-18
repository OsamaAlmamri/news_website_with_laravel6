<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class slideImagesRequest extends FormRequest
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

            'slides' => 'required',
            'sort' => 'required',
            'slide_image' => 'required|image',
        ];

    }

    public function messages()
    {
        return [
            'slides.required' => 'يجب اختيار سلايد واحد على الاقل',
            'slide_image.required' => 'الصورة   مطلوبة',
            'slide_image.image' => 'يجب ان يكون نوع الملف صورة وليس ملف اخر   ',
            'sort.required' => 'ترتيب السلايد   مطلوب',
        ];
    }
}
