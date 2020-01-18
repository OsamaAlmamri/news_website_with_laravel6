<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StatisticsRequest extends FormRequest
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
            'statustics' => 'required',
            'statustics.*.number' => 'required'
        ];


        return $rules;
    }
    public function messages()
    {
        return [
            'statustics.required' => 'يرجى كتابة الاحصائيات',
            'statustics.*.number.required' => 'يرجى تحديد القيم',

        ];
    }
}
