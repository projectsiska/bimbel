<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller {

    //
    public function index() {
        return view('login-home.index', [ 'title'=> 'login'
            ]);
/* 
            return view('dashboard.login.index', [ 'title'=> 'login'
            ]); */
    }

    public function authenticate(Request $request) {
        $request->validate([ 'username'=> 'required',
        'password'=>'required'
         ]);
    
    // auth()->logout();
    if(auth()->attempt([ 'username'=> $request->username,
    'password'=> $request->password])) {
        
        
        if(auth()->user()->level=='Administrator') { 
            return redirect(route('dashboard-admin')); 
        }

        elseif(auth()->user()->level=='Guru') {
            
            return redirect(route('dashboard-admin')); 
        }
        
        elseif(auth()->user()->level=='Pimpinan') {
            
            return redirect(route('dashboard-admin')); 
        }
        
        elseif(auth()->user()->level=='Siswa') { 
            return redirect()->to("/");
        }
        else{
            dd("$request->all()");
        }
    }
    
        else {
            dd("salah Username Password");
        }
    }

    public function logout(Request $request) {

        
        if(auth()->user()->level=='Administrator') {
          
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        //return redirect('/login');


          return redirect()->to("/admin");

       
            
        }

        elseif(auth()->user()->level=='Guru') {
         
          
            Auth::logout();
    
            request()->session()->invalidate();
    
            request()->session()->regenerateToken();
    
            //return redirect('/login');
    
    
              return redirect()->to("/admin");
    
           
                
            } 

            elseif(auth()->user()->level=='Pimpinan') {
         
          
                Auth::logout();
        
                request()->session()->invalidate();
        
                request()->session()->regenerateToken();
        
                //return redirect('/login');
        
        
                  return redirect()->to("/admin");
        
               
                    
                } 

        elseif(auth()->user()->level=='Siswa') {

             Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

          
            return redirect()->to("/");
        }

    }

}