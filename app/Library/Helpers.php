<?php

use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;


function pageParse($content)
{
    return eval('?>' . $content);
}

function getCategoryName($id)
{
    if ($id == 0) return "-------";
    $c = \App\Category::withTrashed()->find($id);
    return $c->name_ar;
}

function getUserName($id)
{
    $u = \App\User::withTrashed()->find($id);
    return $u->name;
}

function Names($ids, $type)
{
    $ids = json_decode($ids);
    $t = '(';
    foreach ($ids as $k => $id) {
        if ($type == 'Category') {
            $c = \App\Category::withTrashed()->find($id);
            if ($t)
                $t .= $c->name_ar;
        } elseif ($type == 'Slide') {
            $c = \App\Slide::withTrashed()->find($id);
            $t .= $c->name;
        } elseif ($type == 'Voit') {

            $t .= $id->name;
        }

        if ($k < count($ids) - 1 and $k % 2 == 1)
            $t .= ' <br> ';
        if ($k < count($ids) - 1 and $k % 2 == 0)
            $t .= ' , ';

    }
    $t .= ')';
    return $t;
}


function university()
{
    $u = \App\Admin\University::all();
    return $u;

}


function saveImage($folder, $file)
{
    $folder = '/' . $folder . '/';


    $Image = '';
    if ($file) {
        $Image = time() . $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
        $file->move(public_path($folder), $Image);
        return $folder . $Image;
    }
    return $folder . 'default.png';
}


function updateImage($folder, $file, $old_image)
{
    $s = saveImage($folder, $file);
    if ($s != '') {
        File::delete(public_path($old_image));
        return $s;
    }
    return $old_image;
}


function liveNews($page)
{
//    if ($page) {
    $liveNews = \App\LiveNews::all();
//        $liveNews = \App\LiveNews::all()->where('status' == $page);
    return $liveNews;
//    } else
//        return false;
}


function getMainMenu($type)
{
    if ($type == 'main')
        $c = Category::all()->where('parent', '')
            ->where('isMain', 1)
            ->sortBy('sort');
    else
        $c = Category::all()->where('parent', '')->where('isMain', 0)->sortBy('sort');
    return ($c);
}

function countChild($id)
{
    $c = Category::where('parent', $id)->count();
    return ($c);
}

function countAlsoMenu()
{
    $c = Category::all()->where('parent', '')->where('isMain', 0)->count();
    return ($c);
}

function returnChild($id)
{
    $c = Category::all()->where('parent', $id)->sortBy('sort');
    return ($c);

}

function diffTime($now, $createdAt)
{
    $startTime = Carbon::parse($createdAt);
    $now = Carbon::parse($now);
    $totalDuration = $createdAt->diffInMinutes($now);
    return $totalDuration;

}

function getSetting($name)
{
    $s = \App\GeneralSetting::where('name', 'like', $name)->first();
    return $s->value;
}
