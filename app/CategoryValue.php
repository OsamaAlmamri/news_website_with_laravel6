<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryValue extends Model
{

    use SoftDeletes;
    protected $table = 'category_values';
    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'content', 'status', 'updates', 'padding', 'display_name', 'sort',
        'category_id', 'deleted_by', 'updated_by', 'created_by'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function advertismens()
    {
        return $this->hasMany(CategoryAdvertisment::class, 'category_value_id', 'id')->orderBy('sort');
    }

    public function voites()
    {
        return $this->hasMany(CategoryVoit::class, 'category_value_id', 'id');
    }


}
