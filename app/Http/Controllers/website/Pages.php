<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Admin\Pages\Route;
use Illuminate\Support\Facades\Blade;

class Pages extends Controller
{
    public function view($path = '') {

    	abort_unless(Route::where('path', trim($path, '/'))->count(), 404);

    	$content = Blade::compileString(Route::where('path', $path)->first()->page->content);

        return view('page', compact('content'));
    }
}
