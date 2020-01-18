<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryAdvertisment extends Model
{
    //


    use SoftDeletes;
    protected $table = 'category_advertisments';
    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'time', 'sort', 'status', 'updates', 'advertismen_id', 'category_value_id','created_by','deleted_by'
    ];

    public function advertisment()
    {
        return $this->belongsTo(Advertisment::class, 'advertismen_id', 'id');
    }

    public function category_value()
    {
        return $this->belongsTo(CategoryValue::class, 'category_value_id', 'id');
    }

}
