<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    //

    protected $table = 'statistics';

    public $timestamps = false;

    protected $fillable = ['type', 'degree', 'status','year','gender','number','university_id'];

    public function university(){
        return $this->belongsTo(University::class , 'university_id' , 'id');
    }

}
