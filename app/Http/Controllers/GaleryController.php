<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\galery; 

class GaleryController extends Controller
{
    public function index()
    {
        //$id = auth()->user()->id ;
         return view('dashboard.galery.index',[
        "id_galery"=>"galerynya",
        "post"=> galery::latest()->paginate(10)->withQueryString(),
        "postper"=> galery::all()
        

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
         return view('dashboard.galery.create', [
            'periodecek' => galery::all(),  
            
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
            'nama_menu' => 'required',
            'harga' => 'required', 
            'keterangan' => 'required', 
            'foto' => 'required|file|max:2024', 
        ]);

         if($request->file('foto')){
            $validatedData['foto']=$request->file('foto')->store('upload-foto');
        }  

        //ddd($validatedData);
        galery::create($validatedData);
        return redirect('/galery')->with('success','galery Has Been Success!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function show(galery $galery)
    {
        //
  //dd($galery);
        return view('dashboard.galery.detgalery',[
            'galery' => $galery
        ]);
       }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function edit(galery $galery)
    {
        //
         return view('dashboard.galery.edit',[
            'galery' => galery::all(), 
              'galery'=> $galery
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, galery $galery)
    {
        //dd($request);
        $rules = [ 
            'nama_menu' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'foto' => 'file|max:2024'
        ];
          
         
        
         
        $validatedData = $request->validate($rules);
         
        if($request->file('foto')) {
            
            $validatedData['foto'] = $request->file('foto')->store('upload-foto');
        }
        
       
        galery::where('id',$galery->id)
        ->update($validatedData);
        return redirect('/galery')->with('success','galery Has Been Update!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function destroy(galery $galery)
    {
        //
        if($galery->foto){
            Storage::delete($galery->foto);
            }
         galery::destroy($galery->id);
        return redirect('/galery')->with('deleted','galery Has Been Deleted!');
    }

    function getgalery(galery $galery){

        return response()->json($galery);
     }
 
}
