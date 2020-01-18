<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\LiveNewsRequest;
use App\LiveNews;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LiveNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $liveNews = LiveNews::all();
        return view('admin.liveNews.index', ['liveNews' => $liveNews, 'deleted' => false]);
    }

    public function deleted()
    {
        $liveNews = LiveNews::onlyTrashed()->get();
        return view('admin.liveNews.index', ['liveNews' => $liveNews, 'deleted' => true]);
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

        return view('admin.liveNews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(LiveNewsRequest $request)
    {
//        return dd($request) ;
        DB::table('live_news')->insert([
            'text' => $request->text,
            'time' => $request->time,
            'status' => $request->status == 'on' ? 1 : 0,
            'created_by' => Auth::user()->id,
            'updates' => '',
        ]);

        return redirect()->route('admin.liveNews.index')->with('success', 'تمت الإضافة بنجاح');;
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

    public function edit($id)
    {

        $news = LiveNews::find($id);
        return view('admin.liveNews.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function update(LiveNewsRequest $request, $id)

    {


        $news = LiveNews::find($id);
        $u = (['update_by' => Auth::user()->id, 'update_date' => now()]);
        $uArray = json_decode($news->updates);
        $uArray[] = $u;

        $news->text = $request->text;
        $news->updates = json_encode($uArray);
        $news->time = $request->time;
        $news->status = $request->post_list == 'on' ? 1 : 0;
        $news->save();

        return redirect()->route('admin.liveNews.index')->with('success', 'تم التعديل بنجاح');
    }

    public function delete($id)
    {

        $news = LiveNews::find(decrypt($id));

        $news->deleted_by = Auth::user()->id;
        $news->save();
        $news->delete();
        return redirect(route('admin.liveNews.index'))->with('success', 'تم حذف الخبر العاجل  بنجاح');


    }

    public function forceDelete($id)
    {

        $news = LiveNews::withTrashed()->find(decrypt($id));
        $news->forceDelete();
        return redirect(route('admin.liveNews.deleted'))->with('success', 'تم حذف الخبر العاجل  بنجاح');
    }


    public function restore($id)
    {

        $news = LiveNews::onlyTrashed()->find(decrypt($id));
        $news->restore();

        return redirect(route('admin.liveNews.index'))->with('warning', 'تم الاستعادة  بنجاح');
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
