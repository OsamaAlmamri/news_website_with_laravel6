<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
    use SoftDeletes;
    protected $table = 'categories';
    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];


    protected $fillable = [
        'name_ar', 'name_en', 'parent', 'newsCount', 'liveNews', 'status', 'section_count', 'isMain', 'hasSlides', 'sort'
        , 'deleted_by', 'updates', 'created_by'
    ];


    public function category_values()
    {
        return $this->hasMany(CategoryValue::class, 'category_id', 'id')->orderBy('sort');
    }

}
