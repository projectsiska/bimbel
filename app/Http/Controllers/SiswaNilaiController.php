<?php

namespace App\Http\Controllers;

use App\Models\siswa_nilai;
use App\Models\nilai; 
use App\Models\guru; 

use Illuminate\Http\Request; 

class SiswaNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('nilai',[
            "id_absen"=>"absennya",  
            "guru"=> guru::all(), 
            "post"=> siswa_nilai::join('nilais', 'nilais.id', '=', 'siswa_nilais.nilai_id')->where('siswa_id', auth()->user()->siswa->id)->get(['siswa_nilais.*','nilais.*'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
           
            'nilai_id' => 'required',
            'siswa_id' => 'required',    
            'nilai' => 'required',    
        ]);
     
        siswa_nilai::create($validatedData);
      
        return redirect('/nilai')->with('success','Amazing! Nilai Siswa has been Add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\siswa_nilai  $siswa_nilai
     * @return \Illuminate\Http\Response
     */
    public function show(siswa_nilai $siswa_nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\siswa_nilai  $siswa_nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(siswa_nilai $siswa_nilai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatesiswa_nilaiRequest  $request
     * @param  \App\Models\siswa_nilai  $siswa_nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Updatesiswa_nilaiRequest $request, siswa_nilai $siswa_nilai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\siswa_nilai  $siswa_nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, siswa_nilai $siswa_nilai)
    { 
        siswa_nilai::destroy($id); 
       return redirect('/nilai')->with('deleted','Nilai Has Been Deleted!');
    }



    
    
 
}
