<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __Construct(){
    $this->middleware('auth');
    }
    public function index()
    {
        //
      return view("management.categories.index")->with([
      
     'categories' => Category::all()
      
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("management.categories.create")->with([
      
             
             ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate( $request,[
            'title'=> 'required|min:3']);
            //store data
            $title = $request -> title;
Category::create([
    "title"=>$title,
    "slug"=> Str::Slug($title)
]);

       return redirect()->route("categories.index")->with([
           "seccuss" => "cateories est modifier avec  success"
       ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view("management.categories.edit")->with([
      
             "category" => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $this->validate( $request,[
            'title'=> 'required|min:3']);
            
            //store data
            $title = $request -> title;
$category->update([
    "title"=>$title,
    

    "slug"=> Str::Slug($title)
]);
return redirect()->route("categories.index")->with([
    "seccuss" => "cateories est modifier avec  success"
]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect()->route("categories.index")->with([
            "seccuss" => "cateories est supprimer avec  success"
        ]);
        
        
    }
}
