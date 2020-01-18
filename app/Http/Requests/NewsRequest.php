<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
        //   $table->bigIncrements('id');
        ////        $table->string('logo');
        ////        $table->string('title');
        ////        $table->text('introduction');
        ////        $table->text('text');
        ////        $table->unsignedInteger('sort')->default(1);
        ////        $table->boolean('status')->default(true);
        ////        $table->boolean('has_comment')->default(true);
        ////        $table->timestamp('publish_at')->default(now());
        ////        $table->string('categories',255);
        /// //    "_token" => "JA25IQq9YoAgaSjB7jCfeEA4X24znQU01RurKeNu"
        //      "title" => null
        //      "introduction" => null
        //      "sort" => null
        //      "has_comment" => "on"
        //      "status" => "on"
        //      "editor" => null
        return [
            'title' => 'required|string',
            'introduction' => 'required|string',
            'editor' => 'required|string',
            'categories' => 'required',
            'sort' => 'required|integer',
        ];


    }

    public function messages()
    {
        return [
            'title.required' => 'عنوان الخبر مطلوووب',
            'introduction.required' => 'مقدمة الخبر مطلوبة',
            'editor.required' => 'يرجى كتابة الخبر ',
            'categories.required' => 'يرجى اختيار تصنيف واحد على الاقل ',
            'sort.required' => 'يرجى تحديد ترتب   هذا الخبر ',
        ];
    }
}
