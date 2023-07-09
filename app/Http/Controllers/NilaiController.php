<?php

namespace App\Http\Controllers;

use App\Models\nilai;
use App\Models\kelas;
use App\Models\siswa;
use App\Models\siswa_nilai;

use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    
    {
         
        if( auth()->user()->level == "Administrator"):

           
            return view('dashboard.nilai.index',[

                "post"=> nilai::all()
                ]);

        elseif( auth()->user()->level == "Guru"):
            
            $a = kelas::where('guru_id', auth()->user()->guru->id)->get();
 
                
            if($a->count() > 0):
               

            return view('dashboard.nilai.index',[

                    "post"=> nilai::where('kelas_id', auth()->user()->guru->kelas->id )->get(),
                    ]);

            else :

                return view('dashboard.nilai.index',[

                    "post"=> "none",
                    ]);

            endif;
 
               
        endif;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.nilai.create',[

            "nilai"=> nilai::all(),
            "kelas"=> kelas::all()
             ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorenilaiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)    
    {
        
        $validatedData = $request->validate([
            'judul' => 'required',
            'kelas_id' => 'required',  
        ]);
         
           
        nilai::create($validatedData);
        

        return redirect('/nilai')->with('success','Amazing! Your Nilai has been Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(nilai $nilai)
    {
    
       
        $nilai = array(
            'id_kelas'=>"kelasnya", 
            'siswa'=> siswa::where('kelas', $nilai->kelas_id)->where('status','Terdaftar')->get(),
            'nilai_masuk'=> siswa_nilai::where('nilai_id', $nilai->id)->get(),
            'nilai'=> nilai::where('id',$nilai->id)->get());
   
            
           return view('dashboard.nilai.detail')->with($nilai);

        


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(nilai $nilai)
    {   
        $nilai = array(
            'id_kelas'=>"kelasnya",
            'kelas'=> kelas::where('guru_id', auth()->user()->guru->id),
            'nilai'=> nilai::find($nilai->id));
   
           return view('dashboard.nilai.edit')->with($nilai);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, nilai $nilai)
    {
        $idnya = $request->id;
        $validatedData = $request->validate([
            'judul' => 'required', 
            
        ]); 


         nilai::where('id',$idnya)
         ->update($validatedData);
      
        return redirect('/nilai')->with('success','Nilai Has Been Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(nilai $nilai)
    {

        if(count($nilai->siswa_nilai) > 0){
       
      
        foreach (siswa_nilai::where('nilai_id',$nilai->id)->get() as $aa):
            
            siswa_nilai::destroy('nilai_id',$aa->id);
        endforeach;
        } 
       

        nilai::destroy($nilai->id);
        return redirect('/nilai')->with('deleted','Nilai Has Been Deleted!');

    }
}
