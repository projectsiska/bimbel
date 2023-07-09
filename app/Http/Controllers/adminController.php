<?php

namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;  
use App\Models\admin; 
use App\Models\user;


use PDF;


class adminController extends Controller
{

     
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id ;
         return view('dashboard.admin.index',[ 
        "post"=> admin::all(),
         
        

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
         return view('dashboard.admin.create', [
            'periodecek' => admin::all(),  
            
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
        // dd($request);
        $validatedData = $request->validate([ 
            'nama' => 'required',
            'email' => 'required', 
            'level' => 'required',  
        ]);

        $validatedDataUser = $request->validate([  
            'email' => 'required|unique:users',
            'username' => 'required|unique:users', 
            'password' => 'required'
        ]);

       // dd("a");
        //$validatedDataUser['password']=bcrypt($validatedDataUser['password']);
        $validatedDataUser['level']="Administrator";
        $validatedDataUser['name']=$request->nama; 

        //ddd($validatedData);
            $userCreate = user::create($validatedDataUser);
           

           $validatedData['user_id'] = $userCreate->id;
           
           admin::create($validatedData);
        return redirect('/admin')->with('success','admin Has Been Success!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    { 
       }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $administrator)
    {
        //dd($administrator);
        //
         return view('dashboard.admin.edit',[
           // 'admin' => admin::with(['user'])->get()
              'admin'=> $administrator
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {   
        $rules = [ 
            'nama' => 'required',   
            'email' => 'required',
            'level' => 'required',
            
        ];

        $usernya = user::find($request->user_id);

      //  dd($usernya->username);

        $validatedDataUser['password']=bcrypt($request['password']); 
        $validatedDataUser['nama']=$request->nama;
        $validatedDataUser['username']=$request->username;
        $validatedDataUser['email']=$request->email;

        if($request->email != $admin->email)
        {
            $rules['email'] = 'required|unique:admins';
        }
        if($request->username != $usernya->username)
        {
            $rules1['username'] = 'required|unique:users';
            extract($request->validate($rules1));

            $validatedDataUser['username']= $request->username;

        }
        if($request->password != $usernya->password)
        {

       $validatedDataUser['password']= Hash::make($request->password);
        };

        dd($request->validate($rules));
        
        $user = $admin->user;
        $validatedData= $request->validate($rules);
        
        DB::transaction(function () use($validatedDataUser, $validatedData, $user, $admin) {
        user::where('id',$request->user_id)
        ->update($validatedDataUser);
 
 
 
         admin::where('id',$admin->id)
         ->update($validatedData);
        });


      
        return redirect('/admin')->with('success','admin Has Been Update!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
      
        user::destroy($admin->user_id);
        admin::destroy($admin->id);
        return redirect('/admin')->with('deleted','admin Has Been Deleted!');
    }

    function getadmin(admin $admin){

        return response()->json($admin);
     }
 
}

?>
