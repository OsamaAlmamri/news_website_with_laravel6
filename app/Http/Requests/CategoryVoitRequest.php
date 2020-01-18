<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryVoitRequest extends FormRequest
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
            'voit_id' => 'required|numeric',

            'category_value_id' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'voit_id.required' => '  يرجى تحديد التصويت ',
            'category_value_id.required' => 'القسم الحاوي للااعلان مطلوب ',

        ];
    }
}
