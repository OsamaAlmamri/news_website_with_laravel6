<?php

namespace App\Admin;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    //
    protected $table = 'universities';

    public $timestamps = false;

    protected $guarded = ['id'];

    protected $fillable = ['name','type'];

    public function statistics()
    {
        return $this->hasMany(Statistic::class, 'university_id', 'id');
    }

}
