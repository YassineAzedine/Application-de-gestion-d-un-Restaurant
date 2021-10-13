<?php

namespace App\Http\Controllers;

use App\Models\Servant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class servantController extends Controller
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
          return view("management.servants.index")->with([
          
         'servants' => Servant::all()
          
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
        return view("management.servant.create")->with([
      
             
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
        //
          //validation
          $this->validate( $request,[
            'name'=> 'required|min:3',
           

            
        ]);
            //store data
            $name = $request -> name;
            $address = $request -> address;

          

           
Servant::create([
    "name"=>$name,
    "slug"=> Str::Slug($name),
    "address"=>$address,


]);

       return redirect()->route("servants.index")->with([
           "seccuss" => "servant est modifier avec  success"
       ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\servant  $servant
     * @return \Illuminate\Http\Response
     */
    public function show(servant $servant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\servant  $servant
     * @return \Illuminate\Http\Response
     */
    public function edit(servant $servant)
    {
        //
        return view("management.servants.edit")->with([
      
            "servants" => $servant
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\servant  $servant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, servant $servant)
    {
        //
        $this->validate( $request,[
            'name'=> 'required|min:3',
            'address'=> 'required|min:3',

            
        ]);
       
            //store data
            $name = $request->name;
           

          
            $servant->update([
    "name"=>$name,
   
    "address"=>$request ->address,

]);

       return redirect()->route("servants.index")->with([
           "success" => "servant est modifier avec  success"
       ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\servant  $servant
     * @return \Illuminate\Http\Response
     */
    public function destroy(servant $servant)
    {
        //
        $servant->delete();
        return redirect()->route("servants.index")->with([
            "seccuss" => "servant est supprimer avec  success"
        ]);
    }
}
