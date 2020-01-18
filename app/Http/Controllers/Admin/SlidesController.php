<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\slidesRequest;
use App\Slide;
use Illuminate\Support\Facades\Auth;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();
        return view('admin.slides.index', ['slides' => $slides, 'deleted' => false]);
    }

    public function deleted()
    {
        $slides = Slide::onlyTrashed()->get();
        return view('admin.slides.index', ['slides' => $slides, 'deleted' => true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ids=$this->Catregories_slides();
        $categories = Category::all('id', 'name_ar')->whereNotIn('id',$ids);

        return view('admin.slides.create')->with('categories', $categories);
    }

    protected function Catregories_slides($id=0)
    {
        $slides = Slide::all();
        $ids = [];
        foreach ($slides as $s)
            if($s->id!=$id)
            $ids = array_merge($ids, json_decode($s->categories));
        return $ids;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(slidesRequest $request)
    {
        $categories = json_encode($request->input('categories'));
        $request['categories'] = $categories;
        $request['status'] = $request->status == 'on' ? 1 : 0;

        Slide::create(array_merge($request->all(),
            [
                'created_by' => Auth::user()->id,
                'updates' => '',
            ]));

        return redirect()->route('admin.slides.index')->with('success', 'تمت الإضافة بنجاح');;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */


    public function edit(Slide $slide)
    {
        $ids=$this->Catregories_slides($slide->id);
        $categories = Category::all('id', 'name_ar')->whereNotIn('id',$ids);
        return view('admin.slides.edit', compact('slide', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function update(slidesRequest $request, Slide $slide)
    {
        $categories = json_encode($request->input('categories'));
        $request['categories'] = $categories;
        $request['status'] = $request->status == 'on' ? 1 : 0;

        $u = (['update_by' => Auth::user()->id, 'update_date' => now()]);
        $uArray = json_decode($slide->updates);
        $uArray[] = $u;
        $slide->update(array_merge($request->all(),
            [
                'updates' => json_encode($uArray),
            ]));


        return redirect()->route('admin.slides.index')->with('success', 'تم التعديل بنجاح');
    }

    public function delete($id)
    {
        $slides = Slide::find(decrypt($id));
        $slides->deleted_by = Auth::user()->id;
        $slides->save();
        $slides->delete();
        return redirect(route('admin.slides.index'))->with('success', 'تم حذف السلايد  بنجاح');

    }

    public function forceDelete($id)
    {
        $slides = Slide::onlyTrashed()->find(decrypt($id));
        $slides->forceDelete();

        return redirect(route('admin.slides.deleted'))->with('success', 'تم حذف السلايد  بنجاح');
    }


    public function restore($id)
    {

        $slides = Slide::onlyTrashed()->find(decrypt($id));
        $slides->restore();

        return redirect(route('admin.slides.index'))->with('warning', 'تم الاستعادة  بنجاح');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
