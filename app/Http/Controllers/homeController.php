<?php

namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Carbon;

use Illuminate\Http\Request; 
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\biaya;
use App\Models\siswa; 
use App\Models\user;  
use App\Models\guru; 
use App\Models\kelas; 
use App\Models\absen; 
use App\Models\nilai; 
use App\Models\pembayaran; 


use PDF;


class homeController extends Controller
{

     
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        

       
        $level = auth()->user()->level ;

        if($level=="Administrator")
        {
         
         return view('dashboard/home',[
        
         
         "menu"=>galery::all(),
        ]);
        }
        elseif($level=="Pimpinan")
        {
        }
        else{

            return view('home',[
                "id_pembayaran"=>"pembayarannya",
              "usercontact"=>user::find(4),
                 ]);

        } 

}

    public function dashboard()
    {
       // dd();
       $startDate = Carbon::today()->format('Y-m-d');
        $endDate = Carbon::today()->addDays(7)->format('Y-m-d');
       
        $id = auth()->user()->id ;
         return view('dashboard.home',[
           
            "guru"=>guru::all(),
            "siswa"=>siswa::all(),
            "kelas"=>kelas::all(),
            "absen"=>absen::all(),
            "nilai"=>nilai::all(), 
            "pembayaran"=>pembayaran::all(),
            "belum"=>pembayaran::where('status','Menunggu')->paginate(5),
            "siswa"=>siswa::where('status','Terdaftar')->orderBy('updated_at', 'DESC')->paginate(5),
 
       
         

    ]);

}


    public function home()
    {
       // dd();
     
         return view('home',[
          
         

       
         

    ]);



    //dd($postper);
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     

    
}

?>
