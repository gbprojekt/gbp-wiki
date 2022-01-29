<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
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
            'title' => 'string|min:5|max:255',
            'content' => 'required|string|max:10000',
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'active' => 'boolean'
        ]);
        $post = new Post;
        /**
         * here we check if one of the categories is choosen
         * then we have to check, which category is choosen
         * we save only one category - the "first" category
         */
        if($request['categories'] != null)
        {
            if($request['categories'][0] != null)
            {
                $post->category_id = $request['categories'][0];
            }
            elseif($request['categories'][1] != null)
            {
                $post->category_id = $request['categories'][1];
            }
            elseif($request['categories'][2] != null)
            {
                $post->category_id = $request['categories'][2];
            }
        }
        else
        {
            $post->category_id = null;
        }
        /**
         * we save the title and content
         */
        $post->title = $request['title'];
        $post->content = $request['content'];
        /**
         * here we check if we have a uploaded file
         * if yes we store the file in the IMG folder
         * and we store the filename in the database
         */
        if($request->file != null)
        {
            $imageName = time().'.'.$request->file->extension();
            $request->file->move(public_path('img'), $imageName);
            $post->image = $imageName;
        }
        /**
         * here we check if the active checkbox is set
         * if it is set then we save it
         * otherwise we push NULL to the database
         */
        if($request['active'])
        {
            $post->active = $request['active'];
        }
        else
        {
            $post->active = 0;
        }
        $post->save();
        return redirect('/postsAdminIndex')->with('success','Beitrag erfolgreich erstellt.');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function postsAdminEdit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('posts.admin-edit',compact('post','categories'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function postsAdminUpdate(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validateData = $request->validate([
            'title' => 'string|min:5|max:255',
            'content' => 'required|string|max:10000',
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'active' => 'boolean'
        ]);
        if($request['categories'] != null)
        {
            if($request['categories'][0] != null)
            {
                $post->category_id = $request['categories'][0];
            }
            elseif($request['categories'][1] != null)
            {
                $post->category_id = $request['categories'][1];
            }
            elseif($request['categories'][2] != null)
            {
                $post->category_id = $request['categories'][2];
            }
        }
        else
        {
            $post->category_id = null;
        }
        if($request->title != null)
        {
            $post->title = $request->title;
        }
        if($request->content != null)
        {
            $post->content = $request->content;
        }
        if($request->file != null)
        {
            $imageName = time().'.'.$request->file->extension();
            $request->file->move(public_path('img'), $imageName);
            $post->image = $imageName;
        }
        $post->save();
        return redirect('/postsAdminIndex')->with('success','Beitrag erfolgreich aktualisiert.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function postsAdminDestroy($id)
    {
        // we do not destroy any post
        // we use the softDelete function
    }
}
