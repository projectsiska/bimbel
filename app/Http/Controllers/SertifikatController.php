<?php

namespace App\Http\Controllers;


use App\Models\sertifikat;
use App\Models\siswa;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class SertifikatController extends Controller
{
    public function index()
    {
        return view('dashboard.sertifikat.index',[
            "id_user"=>"usernya", 
            "post"=> sertifikat::all()
             ]);
    }



    public function home()
    {
        return view('sertifikat',[
            "id_user"=>"usernya", 
            "post"=> sertifikat::where('siswa_id', auth()->user()->siswa->id)->get()
             ]);
    }



    public function create()
    {
        return view('dashboard.sertifikat.create',[
            "siswa"=>siswa::where('status','Terdaftar')->get(),

        ]);
    }

    public function store(Request $request)
    {
       
        $validatedData = $request->validate([ 
            'siswa_id' => 'required',
            'sertifikat' => 'required|file|max:2024' 
        ]);

        //dd($request);

        if($request->file('sertifikat')){
            $validatedData['sertifikat']=$request->file('sertifikat')->store('sertifikat');
        } ;

     
           
           sertifikat::create($validatedData);
      
        return redirect('/sertifikat')->with('success','Amazing! Your Sertifikat has been Add Successfully');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sertifikat  $sertifikat
     * @return \Illuminate\Http\Response
     */
    public function show(sertifikat $sertifikat)
    {
        return view('dashboard.sertifikat.detail',[ 
            'sertifikat' => $sertifikat
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sertifikat  $sertifikat
     * @return \Illuminate\Http\Response
     */
    public function edit(sertifikat $sertifikat)
    {
        return view('dashboard.sertifikat.edit',[
            'sertifikat' => $sertifikat,
            "siswa"=>siswa::where('status','Terdaftar')->get(),  
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sertifikat  $sertifikat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sertifikat $sertifikat)
    {
        $rules = [ 
            'siswa_id' => 'required', 
        ];

        
       $validatedData= $request->validate($rules);

       if($request->file('sertifikat')){
        $validatedData['sertifikat']=$request->file('sertifikat')->store('sertifikat');
    } 

         
 
 
         sertifikat::where('id',$sertifikat->id)
         ->update($validatedData);
       

      
      
     
        return redirect('/sertifikat')->with('success','Sertifikat Has Been Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sertifikat  $sertifikat
     * @return \Illuminate\Http\Response
     */
    public function destroy(sertifikat $sertifikat)
    {
        if($sertifikat->sertifikat){
            Storage::delete($sertifikat->sertifikat);
        } 
         sertifikat::destroy($sertifikat->id);
        return redirect('/sertifikat')->with('deleted','Sertifikat Has Been Deleted!');
    }
}
