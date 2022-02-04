<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function subcategoriesAdminIndex()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('subcategories.admin-index',compact('categories','subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function subcategoriesAdminCreate()
    {
        $categories = Category::all();
        return view('subcategories.admin-create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function subcategoriesAdminStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|min:1|max:255|unique:categories,name',
            'image' => 'image',
            'active' => 'boolean'
        ]);
        Subcategory::create($validateData);
        return redirect('/subcategoriesAdminIndex')->with('success','Unterkategorie erfolgreich erstellt.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function subcategoriesAdminEdit($id)
    {
        $subcategories = Subcategory::findOrFail($id);
        return view('subcategories.admin-edit',compact('subcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function subcategoriesAdminUpdate(Request $request, $id)
    {
        $subcategories = Subcategory::findOrFail($id);
        $validateData = $request->validate([
            'name' => 'required|string|min:1|max:255|unique:categories,name',
            'active' => 'boolean'
        ]);
        $subcategories->name = $validateData['name'];
        $subcategories->active = $validateData['active'];
        $subcategories->save();
        return redirect('/subcategoriesAdminIndex')->with('success','Unterkategorie erfolgreich geändert.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function subcategoriesAdminDestroy($id)
    {
        //
    }

    /**
     * used to check if a Category is active or not
     */
    public function checkSubcategoryActive($id)
    {
        $subcategories = Subcategory::findOrFail($id);
        $active = 0;
        if($subcategories->active)
        {
            $active = 1;
        }
        return $active;
    }
}
