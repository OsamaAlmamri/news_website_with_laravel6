<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class userRequest extends FormRequest
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
            'username' => [
                'required', 'string', $this->method() == 'PUT' ? Rule::unique('users', 'username')->ignore($this->route()->user->id) : Rule::unique('users', 'username')],
            'name' => 'required|string',
            'email' => ['required', 'email', $this->method() == 'PUT' ? Rule::unique('users', 'email')->ignore($this->route()->store->user->id) : Rule::unique('users', 'email')],
            'phone' => ['required', 'string', $this->method() == 'PUT' ? Rule::unique('users', 'phone')->ignore($this->route()->store->user->id) : Rule::unique('users', 'phone')],
            'password' => $this->method() == 'PUT' ? 'confirmed' : 'required|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'إسم المستخدم مطلوب',
            'username.unique' => 'إسم المستخدم هذا مستخدم من قبل',
            'name.required' => 'الإسم مطلوب',
            'email.required' => 'الإيميل مطلوب',
            'email.email' => 'صيغة الإيميل غير صالحة',
            'email.unique' => 'هذا الإيميل مستخدم بالفعل',
            'phone.required' => 'رقم الهاتف مستخدم من قبل',
            'phone.unique' => 'هذا الهاتف خطأ أو انه تم التسجيل به من قبل',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.confirmed' => 'كلمة المرور غير متطابقة',

        ];
    }
}
