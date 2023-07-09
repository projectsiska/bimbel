<?php

namespace App\Http\Controllers;

use carbon\carbon;
use App\Models\absen;
use App\Models\absen_masuk;
use App\Models\guru; 
use App\Models\kelas;
use Illuminate\Http\Request; 


class AbsenMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('absen',[
            "id_absen"=>"absennya", 
            "date" => Carbon::now()->format('Y-m-d H:i:s'),
            "guru"=> guru::all(),
            "absen_masuk"=> absen_masuk::where('siswa_id', auth()->user()->siswa->id )->get(),
            "post" => absen::where('kelas_id', auth()->user()->siswa->kelas )->get()
           // "post" => absen::whereRelation('absen_masuk', 'kelas_id', '=', auth()->user()->siswa->kelas)->get()
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $validatedData = $request->validate([
           
            'absen_id' => 'required',
            'siswa_id' => 'required',    
        ]);
     
        absen_masuk::create($validatedData);
      
        return redirect('/absen-home')->with('success','Amazing! Your Absen has been Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show(absen $absen)
    {
         
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit(absen $absen)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, absen $absen)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy(absen $absen)
    { 
 
         absen_masuk::destroy('absen_id',$absen->id);
         absen::destroy($absen->id);
        return redirect('/absen')->with('deleted','Absen Has Been Deleted!');
    }
}
