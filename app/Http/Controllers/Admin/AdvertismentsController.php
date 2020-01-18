<?php

namespace App\Http\Controllers\Admin;

use App\Advertisment;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\advertismentRequest;
use Illuminate\Support\Facades\Auth;

class AdvertismentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisments = Advertisment::all();
        return view('admin.advertisments.index', ['advertisments' => $advertisments, 'deleted' => false]);
    }

    public function deleted()
    {
        $advertisments = Advertisment::onlyTrashed()->get();
        return view('admin.advertisments.index', ['advertisments' => $advertisments, 'deleted' => true]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all('id', 'name_ar');
        return view('admin.advertisments.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(advertismentRequest $request)
    {
        $image = saveImage('images/advertisments', $request->file('image'));

        Advertisment::create(array_merge($request->all(),
            ['image' => $image,
                'created_by' => Auth::user()->id,
                'editor' => $request['editor'],
                'updates' => '',
            ]));

        return redirect()->route('admin.advertisments.index')->with('success', 'تمت الإضافة بنجاح');;
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


    public function edit(Advertisment $advertisment)
    {
        return view('admin.advertisments.edit', compact('advertisment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function update(AdvertismentRequest $request, Advertisment $advertisment)
    {

        $image = updateImage('images/advertisments', $request->file('image'), $advertisment->image);

        $u = (['update_by' => Auth::user()->id, 'update_date' => now()]);
        $uArray = json_decode($advertisment->updates);
        $uArray[] = $u;
        $advertisment->update(array_merge($request->all(),
            ['image' => $image,
                'editor' => $request['editor'],
                'updates' => json_encode($uArray),
            ]));


        return redirect()->route('admin.advertisments.index')->with('success', 'تم التعديل بنجاح');
    }

    public function delete($id)
    {
        $advertisments = Advertisment::find(decrypt($id));
        $advertisments->deleted_by = Auth::user()->id;
        $advertisments->save();
        $advertisments->delete();
        return redirect(route('admin.advertisments.index'))->with('success', 'تم حذف القسم  بنجاح');

    }

    public function forceDelete($id)
    {
        $advertisments = Advertisment::onlyTrashed()->find(decrypt($id));
        $advertisments->forceDelete();

        return redirect(route('admin.advertisments.deleted'))->with('success', 'تم حذف الخبر  بنجاح');
    }


    public function restore($id)
    {

        $advertisments = Advertisment::onlyTrashed()->find(decrypt($id));
        $advertisments->restore();

        return redirect(route('admin.advertisments.index'))->with('warning', 'تم الاستعادة  بنجاح');
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
