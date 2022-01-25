<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

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

    public function userMoneyIndex()
    {
        $checkCategoryActive = $this->checkCategoryActive('1');
        if($checkCategoryActive)
        {
            $posts = Post::select('*')
                                    ->where('category_id','=','1')
                                    ->where('active','=','1')
                                    ->orderBy('id')
                                    ->get();
        }
        else
        {
            $posts = NULL;
        }
        return view('userViews.moneyIndex',compact('posts'));
    }

    public function userItIndex()
    {
        $checkCategoryActive = $this->checkCategoryActive('2');
        if($checkCategoryActive)
        {
            $posts = Post::select('*')
                                    ->where('category_id','=','2')
                                    ->where('active','=','1')
                                    ->orderBy('id')
                                    ->get();
        }
        else
        {
            $posts = NULL;
        }
        return view('userViews.itIndex',compact('posts'));
    }

    public function userBusinessIndex()
    {
        $checkCategoryActive = $this->checkCategoryActive('3');
        if($checkCategoryActive)
        {
            $posts = Post::select('*')
                                    ->where('category_id','=','3')
                                    ->where('active','=','1')
                                    ->orderBy('id')
                                    ->get();
        }
        else
        {
            $posts = NULL;
        }
        return view('userViews.businessIndex',compact('posts'));
    }
}
