<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class UserViewController extends Controller
{
    private function checkCategoryActive($id)
    {
       $category = Category::findOrFail($id);
       $active = 0;
       if($category->active)
       {
           $active = 1;
       }
       return $active;
    }

    private function checkSubcategoryActive($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $active = 0;
        if($subcategory->active)
        {
            $active = 1;
        }
        return $active;
    }

    public function userViewIndex(Request $request)
    {
        $currentURL = $request->segment(1);
        $cat_id = '0';

        if($currentURL === 'userMoneyIndex')
        {
            $checkCategoryActive = $this->checkCategoryActive('1');
            if($checkCategoryActive === 1)
            {
                $cat_id = 1;
            }
        }
        elseif($currentURL === 'userItIndex')
        {
            $checkCategoryActive = $this->checkCategoryActive('2');
            if($checkCategoryActive === 1)
            {
                $cat_id = 2;
            }
        }
        elseif($currentURL === 'userBusinessIndex')
        {
            $checkCategoryActive = $this->checkCategoryActive('3');
            if($checkCategoryActive === 1)
            {
                $cat_id = 3;
            }
        }

        if($cat_id > 0)
        {
            $subcategories = Subcategory::select('*')
                                ->where('category_id','=',$cat_id)
                                ->where('active','=','1')
                                ->orderBy('objectOrder')
                                ->get();
        }
        else
        {
            $subcategories = 'Sorry - hier gibt es noch keine Beiträge.';
        }

        $countSubcategories = count($subcategories);

        return view('userViews.userViewIndex',compact('subcategories','countSubcategories'));
    }

    public function userViewPosts(Request $request)
    {
        $route = $request->segment(1);

        $subcategory = Subcategory::select('*')
                                        ->where('route','=',$route)
                                        ->get();

        $posts = Post::select('*')
                        ->where('subcategory_id','=',$subcategory[0]['id'])
                        ->where('active','=','1')
                        ->orderBy('objectOrder')
                        ->get();

        return view('userViews.userViewPosts',compact('posts'));
    }

    public function inflationdeflation()
    {
        return view('userViews.inflationdeflation');
    }
}
