<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Junges\ACL\Models\Group;
use Junges\ACL\Models\Permission;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        $permissions = Permission::all();
        return view('groups.index',compact('groups','permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('groups.create',compact('permissions'));
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
            'name' => 'required|string|max:25',
            'slug' => 'required|string|max:25',
            'description' => 'required|string|max:255'
        ]);
        $group = Group::create($validateData);

        if($request['permissions'])
        {
            $group->assignPermissions($request['permissions']);
        }

        return redirect('/groups')->with('success','Gruppe erfolgreich erstellt.');
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
        $group = Group::findOrFail($id);
        $permissions = Permission::all();
        return view('groups.edit',compact('group','permissions'));
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
            'name' => 'required|string|max:25',
            'slug' => 'required|string|max:25',
            'description' => 'required|string|max:255'
        ]);
        $group = Group::findOrFail($id);
        $group->update($validateData);

        if(isset($request['permissions']))
        {
            $group->syncPermissions($request['permissions']);
        }
        else
        {
            $group->revokeAllPermissions();
        }
        return redirect('/groups')->with('success','Gruppe erfolgreich geändert.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::findOrFail($id);
        $group->revokeAllPermissions();
        $group->delete();
        return redirect('/groups')->with('success','Gruppe erfolgreich gelöscht.');
    }
}
