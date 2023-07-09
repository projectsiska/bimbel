<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Hash;


class userController extends Controller
{
    //
     public function index()    
     {
       
     /*   $user = App\Models\User::find(1);
$user->notify(new RegistrationSuccessful($user)); */

           return view('dashboard.user.index',[
            "id_user"=>"usernya",
            
            "post"=> user::where('level', 'Administrator')
             ->orwhere('level','Pimpinan')->get(),

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
        return view('dashboard.user.create');
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

        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'level' => 'required',
            'username' => 'required|unique:users', 
            'password' => 'required'
        ]);

        // die();

         $validatedData['password']=bcrypt($validatedData['password']);

        user::create($validatedData);
        return redirect('/user')->with('success','New User Has Been Add!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
          return view('dashboard.user.edit',[
              'user'=> $user
          ]);
          
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        //
        //dd($request);
         $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'level' => 'required' ,
            'username' => 'required' 
         ]);
      

        $request->all();

        

         if($request->password != $user->password)
        {

       $validatedData['password']= Hash::make($request->password);
        };

       

      
        // die();
        user::where('id',$user->id)
        ->update($validatedData);

        return redirect('/user')->with('success','user Has Been Update!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
         user::destroy($user->id);
        return redirect('/user')->with('deleted','Your user Has Been Deleted!');
    }
}