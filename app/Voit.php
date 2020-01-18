<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voit extends Model
{
    //
    use SoftDeletes;
    protected $table = 'voits';
    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title', 'image', 'updates', 'editor', 'time', 'status', 'deleted_by', 'created_by'
    ];


    public function voit_values()
    {
        return $this->hasMany(VoitValue::class, 'voit_id', 'id');
    }
    public function voit_results()
    {
        return $this->hasMany(VoitResult::class, 'voit_id', 'id');
    }

}
