<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoitResult extends Model
{
    //
    protected $table = 'voit_results';
    protected $guarded = ['id'];


    protected $fillable = [
        'user_id', 'voit_value_id','voit_id'
    ];

    public function voit_value()
    {
        return $this->belongsTo(VoitValue::class, 'voit_value_id', 'id');
    }


}
