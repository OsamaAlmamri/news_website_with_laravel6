<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertisment extends Model
{
    //
    use SoftDeletes;
    protected $table = 'advertisments';
    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title', 'image', 'updates', 'editor', 'deleted_by', 'created_by'
    ];

}
