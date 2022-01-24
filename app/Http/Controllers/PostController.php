<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     *
     * ##########################################################################################################
     * ##########################################################################################################
     * ##########################################################################################################
     *
     *      ADMIN ROUTES
     *
     * ##########################################################################################################
     * ##########################################################################################################
     * ##########################################################################################################
     */

    /**
     * Display a listing of the resource.
     */
    public function postsAdminIndex()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('posts.admin-index',compact('posts','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function postsAdminCreate()
    {
        $categories = Category::all();
        return view('posts.admin-create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function postsAdminStore(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|string|min:5|max:255',
            'content' => 'required|string|max:10000',
            'active' => 'boolean'
        ]);
        $post = new Post;
        $post->title = $request['title'];
        $post->content = $request['content'];
        if($request['active'])
        {
            $post->active = $request['active'];
        }
        else
        {
            $post->active = 0;
        }
        $post->category_id = $request['categories'][0];
        $post->save();
        return redirect('/postsAdminIndex')->with('success','Beitrag erfolgreich erstellt.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function postsAdminEdit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function postsAdminUpdate(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function postsAdminDestroy($id)
    {
        //
    }

    /**
     *
     * ##########################################################################################################
     * ##########################################################################################################
     * ##########################################################################################################
     *
     *      USER ROUTES
     *
     * ##########################################################################################################
     * ##########################################################################################################
     * ##########################################################################################################
     */

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

    /**
     * Display a listing of all Posts in the category Money
     */
    public function moneyIndex()
    {
        $checkCategoryActive = $this->checkCategoryActive('1');
        $categoryName = 'Finanzen';
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
        return view('posts.user-index',compact('posts','categoryName'));
    }

    /**
     * Display a listing of all Posts in the category IT
     */
    public function itIndex()
    {
        $checkCategoryActive = $this->checkCategoryActive('2');
        $categoryName = 'IT';
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
        return view('posts.user-index',compact('posts','categoryName'));
    }

    /**
     * Display a listing of all Posts in the category Business
     */
    public function businessIndex()
    {
        $checkCategoryActive = $this->checkCategoryActive('3');
        $categoryName = 'Business';
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
        return view('posts.user-index',compact('posts','categoryName'));
    }
}