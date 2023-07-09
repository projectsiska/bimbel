<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profil; 

class profilController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

         return view('dashboard.profil.index',[
            "id_profil"=>"profilnya",
            
            "post"=> profil::all() , 
         ]);
    }

    public function profilhome()
    {
        //

         return view('profil',[
            "id_profil"=>"profilnya",
            
            "post"=> profil::all() , 
         ]);
    }
    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           return view('dashboard.profil.create');
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
        // dd($request->all());
        $validatedData = $request->validate([
             
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'foto' => 'required|file|max:2024' 
        ]);

        if($request->file('foto')){
            $validatedData['foto']=$request->file('foto')->store('profil');
        } 

        
        profil::create($validatedData);
        return redirect('/profil')->with('success','New profil Has Been Add!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(profil $profil)
    {
        //
          return view('dashboard.profil.detprofil',[
        'profil' => $profil
    ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit(profil $profil)
    {
        //
        return view('dashboard.profil.edit',[
              'profil'=> $profil
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, profil $profil)
    {
        //
          $validatedData = $request->validate([
            'bulan' => 'required|max:25', 
            'tahun' => 'required'
        ]);

        
        profil::where('id',$profil->id)
        ->update($validatedData);
        return redirect('/profil')->with('success','profil Has Been Update!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(profil $profil)
    {
        //
          profil::destroy($profil->id);
        return redirect('/profil')->with('deleted','Your profil Has Been Deleted!');
  
    }
 
 
}

