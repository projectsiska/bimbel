<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\pembayaran;
use App\Models\siswa;
use App\Models\biaya;
use App\Models\kelas;
use App\Models\rekening;

class pembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pembayaran.index',[
            "id_user"=>"usernya", 

            "post"=> pembayaran::orderby('status','Desc')->get()
             ]);
    }


    public function home()
    {
       // dd("ff");
        return view('create',[
            "id_user"=>"usernya", 

            "rekening"=> rekening::all(),
            "biaya"=> biaya::all(),
            "post"=> pembayaran::all(),

             ]);
    }

    
    public function bayarsiswa(Request $request)
    {
        
        $validatedData = $request->validate([ 
            'siswa_id' => 'required',
            'rekening_id' => 'required',
            'biaya' => 'required',  
            'bukti' => 'required|file|max:2024' 
        ]);

        //dd($request);

        if($request->file('bukti')){
            $validatedData['bukti']=$request->file('bukti')->store('upload-bukti');
        } ;

         
            $validatedData['status']="Menunggu"; 
           
  

          // DD($validatedData);
           pembayaran::create($validatedData); 

        return redirect('/riwayat')->with('success','Thanks! Please Waiting For Your Confirmation');
   
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pembayaran.create',[
            "post"=> pembayaran::all(),
            "siswa"=> siswa::all(),
            "biaya"=> biaya::all(),
            "rekening"=> rekening::all()
            
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
       // dd($request);
        $validatedData = $request->validate([ 
            'siswa_id' => 'required',
            'rekening_id' => 'required',
            'biaya' => 'required', 
            'status' => 'required',  
            'bukti' => 'required|file|max:2024' 
        ]);

        //dd($request);

        if($request->file('bukti')){
            $validatedData['bukti']=$request->file('bukti')->store('upload-bukti');
        } ;

         
            $validatedDataUser['status']="Terdaftar"; 
 
    
            siswa::where('id',$request->siswa_id)
            ->update($validatedDataUser);
           

          // DD($validatedData);
           pembayaran::create($validatedData); 

        return redirect('/pembayaran')->with('success','Amazing! Your Payment has been Successfully');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(pembayaran $pembayaran)
    {
        return view('dashboard.pembayaran.detail',[
            'pembayaran' => $pembayaran
        ]);
    }

    public function riwayat(pembayaran $pembayaran)
    {
        $ids = auth()->user()->siswa->id;
        return view('riwayat',[
            'post' => pembayaran::where('siswa_id', $ids)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(pembayaran $pembayaran)
    {
        return view('dashboard.pembayaran.edit',[
            'pembayaran' => $pembayaran,
            /* 'paket' => paket::all(),
            'user' => $pembayaran->user */
            'siswa' => siswa::all(),
            'rekening' => rekening::all(),
            'biaya' => biaya::all(),
            'kelas' => kelas::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pembayaran $pembayaran)
    {
        //dd($request);
        $rules = [ 
            'siswa_id' => 'required',
            'rekening_id' => 'required',
            'biaya' => 'required', 
            'status' => 'required',    

        ];

     
        if($request->status == "Konfirmasi"){
            $validatedDataUser['status'] = "Terdaftar";
            $validatedDataUser['kelas'] = $request->kelas;
            
        } 
        else{
            $validatedDataUser['status'] = "Ditolak";

        }
        
        
        $validatedData= $request->validate($rules);


        
        
        if($request->file('bukti')){
            $validatedData['bukti']=$request->file('bukti')->store('upload-bukti');
        } 

         pembayaran::where('id',$pembayaran->id)
         ->update($validatedData);

         siswa::where('id',$request->siswa_id)
         ->update($validatedDataUser);
      

      
      
     
        return redirect('/pembayaran')->with('success','Pembayaran Has Been Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(pembayaran $pembayaran)
    {
        if($pembayaran->foto){
            Storage::delete($pembayaran->foto);
        }
         user::destroy($pembayaran->user_id);
         pembayaran::destroy($pembayaran->id);
        return redirect('/pembayaran')->with('deleted','Pembayaran Has Been Deleted!');
    }


    //LAPORAN START

    
    public function laporan() {
        $id=auth()->user()->id;
        return view('dashboard.pembayaran.laporan', [ "id_pembayaran"=>"pembayarannya",
            "siswa"=> siswa::where('status', 'like', 'Terdaftar')->get()]);
        // dd($siswanya);

    }

    public function kwitansi() {

        $id=auth()->user()->id;
        return view('dashboard.pembayaran.kwitansi');

        //dd($postper);
    }



    public function cetakpertanggal($tglawal, $tglakhir) {

        //dd(["tanggal awal".$tglawal, "tanggal akhir".$tglakhir]);
        $cetakpertanggalnya=pembayaran::all() ->where('status', '=', "Konfirmasi") ->whereBetween('updated_at', [$tglawal, $tglakhir]);
        return view('dashboard.pembayaran.pembayaran_pdf', compact('cetakpertanggalnya'));

    }



    public function cetakall() {

        //dd(["tanggal awal".$tglawal, "tanggal akhir".$tglakhir]);
        $cetakpertanggalnya=pembayaran::all();
        return view('dashboard.pembayaran.pembayaran_pdf', compact('cetakpertanggalnya'));

    }


    public function cetakberdasarkan($berdasarkan) {
        $cetakpertanggalnya=pembayaran::where('status', 'like', $berdasarkan)->get();
        return view('dashboard.pembayaran.pembayaran_pdf', compact('cetakpertanggalnya'));
    }

    
    public function cetakberdasarkannama($berdasarkan) {
        $cetakpertanggalnya=pembayaran::where('siswa_id', 'like', $berdasarkan)->get();
        return view('dashboard.pembayaran.pembayaran_pdf', compact('cetakpertanggalnya'));
    }
 

    public function checkSlug(Request $request) {
        $slug=SlugService::createSlug(pembayaran::class, 'slug', $request->id);
        return response()->json(['slug'=> $slug]);
    }


    public function export(Request $request) {
      
        return view('dashboard.pembayaran.kwitansi', [ 
            
            'kelas'=> kelas::all(),
            'data'=> pembayaran::where('id',$request->id)->get(),
           ]);

           return view('pembayaran.kwitansi', compact('data'));
    }
 
    
}
