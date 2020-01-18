<?php

namespace App\Library;

trait Imageable
{
    public static function bootImageable()
    {
        static::creating(function ($q) {
            if ($q->image) {
                if ($q->image && !is_string($q->image)) {
                    $q->image = $q->image->store('images');
                }
            }
        });

        static::updating(function ($q) {
            if ($q->attributes['image']) {
                if ($q->attributes['image'] != $q->original['image']) {
                    \Illuminate\Support\Facades\File::delete(public_path($q->original['image']));
                    $q->image = $q->image->store('images');
                }
            }
        });

        static::deleted(function ($q) {
            if ($q->attributes['image']) {
                \Illuminate\Support\Facades\File::delete(public_path($q->original['image']));
            }
        });
    }

    public function getImageLinkAttribute()
    {
        $image = ($this->image) ? $this->image : 'default/default.jpg';

        return rtrim(asset('/'), '/') . $image;
    }
}
