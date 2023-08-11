<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Food;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Food.index',['foods'=>Food::paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Food.create',['cats'=>Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->ValidateFoods($request);
         // remember in real production must process the image with any package for image processing and kep it in static subdomain.

          Food::create([
              'name'=>$request->get('name'),
              'description'=>$request->get('description'),
              'price'=>$request->get('price'),
              'img'  =>$this->imgUpload( $request->file('img') ),
              'cat_id'=>$request->get('cat_id')
             ]);

          return back()->with('message','Food Created Successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Food.show',['food'=>Food::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Food.edit',['food'=>Food::find($id),'cats'=>Category::all()]);
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
        $this->ValidateFoods($request,$id);

        if($request->file('img'))
        {
             $food = Food::find($id);

             $food->name        = $request->get('name');
             $food->price       = $request->get('price');
             $food->description = $request->get('description');
             $food->img         = $this->imgUpload( $request->file('img') );
             $food->cat_id      = $request->cat_id;

             $food->save();

             return redirect()->route('food.index')->with('message','food Updated');  

        }
        else
        {
             $food = Food::find($id);

             $food->name        = $request->get('name');
             $food->price       = $request->get('price');
             $food->description = $request->get('description');
             $food->img         = $request->get('img_update');
             $food->cat_id      = $request->cat_id;

             $food->save();

             return redirect()->route('food.index')->with('message','food Updated');  

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::where('id',$id);
            
        if($food->count() == 1)
        {
           $food->delete();

           return redirect()->route('food.index')->with('message','Food Deleted');
        }

        return redirect()->route('food.index')->with('message','Food Deleted');
      
    }

    public function listFood()
    {    
         return view('Food.list',['foods'=> Food::all(),'cats'=> Category::all()]); 
    }


    public function ValidateFoods($request,$update_id=false)
    {    
        if($update_id)
        {
         
          return $request->validate(
                  [
                    'name'       =>'required|unique:food,name,'.$update_id.',id|min:4|max:150|string',
                    'price'      =>'required',
                    'description'=>'required|string',
                    'img'        =>'present|mimes:png,jpg,jpeg',
                    'cat_id'     =>'required|integer'
                  ]
             );
        }
          return $request->validate(
                   [
                    'name'       =>'required|unique:food,name|min:4|max:150|string',
                    'price'      =>'required',
                    'description'=>'required|string',
                    'img'        =>'required|mimes:png,jpg,jpeg',
                    'cat_id'     =>'required|integer'
                  ]
             );
    }

    public function imgUpload($img_request)
    {
         $image = $img_request;
        
         $name  = time().'.'.$image->getClientOriginalExtension();

         $destination = public_path('/images');

         $image->move($destination,$name);

         return $name;
    }
}
