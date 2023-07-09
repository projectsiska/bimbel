<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswa;
use App\Models\biaya;
use App\Models\user;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
            "id_siswa"=>"siswanya",
            
            "post"=> siswa::latest()->filter(request(['search']))->paginate(5)->withQueryString() 
    ]);
    }


    public function registrasi()
    {
        //
       return view('registrasi', [
            'biaya' => biaya::all(),
            'user' => user::all()
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
       return view('dashboard.siswa.create', [
            'biaya' => biaya::all(),
            'user' => user::all()
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
        //
       // dd($request);
         
        $validatedData = $request->validate([
            
            'nama_siswa' => 'required', 
            'jk' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required|unique:siswas', 
            'username' => 'required|unique:siswas',
            'password' => 'required'
        ]);
        
        $validatedDataUser = $request->validate([  
            'email' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        $validatedDataUser['password']=bcrypt($validatedDataUser['password']);
        $validatedDataUser['level']="siswa";
        $validatedDataUser['name']=$request->nama_siswa; 

        // die();

        $validatedData['password']=bcrypt($validatedData['password']); 

       //dd(Auth::check()&& auth()->user()->level);
        
       
       DB::transaction(function () use($validatedDataUser, $validatedData) {
           $userCreate = user::create($validatedDataUser);
           
           $validatedData['user_id'] = $userCreate->id;
           siswa::create($validatedData);
        });
        
        
        
        if(Auth::guest()==true):

            return redirect('/login-home')->with('success','Amazing! Your Account has been Created Successfully');
        else:
                return redirect('/siswa')->with('success','Siswa Has Been Success! Wait For Confirmation');
        endif;
         
         
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(siswa $siswa)
    {
       
    return view('dashboard.siswa.detsiswa',[
        'siswa' => $siswa
        
    ], [
        'biaya' => biaya::all()
        
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
        'biaya' => biaya::all(),
        'user' => $siswa->user
        // 'user' => user::find($siswa->user_id)
        
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
        //dd($request);
         $rules = [ 
            'nama_siswa' => 'required', 
            'jk' => 'required',
            'alamat' => 'required', 
            'telepon' => 'required',
            
        ];


       

        $validatedDataUser['password']=bcrypt($request['password']);
        $validatedDataUser['level']="siswa";
        $validatedDataUser['name']=$request->nama_siswa;

         
        if($request->email !=$siswa->email)
        {
            $rules['email'] = 'required|unique:siswas';
        }
        if($request->username != $siswa->username)
        {
            $rules1['username'] = 'required|unique:siswas';
            extract($request->validate($rules1));

        $validatedDataUser['username']= $username;

        }
        if($request->password != $siswa->password)
        {

       $validatedDataUser['password']= Hash::make($request->password);
        };


           
       // $validatedData['password']=bcrypt($validatedData['password']);
       // $validatedDataUser['username']=$request->validate($rules1);

       $user = $siswa->user;
       $validatedData= $request->validate($rules);
       //dd($validatedDataUser);
       DB::transaction(function () use($validatedDataUser, $validatedData, $user, $siswa) {
        user::where('id',$user->id)
        ->update($validatedDataUser);
 
 
 
         siswa::where('id',$siswa->id)
         ->update($validatedData);
    });


      ($levelnya = auth()->user()->level);
      
       // if($levelnya=="Administrator")
        return redirect('/siswa')->with('success','siswa Has Been Update!');
       /* else
        return redirect("siswa/" . auth()->user()->siswa->id)->with('success','siswa Has Been Update!');
        end;*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(siswa $siswa)
    {
        //
         siswa::destroy($siswa->id);
         user::destroy($siswa->user_id);
        return redirect('/siswa')->with('deleted','Your siswa Has Been Deleted!');
  
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
        ->where('status', '=',"Lunas")
        ->whereBetween('updated_at', [$tglawal, $tglakhir]);
        return view('dashboard.siswa.siswa_pdf', compact('cetakpertanggalnya'));
        
    }

    
    public function cetakall()
    {
        //dd(["berdasarkan: ".$berdasarkan, "isinya ".$isinya]);
        $cetakpertanggalnya = siswa::all();
                return view('dashboard.siswa.siswa_pdf', compact('cetakpertanggalnya'));
    }

    public function cetakberdasarkan($berdasarkan, $isinya)
    {
        //dd(["berdasarkan: ".$berdasarkan, "isinya ".$isinya]);
        $cetakpertanggalnya = siswa::WHERE("$berdasarkan",'LIKE', "%$isinya%")->get();
                return view('dashboard.siswa.siswa_pdf', compact('cetakpertanggalnya'));
    }
    
 
}

