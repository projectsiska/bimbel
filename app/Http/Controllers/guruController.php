<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.guru.index',[
            "id_user"=>"usernya", 

            "post"=> guru::join('users', 'gurus.user_id', '=', 'users.id')->get(['gurus.*','users.username'])
             ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.guru.create');
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
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',  
            'agama' => 'required', 
            'alamat' => 'required',
            'email' => 'required|unique:gurus',
            'telepon' => 'required',
            'pendidikan_terakhir' => 'required', 
            'jurusan' => 'required', 
            'tahun' => 'required', 
            'univ' => 'required',
            'foto' => 'required|file|max:2024' 
        ]);

        //dd($request);

        if($request->file('foto')){
            $validatedData['foto']=$request->file('foto')->store('profil');
        } ;

        $validatedDataUser = $request->validate([  
            'email' => 'required|unique:users',
            'username' => 'required|unique:users', 
            'password' => 'required'
        ]);

        //$validatedDataUser['password']=bcrypt($validatedDataUser['password']);
        $validatedDataUser['level']="Guru";
        $validatedDataUser['nama']=$request->nama; 
 

        $validatedDataUser['password']=bcrypt($request->password); 

       //dd(Auth::check()&& auth()->user()->level);
      // ddd($validatedData);
       
       DB::transaction(function () use($validatedDataUser, $validatedData) {
           $userCreate = user::create($validatedDataUser);
           

           $validatedData['user_id'] = $userCreate->id;
           
           guru::create($validatedData);
        });

        return redirect('/guru')->with('success','Amazing! Your Account has been Created Successfully');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(guru $guru)
    {
        return view('dashboard.guru.detail',[ 
            'guru' => $guru
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(guru $guru)
    {
        return view('dashboard.guru.edit',[
            'guru' => $guru,
            /* 'paket' => paket::all(),
            'user' => $guru->user */
            'user' => guru::join('users', 'gurus.user_id', '=', 'users.id')->find($guru->user_id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, guru $guru)
    {
        $rules = [ 
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',  
            'agama' => 'required', 
            'alamat' => 'required', 
            'telepon' => 'required', 
            'pendidikan_terakhir' => 'required', 
            'jurusan' => 'required', 
            'tahun' => 'required', 
            'univ' => 'required', 
            
        ];

       

        $validatedDataUser['password']=bcrypt($request['password']); 
        $validatedDataUser['nama']=$request->nama;
        $validatedDataUser['username']=$request->username;
        $validatedDataUser['email']=$request->email;

        if($request->email !=$guru->email)
        {
            $rules['email'] = 'required|unique:gurus';
        }
        if($request->username != $guru->user->username)
        {
            $rules1['username'] = 'required|unique:users';
            extract($request->validate($rules1));

        $validatedDataUser['username']= $username;

        }
        if($request->password != $guru->user->password)
        {

       $validatedDataUser['password']= Hash::make($request->password);
        };

 
       $user = $guru->user;
       $validatedData= $request->validate($rules);

       if($request->file('foto')){
        $validatedData['foto']=$request->file('foto')->store('profil');
    } 

         user::where('id',$guru->user_id)
        ->update($validatedDataUser);
 
 
 
         guru::where('id',$guru->id)
         ->update($validatedData);
       

      
      
     
        return redirect('/guru')->with('success','Guru Has Been Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(guru $guru)
    {
        if($guru->foto){
            Storage::delete($guru->foto);
        }
         user::destroy($guru->user_id);
         guru::destroy($guru->id);
        return redirect('/guru')->with('deleted','Guru Has Been Deleted!');
    }

    public function laporan()
    {
        
        $id = auth()->user()->id ;
        return view('dashboard.guru.laporan');

    //dd($postper);
    }

    public function cetakpertanggal($tglawal, $tglakhir)
    {
        
        //dd(["tanggal awal".$tglawal, "tanggal akhir".$tglakhir]);
        $cetakpertanggalnya = guru::all() 
        ->whereBetween('updated_at', [$tglawal, $tglakhir]);
        return view('dashboard.guru.guru_pdf', compact('cetakpertanggalnya'));
        
    }

    
    public function cetakall()
    {
        //dd(["berdasarkan: ".$berdasarkan, "isinya ".$isinya]);
        $cetakpertanggalnya = guru::all();
                return view('dashboard.guru.guru_pdf', compact('cetakpertanggalnya'));
    }

    public function cetakberdasarkan($berdasarkan, $isinya)
    {
        //dd(["berdasarkan: ".$berdasarkan, "isinya ".$isinya]);
        $cetakpertanggalnya = guru::WHERE("$berdasarkan",'LIKE', "%$isinya%")->get();
                return view('dashboard.guru.guru_pdf', compact('cetakpertanggalnya'));
    }
}
