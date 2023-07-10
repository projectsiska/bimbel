<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\siswa;
use App\Models\guru;  

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class kelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        return view('dashboard.kelas.index',[

            "post"=> kelas::all()
             ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kelas.create',[

            "guru"=> guru::all()
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

        
        $validatedData = $request->validate([
            'nama_kelas' => 'required',
            'guru_id' => 'required', 
            'keterangan' => 'required',
            'status' => 'required'
        ]);
        
        
       
    
           
           kelas::create($validatedData);
        

        return redirect('/kelas')->with('success','Amazing! Your Class has been Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // ddd($id);
        $kelas = array(
            'id_kelas'=>"kelasnya", 
            'kelas'=> kelas::find($id),
            'siswa'=> siswa::where('kelas',$id)->get());
   
           return view('dashboard.kelas.detail')->with($kelas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
      
        $kelas = array(
            'id_kelas'=>"kelasnya",
            'guru'=> guru::all(),
            'kelas'=> kelas::find($id));
   
           return view('dashboard.kelas.edit')->with($kelas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kelas $kelas)
    {
       $idnya = $request->id;
        $validatedData = $request->validate([
            'nama_kelas' => 'required',
            'guru_id' => 'required',  
            'keterangan' => 'required',
            'status' => 'required'
            
        ]); 


         kelas::where('id',$idnya)
         ->update($validatedData);
      
        return redirect('/kelas')->with('success','kelas Has Been Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($kelas)
    {
      /*   member::destroy($kelas->kelas_id);
        posting::destroy($kelas->kelas_id); */
        kelas::destroy($kelas);
        return redirect('/kelas')->with('deleted','Kelas Has Been Deleted!');
    }
}
