<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderByDesc('sort')->get();
        return view('admin.categories.index', ['categories' => $categories, 'deleted' => false]);
    }

    public function deleted()
    {
        $categories = Category::onlyTrashed()->orderByDesc('sort')->get();
//        return(dd($categories));
        return view('admin.categories.index', ['categories' => $categories, 'deleted' => true]);
    }

    public function accepting()
    {

//        $customer = Customer::where('situation','deny')->orderByDesc('id')->get();
//        return view('admin.customers.acceptCustomer', ['customers' => $customer]);
    }

    public function accept($id)
    {
//        $c=Customer::find($id);
//        $c->situation='allow';
//        $c->save();
//        return response('1');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        DB::table('categories')->insert([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'parent' => $request->parent != null ? $request->parent : 0,
            'section_count' => $request->section_count,
            'newsCount' => $request->newsCount,
            'isMain' => $request->isMain == 'on' ? 1 : 0,
            'liveNews' => $request->liveNews == 'on' ? 1 : 0,
            'hasSlides' => $request->hasSlides == 'on' ? 1 : 0,
            'sort' => $request->sort,
            'status' => $request->status == 'on' ? 1 : 0,
            'created_by' => Auth::user()->id,
            'updates' => '',
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'تمت الإضافة بنجاح');;
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

    protected function getGroups()
    {
//        $allGroups = CustomerGroup::all();
//        $groups = [];
//        foreach ($allGroups as $group) {
//            $groups[encrypt($group->id)] = $group->name;
//        }
//
//        return  $groups;

    }

    public function edit(Category $category)
    {

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function update(CategoryRequest $request, Category $category)
    {

        $u = (['update_by' => Auth::user()->id, 'update_date' => now()]);
        $uArray = json_decode($category->updates);
        $uArray[] = $u;
        $category->updates = json_encode($uArray);

        $category->name_ar = $request->name_ar;
        $category->name_en = $request->name_en;
        $category->parent = $request->parent != null ? $request->parent : 0;
        $category->section_count = $request->section_count;
        $category->newsCount = $request->newsCount;
        $category->isMain = $request->isMain == 'on' ? 1 : 0;
        $category->liveNews = $request->liveNews == 'on' ? 1 : 0;
        $category->hasSlides = $request->hasSlides == 'on' ? 1 : 0;
        $category->sort = $request->sort;
        $category->status = $request->status == 'on' ? 1 : 0;
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'تم التعديل بنجاح');
    }

    public function delete($id)
    {

        $category = Category::find(decrypt($id));

        $sub_category = Category::where('parent', decrypt($id))->count();
        if ($sub_category > 0)
            return redirect(route('admin.categories.index'))->with('warning', 'هذا القسم يحتوي على اقسام فرعية مرتبطة بة ');


        $category->deleted_by = Auth::user()->id;
        $category->save();
        $category->delete();
        return redirect(route('admin.categories.index'))->with('success', 'تم حذف القسم  بنجاح');


    }

    public function forceDelete($id)
    {

        $category = Category::onlyTrashed()->find(decrypt($id));
        $sub_category = Category::withTrashed()->where('parent', decrypt($id))->count();
        if ($sub_category > 0)
            return redirect(route('admin.categories.deleted'))->with('warning', 'هذا القسم يحتوي على اقسام فرعية مرتبطة بة ');

        $category->forceDelete();

        return redirect(route('admin.categories.deleted'))->with('success', 'تم حذف القسم  بنجاح');
    }


    public function restore($id)
    {

        $category = Category::onlyTrashed()->find(decrypt($id));
        $category->restore();

        return redirect(route('admin.categories.index'))->with('warning', 'تم الاستعادة  بنجاح');
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

    public function fetchParentCategory(Request $request)
    {
        $coupons = Category::where('name_ar', 'like', '%' . $request->filter_name . '%')
            ->orWhere('name_en', 'like', '%' . $request->filter_name . '%')
            ->get(['id', 'name_ar']);

        return $coupons;
    }


}
