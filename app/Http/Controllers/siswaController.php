<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Models\user;
use App\Models\nilai;
use App\Models\siswa_nilai;
use App\Models\sertifikat;
use App\Models\pembayaran;
use App\Models\absen_masuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.siswa.index',[
            "id_user"=>"usernya", 

            "post"=> siswa::join('users', 'siswas.user_id', '=', 'users.id')->where('status','Terdaftar')->get(['siswas.*','users.username'])
             ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        $validatedData = $request->validate([ 
            'nama_siswa' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',  
            'agama' => 'required', 
            'alamat' => 'required',
            'email' => 'required|unique:siswas',
            'telepon' => 'required', 
            'asal_sekolah' => 'required',     
            'status' => 'required',     
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
        $validatedDataUser['level']="Siswa";
         $validatedDataUser['nama']=$request->nama_siswa; 
 

        $validatedDataUser['password']=bcrypt($request->password); 

       //dd(Auth::check()&& auth()->user()->level);
      // ddd($validatedData);
       
       DB::transaction(function () use($validatedDataUser, $validatedData) {
           $userCreate = user::create($validatedDataUser);
           

           $validatedData['user_id'] = $userCreate->id;
           
           siswa::create($validatedData);
        });

        return redirect('/siswa')->with('success','Amazing! Your Account has been Created Successfully');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(siswa $siswa)
    {
        return view('dashboard.siswa.detail',[
            'siswa' => $siswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(siswa $siswa)
    {
        return view('dashboard.siswa.edit',[
            'siswa' => $siswa,
            /* 'paket' => paket::all(),
            'user' => $siswa->user */
            'user' => siswa::join('users', 'siswas.user_id', '=', 'users.id')->find($siswa->user_id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, siswa $siswa)
    {
        $rules = [ 
            'nis' => 'required|unique:siswas',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',  
            'agama' => 'required', 
            'alamat' => 'required',
            'email' => 'required|unique:siswas',
            'telepon' => 'required', 
            'asal_sekolah' => 'required', 
            'jurusan' => 'required', 
            'tahun_masuk' => 'required', 
            'nama_ayah' => 'required',
            'telepon_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'nama_ibu' => 'required',
            'telepon_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
        ];

        $validatedDataUser['password']=bcrypt($request['password']); 
        $validatedDataUser['name']=$request->nama;
        $validatedDataUser['username']=$request->username;
        $validatedDataUser['email']=$request->email;

        if($request->email !=$siswa->email)
        {
            $rules['email'] = 'required|unique:siswas';
        }
        if($request->username != $siswa->user->username)
        {
            $rules1['username'] = 'required|unique:users';
            extract($request->validate($rules1));

        $validatedDataUser['username']= $username;

        }
        if($request->password != $siswa->user->password)
        {

       $validatedDataUser['password']= Hash::make($request->password);
        };

 
       $user = $siswa->user;
       $validatedData= $request->validate($rules);

       DB::transaction(function () use($validatedDataUser, $validatedData, $user, $siswa) {
        user::where('id',$siswa->user_id)
        ->update($validatedDataUser);
 
 
 
         siswa::where('id',$siswa->id)
         ->update($validatedData);
        });


      
      
     
        return redirect('/siswa')->with('success','siswa Has Been Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(siswa $siswa)
    {
        if($siswa->foto){
            Storage::delete($siswa->foto);
        }

        pembayaran::where('siswa_id',$siswa->id)->delete();
        sertifikat::where('siswa_id',$siswa->id)->delete();
        absen_masuk::where('siswa_id',$siswa->id)->delete();
        siswa_nilai::where('siswa_id',$siswa->id)->delete();
          
        siswa::destroy('siswa_id',$siswa->id);
        user::destroy($siswa->user_id);
        return redirect('/siswa')->with('deleted','Siswa Has Been Deleted!');
    }

    
    
    public function laporan()
    {
        
        $id = auth()->user()->id ;
        return view('dashboard.siswa.laporan');

    //dd($postper);
    }

    public function cetakpertanggal($tglawal, $tglakhir)
    {
        
        //dd(["tanggal awal".$tglawal, "tanggal akhir".$tglakhir]);
        $cetakpertanggalnya = siswa::all()
        ->where('status', '=',"Terdaftar")
        ->whereBetween('updated_at', [$tglawal, $tglakhir]);
        return view('dashboard.siswa.siswa_pdf', compact('cetakpertanggalnya'));
        
    }

    
    public function cetakall()
    {
        //dd(["berdasarkan: ".$berdasarkan, "isinya ".$isinya]);
        $cetakpertanggalnya = siswa::where('status', '=',"Terdaftar")->get();
                return view('dashboard.siswa.siswa_pdf', compact('cetakpertanggalnya'));
    }

    public function cetakberdasarkan($berdasarkan, $isinya)
    {
        //dd(["berdasarkan: ".$berdasarkan, "isinya ".$isinya]);
        $cetakpertanggalnya = siswa::WHERE("$berdasarkan",'LIKE', "%$isinya%")->where('status', '=',"Terdaftar")->get();
                return view('dashboard.siswa.siswa_pdf', compact('cetakpertanggalnya'));
    }
}
