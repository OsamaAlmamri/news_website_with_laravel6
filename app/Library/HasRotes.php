<?php

namespace App\Library;

use Illuminate\Support\Facades\DB;

trait HasRoute
{

    public static function bootHasRoute()
    {
        static::saved(function ($q) {
            if(request()->route){
                $q->route()->updateOrCreate(['page_id' => $q->id, 'page_type' => static::class],['path' => request()->route]);
            }
        });

        static::deleting(function($q) {
            $q->route()->delete();
        });
    }

    public function route()
    {
        return $this->morphOne(\App\Admin\Pages\Route::class, 'page');
    }

    public function getRouteAttribute()
    {
        return $this->route()->first()->path;
    }
}
