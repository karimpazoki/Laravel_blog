<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index')->with('posts', Post::all());
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        return view('post.trashed')->with('posts', Post::onlyTrashed()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'     => 'required',
            'content'   => 'required',
        ]);

        try {

            $featured = $request->featured;
            $featured_new_name = Null;
            if($featured != Null) {
                $featured_new_name = time() . $featured->getClientOriginalName();
                $featured->move('uploads/featured', $featured_new_name);
                $featured = 'uploads/featured/'.$featured_new_name;
            }

            $post = Post::create([
                'title' => $request->title,
                'content' => $request->content,
                'category_id' => $request->category,
                'featured'  => $featured,
                'slug'  => str_slug($request->title)
            ]);

            $post->save();
            Session::flash('success', 'New post created successfully.');
        }
        catch (\Exception $e)
        {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('post.edit')->with('post',$post)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $this->validate($request,[
            'title'     => 'required',
            'content'   => 'required'
        ]);
        try{
            $post = Post::find($id);
            $post->title    = $request->get('title');
            $post->content  = $request->get('content');
            $post->category_id   = $request->get('category');
            if($request->hasFile('featured'))
            {
                $featured = $request->featured;
                $featured_new_name = time() . $featured->getClientOriginalName();
                $featured->move('uploads/featured', $featured_new_name);
                $post->featured = 'uploads/featured/'.$featured_new_name;
            }

            $post->save();
            Session::flash('success','The post updated successfully.');
        }
        catch (\Exception $e)
        {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $post = Post::find($id);
            $post->delete();
            Session::flash('success','The post moved to trash.');
        }
        catch (\Exception $e)
        {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->route('post.index');
    }

    public function restore($id)
    {
        try{
            $post = Post::withTrashed()->where('id',$id)->first();
            $post->restore();
            Session::flash('success','The post restored successfully.');
        }
        catch (\Exception $e)
        {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->route('post.trashed');
    }

    public function kill($id)
    {
        try{
            $post = Post::withTrashed()->where('id',$id)->first();
            $post->forceDelete();
            Session::flash('success','The post deleted successfully.');
        }
        catch (\Exception $e)
        {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->route('post.trashed');
    }
}
