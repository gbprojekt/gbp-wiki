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

    public function userViewIndex(Request $request)
    {
        $currentURL = $request->segment(1);

        if($currentURL === 'userMoneyIndex')
        {
            $checkCategoryActive = $this->checkCategoryActive('1');
            $cat_id = '1';
        }
        elseif($currentURL === 'userItIndex')
        {
            $checkCategoryActive = $this->checkCategoryActive('2');
            $cat_id = '2';
        }
        elseif($currentURL === 'userBusinessIndex')
        {
            $checkCategoryActive = $this->checkCategoryActive('3');
            $cat_id = '3';
        }



        $index = Subcategory::select('*')
                                ->where('category_id','=',$cat_id)
                                ->where('active','=','1')
                                ->orderBy('objectOrder')
                                ->get();



        return view('userViews.userViewIndex',compact('index'));
    }

    public function userViewPosts(Request $request)
    {
        $currentURL = $request->segment(1);

        if($currentURL === 'userMoneyIndex')
        {
            $checkCategoryActive = $this->checkCategoryActive('1');
            $cat_id = '1';
        }
        elseif($currentURL === 'userItIndex')
        {
            $checkCategoryActive = $this->checkCategoryActive('2');
            $cat_id = '2';
        }
        elseif($currentURL === 'userBusinessIndex')
        {
            $checkCategoryActive = $this->checkCategoryActive('3');
            $cat_id = '3';
        }

        if($checkCategoryActive)
        {
            $activePosts = Post::select('*')
                                    ->where('category_id','=',$cat_id)
                                    ->where('active','=','1')
                                    ->orderBy('objectOrder')
                                    ->get();
            if($activePosts->count() > 0)
            {
                $posts = $activePosts;
            }
            else
            {
                $posts = NULL;
            }
        }
        else
        {
            $posts = NULL;
        }
        return view('userViews.userViewPosts',compact('posts'));
    }
}
