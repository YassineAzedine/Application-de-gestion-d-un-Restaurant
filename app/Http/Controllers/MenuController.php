<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

use App\Models\Category;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function __construct(){
       $this-> middleware('auth');
    }

    public function index()
    {
        //

        $menus = Menu::all();
        return view('management.menus.index')->with([
            'menus'=> $menus,
            'categories' => Category::all() ,

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
        $categories = Category::all();
        return view('management.menus.create')->with([
         
            "categories" => $categories,
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
        $this->validate($request,[
           'title'=>'required|min:3|unique:menus,title',
           'description'=>'required|min:5',
           'image'=>'required|image|mimes:png,jpg,jpeg|max:2048',
           'price'=>'required|numeric',
           "category_id"=>"required|numeric",
        ]);
        //store data
        if($request->hasFile("image")){
            $file = $request->image;
            $imageName = time(). "_" .$file->getClientOriginalName();
                $file->move(public_path('images/menus'),$imageName);
                $title = $request->title;
            Menu::create([
                "title"=>$title,
                "slug"=>Str::slug($title),
                "description"=>$request->description,
                "image"=>$imageName,
                  "price"=>$request->price,
                  "category_id"=>$request->category_id,
                
            ]);
            
       return redirect()->route("menus.index")->with([
        "seccuss" => "menu est cree avec  success"
    ]);
        }
    }

    /** 
     * 
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
        return view('management.menus.edit')->with([

      "menu" => $menu,
      "categories"=> Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
        $this->validate($request,[
            'title'=>'required|min:3|unique:menus,title,'.$menu->id,
            'description'=>'required|min:5',
            'image'=>'image|mimes:png,jpg,jpeg|max:2048',
            'price'=>'required|numeric',
            "category_id"=>"required|numeric",
         ]);
         //store data
         if($request->hasFile("image")){
             unlink(public_path('images/menus/'.$menu->image));
             $file = $request->image;
             $imageName = time(). "_" .$file->getClientOriginalName();
                 $file->move(public_path('images/menus'),$imageName);
                 $title = $request->title;
             Menu::create([
                 "title"=>$title,
                 "slug"=>Str::slug($title),
                 "description"=>$request->description,
                   "price"=>$request->price,
                   "category_id"=>$request->category_id,
                   "image"=>$imageName,
             ]);
             
        return redirect()->route("menus.index")->with([
         "seccuss" => "menu est modifier avec  success"
     ]);
     
         }else{
            $title = $request->title;
           $menu->update([
                "title"=>$title,
                "slug"=>Str::slug($title),
                "description"=>$request->description,
                  "price"=>$request->price,
                  "category_id"=>$request->category_id,
                
            ]);
            return redirect()->route("menus.index")->with([
                "seccuss" => "menu est modifier avec  success"
            ]);

         }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
        unlink(public_path('images/menus/'.$menu->image));
        $menu->delete();
        return redirect()->route("menus.index")->with([
            "seccuss" => "menu est supprimer avec  success"
        ]);
    }
}
