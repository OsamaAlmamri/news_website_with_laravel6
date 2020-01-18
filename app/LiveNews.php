<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LiveNews extends Model
{
    //
    use SoftDeletes;
    protected $table = 'live_news';
    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];


    protected $fillable = [
        'text', 'time', 'status','deleted_by', 'updates', 'created_by'
    ];
}
