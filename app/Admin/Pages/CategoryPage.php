<?php

namespace App\Admin\Pages;

use Illuminate\Database\Eloquent\Model;

class CategoryPage extends Model
{
    use \App\Library\HasRoute;

	protected $table = 'categories_pages';
	
    public $timestamps = false;

    protected $fillable = ['category_id', 'status', 'content', 'widget_content'];

    protected $appends = ['route'];

    public function category(){
    	return $this->belongsTo(\App\Admin\Categories::class);
    }
}
