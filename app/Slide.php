<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slide extends Model
{
    //
    //
    use SoftDeletes;
    protected $table = 'slides';
    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name' , 'status','updates','categories','deleted_by', 'updated_by', 'created_by'
    ];
}
