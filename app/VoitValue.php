<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VoitValue extends Model
{

    use SoftDeletes;
    protected $table = 'voit_values';
    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'updates', 'voit_id', 'name', 'created_by', 'deleted_by'
    ];
    public function voit_results()
    {
        return $this->hasMany(VoitResult::class, 'voit_value_id', 'id');
    }

}
