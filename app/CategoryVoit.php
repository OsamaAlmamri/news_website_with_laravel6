<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryVoit extends Model
{
    use SoftDeletes;
    protected $table = 'category_voits';
    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'updates', 'voit_id', 'category_value_id', 'created_by', 'deleted_by'
    ];

    public function voit()
    {
        return $this->belongsTo(Voit::class, 'voit_id', 'id');
    }

    public function category_value()
    {
        return $this->belongsTo(CategoryValue::class, 'category_value_id', 'id');
    }
}
