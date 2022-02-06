<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function categoriesAdminIndex()
    {
        $categories = Category::all();
        return view('categories.admin-index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function categoriesAdminCreate()
    {
        return view('categories.admin-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function categoriesAdminStore(Request $request)
    {
        $validateData = $request->validate([
            'objectOrder' => 'required|numeric',
            'name' => 'required|string|min:1|max:255|unique:categories,name',
            'active' => 'boolean'
        ]);
        Category::create($validateData);
        return redirect('/categoriesAdminIndex')->with('success','Kategorie erfolgreich erstellt.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function categoriesAdminEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.admin-edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function categoriesAdminUpdate(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $validateData = $request->validate([
            'objectOrder' => 'required|numeric',
            'name' => 'required|string|min:1|max:255',
            'active' => 'boolean'
        ]);

        if($request->objectOrder != $category->objectOrder)
        {
            $category->objectOrder = $validateData['objectOrder'];
        }

        if($request->name != $category->name)
        {
            $category->name = $validateData['name'];
        }


        if($request->active != $category->active)
        {
            if($request->active != null)
            {
                $category->active = $validateData['active'];
            }
            else
            {
                $category->active = 0;
            }
        }

        $category->save();

        return redirect('/categoriesAdminIndex')->with('success','Kategorie erfolgreich geändert.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function categoriesAdminDestroy($id)
    {
        //
    }

    /**
     * used to check if a Category is active or not
     */
    public function checkCategoryActive($id)
    {
        $category = Category::findOrFail($id);
        $active = 0;
        if($category->active)
        {
            $active = 1;
        }
        return $active;
    }
}
