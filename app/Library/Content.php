<?php

namespace App\Library;

use Illuminate\Support\Facades\DB;

trait Content
{
    public static function bootContent()
    {
        static::saved(function ($q) {
            DB::table('static_block_content')->updateOrInsert([
                'block_id' => $q->id
            ], [
                'content' => request()->content
            ]);
        });
    }

    public function getContentAttribute()
    {
        return DB::table('static_block_content')->where('block_id', $this->id)->first()->content ?? null;
    }
}
