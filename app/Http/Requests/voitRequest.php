<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class voitRequest extends FormRequest
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
    protected $fillable = [
        'title', 'image', 'updates', 'description', 'time', 'status', 'deleted_by', 'created_by'
    ];

    public function rules()
    {

        return [
            'title' => 'required|string',
            'image' => $this->method() == 'PUT' ? 'nullable' : 'required|image',
            'time' => 'required|numeric',
            'option_value' => 'required'

        ];


    }

    public function messages()
    {
        return [
            'title.required' => 'عنوان التصويت مطلوب',
            'option_value.required' => ' خيارات التصويت مطلوب',
            'image.required' => ' الصورة مطلوبة',
            'time.required' => ' الوقت مطلوبة',
            'time.numeric' => '  الوقت يجب ان يكون رقم ',
            'image.image' => 'يجب ان يكون صورة وليس ملف اخر',
        ];
    }
}
