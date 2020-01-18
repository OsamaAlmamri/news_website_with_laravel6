<?php

namespace App\Admin\Pages;

use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    use \App\Library\HasRoute;

    protected $table = 'main_pages';

    public $timestamps = false;

    protected $fillable = ['name', 'status', 'content', 'widget_content'];

    protected $appends = ['route'];
}
