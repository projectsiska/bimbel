<?php

namespace App\Http\Controllers;

use carbon\carbon;
use App\Models\absen;
use App\Models\absen_masuk;
use App\Models\guru; 
use App\Models\siswa; 
use App\Models\kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if(auth()->user()->level=="Administrator"):
        return view('dashboard.absen.index',[
            "id_absen"=>"absennya", 
            "date" => Carbon::now()->format('Y-m-d H:i:s'),
            "guru"=> guru::all(),
            "post" => absen::orderBy('created_at', 'DESC')->get()
        ]);

        elseif(auth()->user()->level=="Guru"): 
          
            $a = kelas::where('guru_id', auth()->user()->guru->id)->get();
 
                
            if($a->count() > 0):
               

            return view('dashboard.absen.index',[

                    "post"=> absen::where('kelas_id', auth()->user()->guru->kelas->id )->get(),
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
       
 
        if(auth()->user()->level=="Guru"):
        return view('dashboard.absen.create',[
            "id_absen"=>"absennya", 
            "guru"=> guru::all(),
            "kelas"=> kelas::where('guru_id', auth()->user()->guru->id)->get(),
         ]);

        elseif(auth()->user()->level=="Administrator"):
            return view('dashboard.absen.create',[
                "id_absen"=>"absennya", 
                "guru"=> guru::all(),
                "kelas"=> kelas::all(),
             ]);

        endif;

        
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
         
        $validatedData = $request->validate([
           
            'judul' => 'required',
            'tutup_absen' => 'required',   
            'kelas_id' => 'required',   
        ]);
    
        

        absen::create($validatedData);
     

        return redirect('/absen')->with('success','Amazing! Your Absen has been Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show(absen $absen)
    {
        return view('dashboard.absen.detail',[
            'absen' => $absen,
            'absenmasuk'=> absen_masuk::join('siswas', 'siswas.id', '=', 'absen_masuks.siswa_id')->where('absen_id',$absen->id)->get(['siswas.*','absen_masuks.*'])
   
        ]);
    }

    public function absenhome()
    {
        
        return view('absen',[
            "id_absen"=>"absennya", 
            "date" => Carbon::now()->format('Y-m-d H:i:s'),
            "guru"=> guru::all(),
            "post" => absen::where('kelas_id', auth()->user()->siswa->kelas )->get()
        ]);
    }


    public function absenmasuk(Request $request)
    { 
        $validatedData = $request->validate([
           
            'absen_id' => 'required',
            'siswa_id' => 'required',    
        ]);
    
        

        absenmasuk::create($validatedData);
     

        return redirect('/absen-home')->with('success','Amazing! Your Absen has been Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit(absen $absen)
    {   
        
      
        $absen = array(
            'id_kelas'=>"kelasnya",
            'guru'=> guru::all(),
            'absen'=> absen::find($absen->id),
            'kelas'=> kelas::all()
        );
   
           return view('dashboard.absen.edit')->with($absen); 
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
       
         $rules = [  
           'judul' => 'required',
           'tutup_absen' => 'required',  
           
       ];
  
       
       $validatedData= $request->validate($rules);
       

 
        absen::where('id',$absen->id)
        ->update($validatedData);
      

     
     
    
       return redirect('/absen')->with('success','Absen Has Been Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy(absen $absen)
    { 

         
        $absen_masuk = absen_masuk::where('absen_id',$absen->id)->count();
        $absen_masuknya = absen_masuk::where('absen_id',$absen->id)->get(['id']);
 
        if($absen_masuk != null):
          
            
            absen_masuk::destroy($absen_masuknya);
            absen::destroy($absen->id);
            return redirect('/absen')->with('deleted','Absen Has Been Deleted!');
            

        else:  
            absen::destroy($absen->id);
            return redirect('/absen')->with('deleted','Absen Has Been Deleted!');


        endif;

    
          
    }
}
