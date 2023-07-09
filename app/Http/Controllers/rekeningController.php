<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\rekening;
use Illuminate\Support\Facades\Storage;

class rekeningController extends Controller
{
    //
    public function index()
    {
        //$id = auth()->user()->id ;
         return view('dashboard.rekening.index',[
        "id"=>"rekeningnya",
        "post"=> rekening::latest()->filter(request(['search']))->paginate(6)->withQueryString(),
         

    ]);

    //dd($postper);
    }   


    public function rekeninghome()
    {
        //$id = auth()->user()->id ;
         return view('rekening',[
        "id"=>"rekeningnya",
        "post"=> rekening::latest()->filter(request(['search']))->paginate(6)->withQueryString(),
         

    ]);

    //dd($postper);
    }   
    
    public function rekening()
    {
     //   $id = auth()->user()->siswa->id ;

            return view('rekening',[
                "id_rekening"=>"rekeningnya",
                "post"=> rekening::all(),
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
        return view('dashboard.rekening.create');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('foto_bank')->store('upload-foto_bank');
       //  dd($request);
        $validatedData = $request->validate([ 
            'bank' => 'required',
            'atas_nama' => 'required',
            'rekening' => 'required',
            'foto_bank' => 'required|file|max:2024' 
        ]);

        if($request->file('foto_bank')){
            $validatedData['foto_bank']=$request->file('foto_bank')->store('upload-foto_bank');
        } 
      
        // die();
        rekening::create($validatedData);
        return redirect('/rekening')->with('success','Rekening Has Been Success Add!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function show(rekening $rekening)
    {
        //
          //dd($rekening);
        return view('dashboard.rekening.detrekening',[
            'rekening' => $rekening
        ]);
       }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function edit(rekening $rekening)
    {
        //
        return view('dashboard.rekening.edit',[
              'rekening'=> $rekening
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rekening $rekening)
    {
        //dd($request);
        $rules = [ 
            'bank' => 'required',
            'atas_nama' => 'required',
            'rekening' => 'required',
            'foto_bank' => 'file|max:2024' 
        ];
      
         
        $validatedData = $request->validate($rules);
         
        if($request->file('foto_bank')) {
            
            $validatedData['foto_bank'] = $request->file('foto_bank')->store('upload-foto_bank');
        }
        
       
        rekening::where('id',$rekening->id)
        ->update($validatedData);
        return redirect('/rekening')->with('success','rekening Has Been Update!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function destroy(rekening $rekening)
    {
        //
        if($rekening->foto_bank){
            Storage::delete($rekening->foto_bank);
            }
         rekening::destroy($rekening->id);
        return redirect('/rekening')->with('deleted','rekening Has Been Deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(rekening::class, 'slug', $request->id);
        return response()->json(['slug' => $slug]);
    }

}
