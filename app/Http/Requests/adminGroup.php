<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class adminGroup extends FormRequest
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
            'name' => 'required|unique:admin_groups,name',
            // 'access' => 'required',
            // 'update' => 'required'
        ];

        if($this->method() == 'PUT'){
            $rules['name'] = 'required|unique:admin_groups,name,' . $this->route()->admin_group->id;
        }

        return $rules;
    }

    public function messages() {
        return [
            'name.required' => 'إسم المجموعة مطلوب',
            'name.unique' => 'هذا الإسم مستخدم من قيل',
            'access.required' => 'صلاحيات الدخول مطلوبة',
            'update.required' => 'صلاحيات التعديل مطلوبة'
        ];
    }
}
