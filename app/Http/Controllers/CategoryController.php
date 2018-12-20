<?php

namespace App\Http\Controllers;

use App\Category;
use Session;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category.index')->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'category'     => 'required'
        ]);
        try{
            $category = Category::create([
                'category' => $request->category
            ]);

            $category->save();
            Session::flash('success','New category created successfully.');
        }
        catch (\Exception $e)
        {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->route('category.index');
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
        $category = Category::find($id);
        return view('category.edit')->with('category',$category);
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
            'category'     => 'required'
        ]);
        try{
            $category = Category::find($id);
            $category->category = $request->category;
            $category->save();
            Session::flash('success','The category updated successfully.');
        }
        catch (\Exception $e)
        {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->route('category.index');
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
            $category = Category::find($id);
            $category->delete();
            Session::flash('success','The category deleted successfully.');
        }
        catch (\Exception $e)
        {
            Session::flash('error', $e->getMessage());
        }
        return redirect()->route('category.index');
    }
}
