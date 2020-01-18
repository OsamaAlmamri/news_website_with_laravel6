<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryAdvertismentRequest extends FormRequest
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


//$table->unsignedBigInteger('category_value_id');


    public function rules()
    {
        return [
            'advertismen_id' => 'required|numeric',
            'time' => 'required|numeric',
            'sort' => 'required|numeric',
            'category_value_id' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'advertismen_id.required' => '   يرجى تحديد الاعلان ',
            'category_value_id.required' => 'القسم الحاوي للااعلان مطلوب ',
            'time.required' => ' وقت ظهور الاعلان مطلوب ',
            'sort.required' => ' ترتيب الاعلان  ضمن القسم  مطلوب   ',
        ];
    }
}
