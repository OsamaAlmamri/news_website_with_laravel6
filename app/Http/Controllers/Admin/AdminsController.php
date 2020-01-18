<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Admin\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $admins = User::where('role' , 'admin')->get();

        return view('admin.admins.index' , compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin_groups = Group::all();

        return view('admin.admins.create', compact('admin_groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\adminRequest $request)
    {

        User::create(array_merge($request->all(), ['role' => 'admin']));

        return redirect()->route('admin.admins.index')->with('success', 'تم إضافة المدير بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {
        $admin_groups = Group::all();

        return view('admin.admins.edit', compact('admin', 'admin_groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\adminRequest $request, User $admin)
    {

        if(!$request->password){
            $admin->update($request->except('password'));
        } else {
            $admin->update($request->all());
        }

        return redirect()->route('admin.admins.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(User $admin)
    {
        // check if it's the main user and prevent deleting him
        if($admin->id == 1) {
            return redirect()->back()->with('warning', 'لا يمكنك حذف هذا المستخدم');
        }
        
        $admin->delete();

        return redirect(route('admin.admins.index'))->with('success', 'تم حذف المدير بنجاح');
    }
}
