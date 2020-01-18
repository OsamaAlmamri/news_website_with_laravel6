<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Statistic;
use App\Admin\University;

use App\Http\Controllers\Controller;
use App\Http\Requests\UniversitiesRequest;

class UniversityController extends Controller
{


    public function index()
    {
        $universities = University::all();
        return view('statistics.universities.index', ['universities' => $universities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('statistics.universities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UniversitiesRequest $request)
    {
        $s = University::create([
            'name' => $request->name,
            'type' => $request->type,

        ]);
        return redirect()->route('admin.universities.index')->with('success', 'تم اضافة الجامعة بنجاح');
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
    public function edit(University $university)
    {
        //
        return view('statistics.universities.edit', compact('university'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UniversitiesRequest $request, University $university)
    {
        //
        $university->name = $request->name;
        $university->type = $request->type;

        $university->save();


        return redirect()->route('admin.universities.index')->with('success', 'تم التعديل بنجاح');
    }


    public function delete($id)
    {
        $s = Statistic::where('university_id', decrypt($id))->count();
        if ($s>0)
            return redirect(route('admin.universities.index'))->with('success', '    هذا الجامعة للاتزال تحتوي على احصائيات');
        else
            University::find(decrypt($id))->delete() ;
            return redirect(route('admin.universities.index'))->with('success', 'تم حذف الجامعة  بنجاح');
    }

}
