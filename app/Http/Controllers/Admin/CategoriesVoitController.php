<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\CategoryValue;
use App\CategoryVoit;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryVoitRequest;
use App\Voit;
use App\VoitResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesVoitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showVoit($id, $type)
    {
        $ca = Category::find($id);
        $category_value_ids = [];
        foreach ($ca->category_values as $cv) {
            $category_value_ids[] = $cv->id;
        }


        if ($type == 'active')
            $cat_voites = CategoryVoit::all()->whereIn('category_value_id', $category_value_ids);
        elseif ($type == 'deleted')
            $cat_voites = CategoryVoit::onlyTrashed()->whereIn('category_value_id', $category_value_ids)->get();
        elseif ($type == 'timeOut')
            $cat_voites = CategoryVoit::all()->whereIn('category_value_id', $category_value_ids);
        elseif ($type == 'timeOutAndDeleted')
            $cat_voites = CategoryVoit::onlyTrashed()->whereIn('category_value_id', $category_value_ids)->get();
        $ids = [];


        foreach ($cat_voites as $c) {
            $totalDuration = diffTime(now(), $c->created_at);
            if ($totalDuration < $c->time)
                $ids[] = $c->id;
        }
//        return dd($ids);
        if ($type == 'active')
            $cat_voites = CategoryVoit::all()
                ->whereIn('category_value_id', $category_value_ids)
                ->whereIn('id', $ids);
        elseif ($type == 'deleted')
            $cat_voites = CategoryVoit::onlyTrashed()
                ->whereIn('category_value_id', $category_value_ids)
                ->whereNotIn('id', $ids)
                ->get();
        elseif ($type == 'timeOut')
            $cat_voites = CategoryVoit::all()
                ->whereNotIn('id', $ids)
                ->whereIn('category_value_id', $category_value_ids);
        elseif ($type == 'timeOutAndDeleted')
            $cat_voites = CategoryVoit::onlyTrashed()
                ->whereIn('id', $ids)
                ->whereIn('category_value_id', $category_value_ids);

//        return dd($cat_voites);


        return view('admin.categories.cat_voites.index', ['cat_voites' => $cat_voites, 'cat_id' => $id, 'deleted' => false]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCat($id)
    {

        return view('admin.categories.cat_voites.create')->with('cat_id', $id);
    }

    public function create()
    {
//        return view('admin.categories.cat_voites.create')->with('cat_id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryVoitRequest $request)
    {

        $c = CategoryVoit::create(array_merge($request->all(),
            [
                'created_by' => Auth::user()->id,
                'updates' => '',
            ]));

        return redirect()
            ->route('admin.categories_voit.showVoit', ['id' => $c->category_value->category->id, 'type' => 'active'])
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
        $cat_advertisment = CategoryVoit::find($id);
        $cat_id = $cat_advertisment->category_value_id;

        return view('admin.categories.cat_voites.edit', compact('cat_id', 'cat_advertisment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function update(CategoryVoitRequest $request, $id)
    {
        $cv = CategoryVoit::find($id);

        $request['status'] = $request->status == 'on' ? 1 : 0;
        $u = (['update_by' => Auth::user()->id, 'update_date' => now()]);
        $uArray = json_decode($cv->updates);
        $uArray[] = $u;
        $cv->update(array_merge($request->except('_method', '_token', 'advertismen_id', 'category_value_id'),
            [
                'updates' => json_encode($uArray),
            ]));

        return redirect()->route('admin.categories_voit.showVoit', ['id' => $cv->category_value->category->id, 'type' => 'active'])->with('success', 'تم التعديل بنجاح');
    }

    public function delete($id)
    {
        $cv = CategoryVoit::find(decrypt($id));
        $cv->deleted_by = Auth::user()->id;
        $cv->save();
        $cv->delete();
        return redirect()
            ->route('admin.categories_voit.showVoit', ['id' => $cv->category_value->category->id, 'type' => 'active'])
            ->with('success', 'تم حذف القسم  بنجاح');

    }

    public function forceDelete($id)
    {
        $cv = CategoryVoit::onlyTrashed()->find(decrypt($id));
        $cv->forceDelete();

        return redirect()->route('admin.categories_voit.showVoit', ['id' => $cv->category_value->category->id, 'type' => 'active'])->with('success', 'تم حذف القسم  بنجاح');
    }


    public function restore($id)
    {

        $cv = CategoryVoit::onlyTrashed()->find(decrypt($id));
        $cv->restore();

        return redirect()->route('admin.categories_voit.showVoit', ['id' => $cv->category_value->category->id, 'type' => 'active'])->with('warning', 'تم الاستعادة  بنجاح');
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

    public function fetchVoit(Request $request)
    {
        $adv = Voit::where('title', 'like', '%' . $request->filter_name . '%')
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

    public function voiting(Request $request)
    {
        $voit_value_id = $request->option_id;
        $voit_id = $request->voit_id;
        $old = VoitResult::where('user_id', Auth::user()->id)->where('voit_id', $voit_id)->first();
//        return $old;
        if ($old) {
            $voit = $old->update([
                'voit_value_id' => $voit_value_id
            ]);
            return $old;
        } else {
            $voit = VoitResult::create([
                'voit_value_id' => $voit_value_id,
                'voit_id' => $voit_id,
                'user_id' => Auth::user()->id,
            ]);
            return $voit;
        }


    }


}
