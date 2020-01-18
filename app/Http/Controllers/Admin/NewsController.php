<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allNews = News::orderByDesc('sort')->get();
        return view('admin.news.index', ['allNews' => $allNews, 'deleted' => false]);
    }

    public function deleted()
    {
        $allNews = News::onlyTrashed()->orderByDesc('sort')->get();
//        return(dd($allNews));
        return view('admin.news.index', ['allNews' => $allNews, 'deleted' => true]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all('id', 'name_ar');
        return view('admin.news.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $categories = json_encode($request->input('categories'));
        $request['categories'] = $categories;
        $request['status'] = $request->status == 'on' ? 1 : 0;
        $request['has_comment'] = $request->has_comment == 'on' ? 1 : 0;
        $logo = saveImage('images/news', $request->file('logo'));

        News::create(array_merge($request->all(),
            ['logo' => $logo,
                'created_by' => Auth::user()->id,
                'text' => $request['editor'],
                'updates' => '',
            ]));


        return redirect()->route('admin.news.index')->with('success', 'تمت الإضافة بنجاح');;
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
        $news = News::find($id);
        return view('site.news.readMore', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */


    public function edit(News $news)
    {
        $categories = Category::all('id', 'name_ar');
        $old_cate = (json_decode($news->categories));
        return view('admin.news.edit', compact('news', 'categories', 'old_cate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function update(NewsRequest $request, News $news)
    {
        $categories = json_encode($request->input('categories'));
        $request['categories'] = $categories;
        $request['status'] = $request->status == 'on' ? 1 : 0;
        $request['has_comment'] = $request->has_comment == 'on' ? 1 : 0;
        $logo = updateImage('images/news', $request->file('logo'), $news->logo);

        $u = (['update_by' => Auth::user()->id, 'update_date' => now()]);
        $uArray = json_decode($news->updates);
        $uArray[] = $u;
        $news->update(array_merge($request->all(),
            ['logo' => $logo,
                'text' => $request['editor'],
                'updates' => json_encode($uArray),
            ]));


        return redirect()->route('admin.news.index')->with('success', 'تم التعديل بنجاح');
    }

    public function delete($id)
    {
        $news = News::find(decrypt($id));
        $news->deleted_by = Auth::user()->id;
        $news->save();
        $news->delete();
        return redirect(route('admin.news.index'))->with('success', 'تم حذف القسم  بنجاح');

    }

    public function forceDelete($id)
    {
        $news = News::onlyTrashed()->find(decrypt($id));
        $news->forceDelete();

        return redirect(route('admin.news.deleted'))->with('success', 'تم حذف الخبر  بنجاح');
    }


    public function restore($id)
    {

        $news = News::onlyTrashed()->find(decrypt($id));
        $news->restore();

        return redirect(route('admin.news.index'))->with('warning', 'تم الاستعادة  بنجاح');
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

    public function fetchParentNews(Request $request)
    {
        $coupons = News::where('name_ar', 'like', '%' . $request->filter_name . '%')
            ->orWhere('name_en', 'like', '%' . $request->filter_name . '%')
            ->get(['id', 'name_ar']);

        return $coupons;
    }


}
