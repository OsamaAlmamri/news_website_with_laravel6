<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class adminRequest extends FormRequest
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
            'required' , 'string' , $this->method() == 'PUT' ? Rule::unique('users' , 'username')->ignore($this->route()->admin->id)->where('role' , 'admin') : Rule::unique('users' , 'username')->where('role' , 'admin')],
            'name' => 'required|string',
            'email' => ['required' , 'string' , 'email' , $this->method() == 'PUT' ? Rule::unique('users' , 'email')->ignore($this->route()->admin->id)->where('role' , 'admin') : Rule::unique('users' , 'email')->where('role' , 'admin')],
            'phone' => ['required' , 'string' , $this->method() == 'PUT' ? Rule::unique('users' , 'phone')->ignore($this->route()->admin->id)->where('role' , 'admin') : Rule::unique('users' , 'phone')->where('role' , 'admin')],
            'password' => $this->method() == 'PUT' ? 'confirmed' : 'required|confirmed',
            'admin_group_id' => 'required|string',
            'status' => 'required|string',
            'image' =>'image|max:5242880'
        ];
    }

    public function messages() {
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
            'admin_group_id.required' => 'مجموعة المدراء مطلوبة',
            'image.image' => 'ملف الصورة غير صالح',
            'image.max' => 'حجم الصورة يجب ألا يزيد عن 5 ميجابيت',
            'status.required' => 'يجب تحديد حالة المدير'
        ];
    }
}
