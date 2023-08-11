<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Category.index',['cates'=>Category::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('Category.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->ValidateCates($request);

        Category::create(['name'=>$request->get('name')]);

        return back()->with('message','Category Created Successfully');
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
        //   
            return view('Category.edit',['cate'=>Category::find($id)]);

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
        //
        $this->ValidateCates($request,$id);

        $Category = Category::find($id);

        $Category->name= $request->get('name');

        $Category->save();

        return redirect()->route('category.index')->with('message','Category Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Category = Category::find($id);

        $Category->delete();

         return redirect()->route('category.index')->with('message','Category Deleted');
    }

    public function ValidateCates($request,$update_id=false)
    {    
        if($update_id)
        {
         
          return $request->validate(
                  [
                    'name'=>'required|unique:categories,name,'.$update_id.',id|min:4|max:15|string'
                  ]
             );
        }
          return $request->validate(
                  [
                    'name'=>'required|unique:categories,name|min:4|max:15|string'
                  ]
             );
    }
}
