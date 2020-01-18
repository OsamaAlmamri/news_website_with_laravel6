<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneralSetting extends Model
{
    //
    use SoftDeletes;
    protected $table = 'general_settings';
    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];


    protected $fillable = ['name', 'value', 'deleted_by', 'updates', 'created_by'];

}
