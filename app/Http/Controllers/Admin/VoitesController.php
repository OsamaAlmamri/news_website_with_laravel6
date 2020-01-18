<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\voitRequest;
use App\Voit;
use App\VoitValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voites = Voit::all();
        return view('admin.voites.index', ['voites' => $voites, 'deleted' => false]);
    }

    public function deleted()
    {
        $voites = Voit::onlyTrashed()->get();
        return view('admin.voites.index', ['voites' => $voites, 'deleted' => true]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all('id', 'name_ar');
        return view('admin.voites.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(voitRequest $request)
    {
        $image = saveImage('images/voites', $request->file('image'));
        $request['status'] = $request->status == 'on' ? 1 : 0;
        $v = Voit::create(array_merge($request->all(),
            ['image' => $image,
                'created_by' => Auth::user()->id,
                'updates' => '',
            ]));


        foreach ($request->option_value as $value) {

            VoitValue::create([
                'voit_id' => $v->id,
                'name' => $value['name'],
                'created_by' => Auth::user()->id,
                'updates' => ''
            ]);
        }

        return redirect()->route('admin.voites.index')->with('success', 'تمت الإضافة بنجاح');;
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
        $voit = Voit::find($id);
        return view('admin.voites.edit', compact('voit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function update(voitRequest $request, $id)
    {
        foreach ($request->option_value as $v)
            $voit = Voit::find($id);
        $image = updateImage('images/voites', $request->file('image'), $voit->image);
        if ($image == '') {
            $image = $voit->image;
        }
        $request['status'] = $request->status == 'on' ? 1 : 0;

        $u = (['update_by' => Auth::user()->id, 'update_date' => now()]);
        $uArray = json_decode($voit->updates);
        $uArray[] = $u;
        $voit->update(array_merge($request->all(),
            ['image' => $image,
                'updates' => json_encode($uArray),
            ]));

        if ($request->option_value) {
//            return dd($request->option_value);
            foreach ($request->option_value as $value) {
                if ($value['id'] == null) {
//                    return dd($request->option_value);
                    VoitValue::create([
                        'voit_id' => $voit->id,
                        'name' => $value['name'],
                        'created_by' => Auth::user()->id,
                        'updates' => ''
                    ]);

                } else {
                    $oldVoitValue = VoitValue::find($value['id']);
                    $u = (['update_by' => Auth::user()->id, 'update_date' => now()]);
                    $uArray = json_decode($oldVoitValue->updates);
//                    return dd($oldVoitValue->updates);
                    $uArray[] = $u;
                    $oldVoitValue->update([
                        'name' => $value['name'],
                        'updates' => json_encode($uArray),
                    ]);
                }

            }

        }

        if (isset($request->optionDeletedId)) {
            foreach ($request->optionDeletedId as $id) {
                $olds = VoitValue::find($id);
                $olds->delete();
            }


        }


        return redirect()->route('admin.voites.index')->with('success', 'تم التعديل بنجاح');
    }

    public
    function delete($id)
    {
        $voites = Voit::find(decrypt($id));
        $voites->deleted_by = Auth::user()->id;
        $voites->save();
        $voites->delete();
        return redirect(route('admin.voites.index'))->with('success', 'تم حذف التصويت  بنجاح');

    }

    public
    function forceDelete($id)
    {
        $voites = Voit::onlyTrashed()->find(decrypt($id));
        $voites->forceDelete();

        return redirect(route('admin.voites.deleted'))->with('success', 'تم حذف التصويت  بنجاح');
    }


    public function restore($id)
    {

        $voites = Voit::onlyTrashed()->find(decrypt($id));
        $voites->restore();

        return redirect(route('admin.voites.index'))->with('warning', 'تم الاستعادة  بنجاح');
    }


    public function viewResult($id)
    {

        $voit = Voit::withTrashed()->find(($id));
        return dd($voit);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }


    public function fetchVoitResult(Request $request)
    {
//
        $voit_id = $request->input('voit_id');
        $Alloptions = VoitValue::all()->where('voit_id', $voit_id);
        $options = [];
        $number = [];
        $data = [];
        foreach ($Alloptions as $k => $o) {
            $options[] = $o->name;
            $number[] = $o->voit_results->count();
            $data[$o->name] = $o->voit_results->count();
        }
        $result = array([
            'options' => $options,
            'number' => $number,
            'data' => $data,
        ]);
        return ($result);


    }


}
