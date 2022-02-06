<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Junges\ACL\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:25',
            'slug' => 'required|string|max:25',
            'description' => 'required|string|max:255'
        ]);
        Permission::create($validateData);
        return redirect('/permissions')->with('success','Berechtigung erfolgreich erstellt.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('permissions.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:25',
            'slug' => 'required|string|max:25',
            'description' => 'required|string|max:255'
        ]);
        Permission::whereId($id)->update($validateData);
        return redirect('/permissions')->with('success','Berechtigung erfolgreich geändert.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return redirect('/permissions')->with('success','Berechtigung erfolgreich gelöscht.');
    }
}
