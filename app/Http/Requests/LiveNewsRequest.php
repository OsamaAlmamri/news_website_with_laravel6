<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LiveNewsRequest extends FormRequest
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
            'text' => 'required|string|max:255',
            'time' => 'required|string',
            'status' => 'required',
        ];


    }

    public function messages()
    {
        return [
            'text.required' => ' الخبر  مطلوب',
            'text.max' => 'يجب ان يكون الخبر اقل من 256 حرف',
            'time.required' => 'يرجى تحديد كم مدة ظهور هذا الخبر ',
            'status.required' => 'يرجى تحديد حالة هذا الخبر  ',
        ];
    }
}
