<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
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
        $subcategories = Subcategory::all();
        return view('posts.admin-index',compact('posts','subcategories'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function postsAdminCreate()
    {
        $subcategories = Subcategory::all();
        return view('posts.admin-create',compact('subcategories'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function postsAdminStore(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'string|min:5|max:255',
            'content' => 'required|string|max:10000',
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'active' => 'boolean'
        ]);
        $post = new Post;
        /**
         * here we check if one of the subcategories is choosen
         * then we have to check, which subcategory is choosen
         * we save only one subcategory - the "first" subcategory
         */
        if($request['subcategories'] != null)
        {
            $lengthArray = count($request->subcategories);
            $i = 0;
            while($i < $lengthArray)
            {
                if($request['subcategories'][$i] != null)
                {
                    $post->subcategory_id = $request['subcategories'][$i];
                    $i++;
                }
            }
        }
        else
        {
            $post->subcategory_id = null;
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
        $subcategories = Subcategory::all();
        return view('posts.admin-edit',compact('post','subcategories'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function postsAdminUpdate(Request $request)
    {
        $post = Post::findOrFail($request->id);

        $validateData = $request->validate([
            'title' => 'string|min:5|max:255',
            'content' => 'required|string|max:10000',
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'active' => 'boolean'
        ]);
        if($request['subcategories'] != null)
        {
            $lengthArray = count($request->subcategory);
            $i = 0;
            while($i < $lengthArray)
            {
                if($request['subcategories'][$i] != null)
                {
                    $post->subcategory_id = $request['subcategories'][$i];
                    $i++;
                }
            }
        }
        else
        {
            $post->subcategory_id = null;
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
        if($request->acitve != null)
        {
            $post->active = $request->active;
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
