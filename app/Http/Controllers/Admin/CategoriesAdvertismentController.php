<?php

namespace App\Http\Controllers\Admin;

use App\Advertisment;
use App\Category;
use App\CategoryAdvertisment;
use App\CategoryValue;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryAdvertismentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesAdvertismentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showAdvertisment($id, $type)
    {
        $ca = Category::find($id);
        $category_value_ids = [];
        foreach ($ca->category_values as $cv) {
            $category_value_ids[] = $cv->id;
        }


        if ($type == 'active')
            $cat_advertisments = CategoryAdvertisment::all()->whereIn('category_value_id', $category_value_ids);
        elseif ($type == 'deleted')
            $cat_advertisments = CategoryAdvertisment::onlyTrashed()->whereIn('category_value_id', $category_value_ids)->get();
        elseif ($type == 'timeOut')
            $cat_advertisments = CategoryAdvertisment::all()->whereIn('category_value_id', $category_value_ids);
        elseif ($type == 'timeOutAndDeleted')
            $cat_advertisments = CategoryAdvertisment::onlyTrashed()->whereIn('category_value_id', $category_value_ids)->get();
        $ids = [];


        foreach ($cat_advertisments as $c) {
            $totalDuration = diffTime(now(), $c->created_at);
            if ($totalDuration < $c->time)
                $ids[] = $c->id;
        }
//        return dd($ids);
        if ($type == 'active')
            $cat_advertisments = CategoryAdvertisment::all()
                ->whereIn('category_value_id', $category_value_ids)
                ->whereIn('id', $ids);
        elseif ($type == 'deleted')
            $cat_advertisments = CategoryAdvertisment::onlyTrashed()
                ->whereIn('category_value_id', $category_value_ids)
                ->whereNotIn('id', $ids)
                ->get();
        elseif ($type == 'timeOut')
            $cat_advertisments = CategoryAdvertisment::all()
                ->whereNotIn('id', $ids)
                ->whereIn('category_value_id', $category_value_ids);
        elseif ($type == 'timeOutAndDeleted')
            $cat_advertisments = CategoryAdvertisment::onlyTrashed()
                ->whereIn('id', $ids)
                ->whereIn('category_value_id', $category_value_ids);

//        return dd($cat_advertisments);


        return view('admin.categories.cat_advertisments.index', ['cat_advertisments' => $cat_advertisments, 'cat_id' => $id, 'deleted' => false]);
    }


//    public function showAdvertisment($id, $type)
//    {
//
//        if ($type == 'active')
//            $cat_advertisments = CategoryAdvertisment::all()->where('category_value_id', $id);
//        elseif ($type == 'deleted')
//            $cat_advertisments = CategoryAdvertisment::onlyTrashed()->where('category_value_id', $id)->get();
//        elseif ($type == 'timeOut')
//            $cat_advertisments = CategoryAdvertisment::all()->where('category_value_id', $id);
//        elseif ($type == 'timeOutAndDeleted')
//            $cat_advertisments = CategoryAdvertisment::onlyTrashed()->where('category_value_id', $id)->get();
//        $ids = [];
//
//
//        foreach ($cat_advertisments as $c) {
//            $totalDuration = diffTime(now(), $c->created_at);
//            if ($totalDuration < $c->time)
//                $ids[] = $c->id;
//        }
////        return dd($ids);
//        if ($type == 'active')
//            $cat_advertisments = CategoryAdvertisment::all()
//                ->where('category_value_id', $id)
//                ->whereIn('id', $ids);
//        elseif ($type == 'deleted')
//            $cat_advertisments = CategoryAdvertisment::onlyTrashed()
//                ->where('category_value_id', $id)
//                ->whereNotIn('id', $ids)
//                ->get();
//        elseif ($type == 'timeOut')
//            $cat_advertisments = CategoryAdvertisment::all()
//                ->whereNotIn('id', $ids)
//                ->where('category_value_id', $id);
//        elseif ($type == 'timeOutAndDeleted')
//            $cat_advertisments = CategoryAdvertisment::onlyTrashed()
//                ->whereIn('id', $ids)
//                ->where('category_value_id', $id)->get();
//
////        return dd($cat_advertisments);
//
//
//        return view('admin.categories.cat_advertisments.index', ['cat_advertisments' => $cat_advertisments, 'cat_id' => $id, 'deleted' => false]);
//    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        return view('admin.categories.cat_advertisments.create')->with('cat_id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryAdvertismentRequest $request)
    {
        $request['status'] = $request->status == 'on' ? 1 : 0;

        $c = CategoryAdvertisment::create(array_merge($request->all(),
            [
                'created_by' => Auth::user()->id,
                'updates' => '',
            ]));

        return redirect()
            ->route('admin.categories_advertisment.showAdvertisment', ['id' => $c->category_value->category->id, 'type' => 'active'])
            ->with('success', 'تمت الإضافة بنجاح');;
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


    public function edit($id)
    {
        $cat_advertisment = CategoryAdvertisment::find($id);
        $cat_id = $cat_advertisment->category_value_id;

        return view('admin.categories.cat_advertisments.edit', compact('cat_id', 'cat_advertisment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function update(CategoryAdvertismentRequest $request, $id)
    {
        $cv = CategoryAdvertisment::find($id);

        $request['status'] = $request->status == 'on' ? 1 : 0;
        $u = (['update_by' => Auth::user()->id, 'update_date' => now()]);
        $uArray = json_decode($cv->updates);
        $uArray[] = $u;
        $cv->update(array_merge($request->except('_method', '_token', 'advertismen_id', 'category_value_id'),
            [
                'updates' => json_encode($uArray),
            ]));

        return redirect()->route('admin.categories_advertisment.showAdvertisment', ['id' => $cv->category_value->category->id, 'type' => 'active'])->with('success', 'تم التعديل بنجاح');
    }

    public function delete($id)
    {
        $cv = CategoryAdvertisment::find(decrypt($id));
        $cv->deleted_by = Auth::user()->id;
        $cv->save();
        $cv->delete();
        return redirect()
            ->route('admin.categories_advertisment.showAdvertisment', ['id' => $cv->category_value->category->id, 'type' => 'active'])
            ->with('success', 'تم حذف القسم  بنجاح');

    }

    public function forceDelete($id)
    {
        $cv = CategoryAdvertisment::onlyTrashed()->find(decrypt($id));
        $cv->forceDelete();

        return redirect()->route('admin.categories_advertisment.showAdvertisment', ['id' => $cv->category_value->category->id, 'type' => 'active'])->with('success', 'تم حذف القسم  بنجاح');
    }


    public function restore($id)
    {

        $cv = CategoryAdvertisment::onlyTrashed()->find(decrypt($id));
        $cv->restore();

        return redirect()->route('admin.categories_advertisment.showAdvertisment', ['id' => $cv->category_value->category->id, 'type' => 'active'])->with('warning', 'تم الاستعادة  بنجاح');
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

    public function fetchAdvertisment(Request $request)
    {
        $adv = Advertisment::where('title', 'like', '%' . $request->filter_name . '%')
            ->get(['id', 'title']);

        return $adv;
    }

    public function fetch_category_value(Request $request)
    {
        $adv = CategoryValue::where('name', 'like', '%' . $request->filter_name . '%')
            ->where('category_id', $request->category_id)
            ->get(['id', 'name']);

        return $adv;
    }


}
