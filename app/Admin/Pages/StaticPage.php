<?php

namespace App\Admin\Pages;

use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    use \App\Library\HasRoute;
    
    protected $table = 'static_pages';

    public $timestamps = false;

    protected $fillable = ['name' , 'status' , 'content'];

    protected $appends = ['route'];
}
