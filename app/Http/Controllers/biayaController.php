<?php

namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;  
use App\Models\biaya; 


use PDF;


class biayaController extends Controller
{

     
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          return view('dashboard.biaya.index',[
        "id_biaya"=>"biayanya",
        "post"=> biaya::all(),
         
        

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
         return view('dashboard.biaya.create', [
            'periodecek' => biaya::all(),  
            
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
        // return $request->file('foto')->store('upload-foto');
         //dd($request);
        $validatedData = $request->validate([  
            'harga' => 'required', 
            'keterangan' => 'required',  
        ]);
 

        //ddd($validatedData);
        biaya::create($validatedData);
        return redirect('/biaya')->with('success','biaya Has Been Success!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\biaya  $biaya
     * @return \Illuminate\Http\Response
     */
    public function show(biaya $biaya)
    {
       
         return view('dashboard.biaya.detbiaya',[
            'biaya' => $biaya
        ]);
       }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\biaya  $biaya
     * @return \Illuminate\Http\Response
     */
    public function edit(biaya $biaya)
    {
        //
         return view('dashboard.biaya.edit',[
            'biaya' => biaya::all(), 
              'biaya'=> $biaya
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\biaya  $biaya
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, biaya $biaya)
    {
        //dd($request);
        $rules = [  
            'harga' => 'required',
            'keterangan' => 'required', 
        ];
          
         
        
         
        $validatedData = $request->validate($rules);
         
      
        
       
        biaya::where('id',$biaya->id)
        ->update($validatedData);
        return redirect('/biaya')->with('success','biaya Has Been Update!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\biaya  $biaya
     * @return \Illuminate\Http\Response
     */
    public function destroy(biaya $biaya)
    {
        //
        if($biaya->foto){
            Storage::delete($biaya->foto);
            }
         biaya::destroy($biaya->id);
        return redirect('/biaya')->with('deleted','biaya Has Been Deleted!');
    }

  
 
}

?>