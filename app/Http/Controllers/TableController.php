<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TableController extends Controller
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
          return view("management.tables.index")->with([
          
         'tables' => Table::all()
        
          
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
        return view("management.tables.create")->with([
      
             
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
            'name'=> 'required|unique:tables,name',
            'status'=> 'required|boolean',
        ]);

   
        //stor data
        $name = $request->name;
        $status = $request->status;

  
  
        Table::create([
            'name'=>$name,
            'slug'=>Str::Slug($name),
            'status'=>$status,

            
          

           
        ]);
        
        return redirect()->route("tables.index")->with([
            "seccuss" => "tables est modifier avec  success"
         ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        //
        return view("management.tables.edit")->with([
      
            "tables" => $table
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Table $table)
    {
        //
       
        
        $this->validate( $request,[
            'name'=> 'required|unique:tables,name,'.$table->id,
            'status'=> 'required|boolean',
        ]);
            
   
        //stor data
        $name = $request->name;
        $status = $request->status;
        $table->update([
            'name'=>$name,
            'slug'=>Str::Slug($name),
            'status'=>$status,

            
          

           
        ]);
    
       
        return redirect()->route("tables.index")->with([
            "seccuss" => "tables est modifier avec  success"
         ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        //
        $table->delete();
        return redirect()->route("tables.index")->with([
            "success" => "table est supprimer avec  success"
        ]);
    }
}
