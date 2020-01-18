<?php

namespace App\Admin\Pages;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
	protected $fillable = ['path'];

	public $timestamps = false;
    
    public function page(){
    	return $this->morphTo();
    }

    public function setPathAttribute($value) {
    	$this->attributes['path'] = trim($value, '/');
    }
}
