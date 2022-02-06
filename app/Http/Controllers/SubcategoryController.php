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
            'objectOrder' => 'required|numeric',
            'name' => 'required|string|min:1|max:255|unique:categories,name',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'active' => 'boolean'
        ]);
        $subcategory = new Subcategory;
        if($request['categories'] != null)
        {
            $lengthArray = count($request->categories);
            $i = 0;
            while($i < $lengthArray)
            {
                if($request['categories'][$i] != null)
                {
                    $subcategory->category_id = $request['categories'][$i];
                    $i++;
                }
            }
        }
        else
        {
            $subcategory->category_id = null;
        }
        $subcategory->name = $request['name'];
        $subcategory->objectOrder = $request['objectOrder'];
        if($request->file != null)
        {
            $imageName = time().'.'.$request->file->extension();
            $request->file->move(public_path('img'), $imageName);
            $subcategory->image = $imageName;
        }
        if($request['active'])
        {
            $subcategory->active = $request['active'];
        }
        else
        {
            $subcategory->active = 0;
        }
        $subcategory->save();
        return redirect('/subcategoriesAdminIndex')->with('success','Subkategorie erfolgreich erstellt.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function subcategoriesAdminEdit($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::all();
        return view('subcategories.admin-edit',compact('subcategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function subcategoriesAdminUpdate(Request $request)
    {
        $subcategory = Subcategory::findOrFail($request->id);
        $validateData = $request->validate([
            'objectOrder' => 'required|numeric',
            'name' => 'required|string|min:1|max:255|unique:categories,name',
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'active' => 'boolean'
        ]);
        if($request['categories'] != null)
        {
            $lengthArray = count($request->categories);
            $i = 0;
            while($i < $lengthArray)
            {
                if($request['categories'][$i] != null)
                {
                    $subcategory->category_id = $request['categories'][$i];
                    $i++;
                }
            }
        }
        else
        {
            $subcategory->category_id = null;
        }
        if($request->objectOrder != null)
        {
            $subcategory->objectOrder = $validateData['objectOrder'];
        }
        if($request->name != null)
        {
            $subcategory->name = $validateData['name'];
        }
        if($request->file != null)
        {
            $imageName = time().'.'.$request->file->extension();
            $request->file->move(public_path('img'), $imageName);
            $subcategory->image = $imageName;
        }
        if($request->active != null)
        {
            $subcategory->active = $validateData['active'];
        }
        $subcategory->save();
        return redirect('/subcategoriesAdminIndex')->with('success','Subkategorie erfolgreich geändert.');
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
