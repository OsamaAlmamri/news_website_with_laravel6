<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SlideImage extends Model
{
    //
    use SoftDeletes;
    protected $table = 'slide_images';
    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'text' ,'image', 'status','updates','slides','sort','deleted_by', 'updated_by', 'created_by'
    ];

}
