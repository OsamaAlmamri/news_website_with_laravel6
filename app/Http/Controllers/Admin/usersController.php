<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderByDesc('id')->get();
        return view('admin.users.index', ['users' => $users]);
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

        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\userRequest $request)
    {

        $request['status'] = $request->status == 'on' ? 1 : -1;
        $logo = saveImage('images/users', $request->file('logo'));
        User::create(array_merge($request->all(),
            ['image' => $logo,

            ]));
        if ($request->SinUp == 'SinUp')
            return redirect()->route('login')->with('success', 'تمت  انشاء الحساب بنجاح ');
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect()->route('home')->with('success', 'تم  تسجيل الدخول   بنجاح ');
        } else {
            session()->flash('auth.failed', 'ok');
            return back();
        }
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

    public function edit()
    {
//        $groups=$this->getGroups();
//        return view('admin.customers.edit', compact('customer', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function update()
    {
////        ($request->post_list=='enable')
//        $request['customer_group_id']=decrypt($request->customer_group_id);
//        if($request->password==''){
//            $customer->update($request->except('password'));
//        } else {
//            $request['password']=Hash::make($request->password);
//            $customer->update($request->all());
//        }

        return redirect()->route('admin.users.index')->with('success', 'تم التعديل بنجاح');
    }

    public function delete($id)
    {

//        $customer = Customer::find($id);
//
//        $customer->delete();

        return redirect(route('admin.users.index'))->with('success', 'تم حذف العميل  بنجاح');
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
