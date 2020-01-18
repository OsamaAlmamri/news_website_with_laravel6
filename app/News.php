<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    //
    use SoftDeletes;
    protected $table = 'news';
    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];

    protected $fillable = [
       'logo' ,'title', 'status','updates','introduction', 'editor','sort','has_comment','categories','publish_at','deleted_by', 'updated_by', 'created_by'
    ];
}
