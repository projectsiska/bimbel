<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\user;
use App\Models\siswa;
use App\Models\biaya;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class registerController extends Controller
{
    public function index()
    {
        return view('registrasi',[
            'title'=>'Register',
            'active'=>'register',
        ]);
    }

    
    public function registrasi()
    {
        //
       return view('registrasi', [
            'biaya' => biaya::all(),
            'user' => user::all(),
            'siswa' => user::all()
        ]);
    }


    public function store(Request $request)
    {
        //return request()->all();
       // ddd($request);
        $validatedData = $request->validate([ 
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',  
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required', 
            'alamat' => 'required',
            'email' => 'required|unique:siswas',
            'telepon' => 'required', 
            'asal_sekolah' => 'required',     
            'foto' => 'required|file|max:2024'  
        ]);
        

       // dd($request);
        
        if($request->file('foto')){
            $validatedData['foto']=$request->file('foto')->store('profil');
        } ;
                 
        $validatedDataUser = $request->validate([ 
            'nama_siswa' => 'required', 
            'email' => 'required|unique:users,email',
            'username' => 'required|unique:users',
            'password' => 'required'
        ]);
         
        $validatedDataUser['password']=bcrypt($request->password); 
        $validatedDataUser['level']="Siswa";
        $validatedData['status']="Menunggu";
        $validatedDataUser['nama']=$request->nama_siswa;

    
        
            $userCreate = user::create($validatedDataUser);
    
            $validatedData['user_id'] = $userCreate->id;
            siswa::create($validatedData);
        
         

        return redirect('/login')->with('success','New siswa Has Been Add!Login and make some Peachfull');
    }
}
