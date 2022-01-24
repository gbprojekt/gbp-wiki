<?php

namespace App\Http\Controllers;

use App\Models\User;
use Junges\ACL\Models\Group;
use Junges\ACL\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $groups = Group::all();
        $permissions = Permission::all();
        return view('users.index',compact('users','groups','permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        return view('users.create',compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|min:1|max:255|unique:users,name',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:5|max:255'
        ]);

        $user = User::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => Hash::make($validateData['password'])
        ]);

        if($request['groups'] != null)
        {
            $user->assignGroup($request['groups']);
        }

        return redirect('/users')->with('success','Benutzer erfolgreich erstellt.');
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
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $groups = Group::all();
        return view('users.edit',compact('user','groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|string|min:1|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:5|max:255'
        ]);

        $user = User::findOrFail($id);

        $user->name = $validateData['name'];
        $user->email = $validateData['email'];
        $user->password = Hash::make($validateData['password']);

        $user->save();

        if($request['groups'] != null)
        {
            $user->syncGroups($request['groups']);
        }
        else
        {
            $user->revokeAllGroups();
        }
        return redirect('/users')->with('success','Benutzer erfolgreich geändert.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->revokeAllGroups();
        $user->revokeAllPermissions();
        $user->delete();
        return redirect('/users')->with('success','Benutzer erfolgreich gelöscht.');
    }
}
