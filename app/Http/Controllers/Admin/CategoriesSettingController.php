<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\CategoryValue;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryValueRequest;
use Illuminate\Support\Facades\Auth;

class CategoriesSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSetting($id)
    {


        $settings = CategoryValue::all()->where('category_id', $id);

        return view('admin.categories.setting.index', ['settings' => $settings, 'cat_id' => $id, 'deleted' => false]);
    }

    public function showSettingDeleted($id)
    {
        $settings = CategoryValue::onlyTrashed()->where('category_id', $id)->get();
        return view('admin.categories.setting.index', ['settings' => $settings, 'cat_id' => $id, 'deleted' => true]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $categories = Category::all('id', 'name_ar');
        $c = [];
        foreach ($categories as $categorie) {
            $c[$categorie->id] = $categorie->name;
        }
        return view('admin.categories.setting.create')->with('categories', $c)->with('cat_id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryValueRequest $request)
    {
        $request['status'] = $request->status == 'on' ? 1 : 0;
        CategoryValue::create(array_merge($request->all(),
            [
                'created_by' => Auth::user()->id,
                'updates' => '',
            ]));

        return redirect()->route('admin.caregories_setting.showSetting',$request->category_id)->with('success', 'تمت الإضافة بنجاح');;
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
        $setting = CategoryValue::find($id);
        $cat_id = $setting->category_id;

        return view('admin.categories.setting.edit', compact('cat_id', 'setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function update(CategoryValueRequest $request, $id)
    {
        $cv = CategoryValue::find($id);


        $u = (['update_by' => Auth::user()->id, 'update_date' => now()]);
        $uArray = json_decode($cv->updates);
        $uArray[] = $u;
        $cv->update(array_merge($request->all(),
            [
                'updates' => json_encode($uArray),
            ]));

        return redirect()->route('admin.caregories_setting.showSetting', $cv->category_id)->with('success', 'تم التعديل بنجاح');
    }

    public function delete($id)
    {
        $cv = CategoryValue::find(decrypt($id));
        $cv->deleted_by = Auth::user()->id;
        $cv->save();
        $cv->delete();
        return redirect()->route('admin.caregories_setting.showSetting', $cv->category_id)->with('success', 'تم حذف القسم  بنجاح');

    }

    public function forceDelete($id)
    {
        $cv = CategoryValue::onlyTrashed()->find(decrypt($id));
        $cv->forceDelete();

        return redirect()->route('admin.caregories_setting.showSetting', $cv->category_id)->with('success', 'تم حذف القسم  بنجاح');
    }


    public function restore($id)
    {

        $cv = CategoryValue::onlyTrashed()->find(decrypt($id));
        $cv->restore();

        return redirect()->route('admin.caregories_setting.showSetting', $cv->category_id)->with('warning', 'تم الاستعادة  بنجاح');
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
