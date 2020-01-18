<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use App\Admin\Pages\Main;
use App\Admin\Blocks;

class MainPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Main::all();

        return view('admin.pages.main.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blocks = Blocks::all();

        return view('admin.pages.main.create', compact('blocks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\MainPagesRequest $request)
    {
        Main::create($request->all());

        return redirect()->route('admin.pages.main.index')->with('success', 'تم إضافة الصفحة');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function preview(Main $page)
    {
        $content = Blade::compileString($page->content);

        return view('page', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Main $main)
    {
        $page = $main;
        
        return view('admin.pages.main/edit', compact('page')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\MainPagesRequest $request, Main $main)
    {
        $main->update($request->all());

        return redirect()->route('admin.pages.main.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Main $page)
    {
        
        // $page->blocks()->detach();

        $page->delete();

        return redirect()->route('admin.pages.main.index')->with('success', 'تم حذف الصفحة');        
    }
}
