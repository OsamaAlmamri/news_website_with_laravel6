<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\slideImagesRequest;
use App\Slide;
use App\SlideImage;
use Illuminate\Support\Facades\Auth;

class SlideImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide_images = SlideImage::all();

        return view('admin.slides.images.index', ['slide_images' => $slide_images, 'deleted' => false]);
    }


    public function showSlideImages($id)
    {


        $slide_images = SlideImage::where('slides', 'like', '%"' . $id . '"%')->get();
//        return dd($slide_images);
        return view('admin.slides.images.index', ['slide_images' => $slide_images, 'cat_id' => $id, 'deleted' => false]);
    }


    public function deleted()
    {
        $slide_images = SlideImage::onlyTrashed()->get();
        return view('admin.slides.images.index', ['slide_images' => $slide_images, 'deleted' => true]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slides = Slide::all('id', 'name');
        return view('admin.slides.images.create')->with('slides', $slides);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(slideImagesRequest $request)
    {
        $image = saveImage('images/slides', $request->file('slide_image'));

        $slides = json_encode($request->input('slides'));

        $request['slides'] = $slides;
        $request['status'] = $request->status == 'on' ? 1 : 0;

        SlideImage::create(array_merge($request->all(),
            ['image' => $image,
                'created_by' => Auth::user()->id,
                'updates' => '',
            ]));

        return redirect()->route('admin.slide_images.index')->with('success', 'تمت الإضافة بنجاح');;
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


    public function edit(SlideImage $slideImage)
    {
        $slides = Slide::all('id', 'name');

        return view('admin.slides.images.edit', compact('slideImage', 'slides'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function update(slideImagesRequest $request, SlideImage $slide)
    {
        $logo = updateImage('images/slides', $request->file('logo'), $slide->logo);

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


        return redirect()->route('admin.slide_images.index')->with('success', 'تم التعديل بنجاح');
    }

    public function delete($id)
    {
        $slides = SlideImage::find(decrypt($id));
        $slides->deleted_by = Auth::user()->id;
        $slides->save();
        $slides->delete();
        return redirect(route('admin.slide_images.index'))->with('success', 'تم حذف السلايد  بنجاح');

    }

    public function forceDelete($id)
    {
        $slides = SlideImage::onlyTrashed()->find(decrypt($id));
        $slides->forceDelete();

        return redirect(route('admin.slide_images.deleted'))->with('success', 'تم حذف السلايد  بنجاح');
    }


    public function restore($id)
    {

        $slides = SlideImage::onlyTrashed()->find(decrypt($id));
        $slides->restore();

        return redirect(route('admin.slide_images.index'))->with('warning', 'تم الاستعادة  بنجاح');
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
