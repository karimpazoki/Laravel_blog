<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Illuminate\Support\Facades\Session;


class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tag.index')->with('tags', Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tag.create');
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
            'tag'     => 'required'
        ]);
        try{
            $tag = Tag::create([
                'tag' => $request->tag
            ]);

            $tag->save();
            Session::flash('success','New tag created successfully.');
        }
        catch (\Exception $e)
        {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->route('tags.index');
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
        $tag = Tag::find($id);
        return view('tag.edit')->with('tag',$tag);
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
            'tag'     => 'required'
        ]);
        try{
            $tag = Tag::find($id);
            $tag->tag = $request->tag;
            $tag->save();
            Session::flash('success','The tag updated successfully.');
        }
        catch (\Exception $e)
        {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->route('tags.index');
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
            $tag = Tag::find($id);
            $tag->delete();
            Session::flash('success','The tag deleted successfully.');
        }
        catch (\Exception $e)
        {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->route('tags.index');
    }
}
