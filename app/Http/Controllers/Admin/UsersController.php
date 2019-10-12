<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Role;
use Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{


public function _construct(){


$this->middleware('auth');


}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $users = User::all();
        return view ('admin.users.index')->with('users', $users);


    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        if(Gate::denies('edit-users')) {

            return redirect(route('admin.users.index'));
        }

    $roles= Role::all();
    return view('admin.users.edit')->with([

        'user' => $user,
        'roles' => $roles

    ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return void
     */
    public function update(Request $request, User $user)
    {


        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        if(Gate::denies('delete-users')) {

            return redirect(route('admin.users.index'));
        }

        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
