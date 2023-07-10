<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\biayaController;
use App\Http\Controllers\AbsenController; 
use App\Http\Controllers\AbsenMasukController;  
use App\Http\Controllers\SiswaNilaiController;  
use App\Http\Controllers\siswaController;
use App\Http\Controllers\guruController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\pembayaranController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\profilController; 
use App\Http\Controllers\rekeningController; 
use App\Http\Controllers\userController;
use App\Http\Controllers\kelasController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SertifikatController;
 
use App\Models\sertifikat;
use App\Models\pembayaran;
use App\Models\profil;  
use App\Models\rekening; 
use App\Models\home; 
use App\Models\user;
use App\Models\nilai;
use App\Models\siswa_nilai;
use App\Models\siswa;
use App\Models\guru;
use App\Models\kelas;
use App\Models\admin;
use App\Models\biaya;
use App\Models\absen;
use App\Models\absen_masuk;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 
 Route::get('/', function () {

 
        return view('home', [
            "nama"=> "Siapa ini",
            "user" => "Administrator",
            "aplikasi" => "pembayaran SPP",
            "image" => "gambar.png",
            "objek" => "SMA APA GITU",
           
        ]);
    }); 
    
    Route::get('/admin', function () {
        return view('dashboard.login.index', [ 
            'title'=> 'login'
            ]
        );
    }); 
    

    //admin komponen
      
    Route::get('/administrator/get-admin/{admin}', [adminController::class, 'getadmin']);
    Route::get('/administrator/checkSlug', [adminController::class, 'checkSlug']);
    Route::resource('/administrator', adminController::class)->parameters(['admin' => 'admin']);
     
     //end admin


     //kelas komponen
      
    Route::get('/kelas/get-kelas/{kelas}', [kelasController::class, 'getkelas']);
    Route::get('/kelas/checkSlug', [kelasController::class, 'checkSlug']);
    Route::resource('/kelas', kelasController::class)->parameters(['kelas' => 'kelas']);
     
     //end admin

   
    //biaya komponen
      
    Route::get('/biaya/get-biaya/{biaya}', [biayaController::class, 'getbiaya']); 
    Route::resource('/biaya', biayaController::class)->parameters(['biaya' => 'biaya']);
     
     //end biaya

      
 
     //Start Guru
     
    Route::get('guru/laporan', [guruController::class, 'laporan'])->name('guru.laporan-guru'); 
    Route::get('guru/laporan-pertanggal/{tglawal}/{tglakhir}', [guruController::class, 'cetakpertanggal'])->name('guru.laporan-pertanggal'); 
    Route::get('guru/laporan-berdasarkan/{berdasarkan}/{isinya}', [guruController::class, 'cetakberdasarkan'])->name('guru.laporan-berdasarkan'); 
    Route::get('guru/laporan-all/', [guruController::class, 'cetakall'])->name('guru.laporan-all'); 
     
    Route::resource('/guru', guruController::class);


    Route::get('/sertifikat-home', [SertifikatController::class, 'home'])->name('index'); 
    Route::resource('/sertifikat', SertifikatController::class);

 
    //start nilai
    Route::resource('/nilai', NilaiController::class);

    Route::get('/nilai-home', [SiswaNilaiController::class, 'index'])->name('index'); 
    Route::resource('/nilai-masuk', SiswaNilaiController::class);



    //end nilai
      
    
    //siswa komponen
     
    
    Route::get('siswa/laporan', [siswaController::class, 'laporan'])->name('siswa.laporan-siswa'); 
    Route::get('siswa/laporan-pertanggal/{tglawal}/{tglakhir}', [siswaController::class, 'cetakpertanggal'])->name('siswa.laporan-pertanggal'); 
    Route::get('siswa/laporan-berdasarkan/{berdasarkan}/{isinya}', [siswaController::class, 'cetakberdasarkan'])->name('siswa.laporan-berdasarkan'); 
    Route::get('siswa/laporan-all/', [siswaController::class, 'cetakall'])->name('siswa.laporan-all'); 
     
    
    Route::resource('/siswa', siswaController::class); 
    //end siswa
    
    //siswa komponen
     
    Route::resource('/user', userController::class); 
     
    //end siswa
    
     
    //pembayaran komponen
    
    Route::get('/pembayaran/checkSlug', [pembayaranController::class, 'checkSlug']); 
    Route::get('pembayaran/laporan', [pembayaranController::class, 'laporan'])->name('pembayaran.laporan-pembayaran'); 
    Route::get('pembayaran/laporan-pertanggal/{tglawal}/{tglakhir}', [pembayaranController::class, 'cetakpertanggal'])->name('pembayaran.laporan-pertanggal'); 
    Route::get('pembayaran/laporan-berdasarkan/{berdasarkan}', [pembayaranController::class, 'cetakberdasarkan'])->name('pembayaran.laporan-berdasarkan'); 
    Route::get('pembayaran/laporan-all/', [pembayaranController::class, 'cetakall'])->name('pembayaran.laporan-all'); 
    Route::get('pembayaran/cetak-biaya/{biaya}', [pembayaranController::class, 'cetakkartu'])->name('pembayaran.cetak-biaya'); 
    
   // Route::get('/create', [pembayaranController::class]);
    Route::post('/bayarsiswa', [pembayaranController::class,'bayarsiswa'])->name('bayarsiswa'); 
    Route::post('/pembayaran', [pembayaranController::class]); 
    Route::get('/pembayaran-home', [pembayaranController::class,'home'])->name('home'); 
    Route::get('/riwayat', [pembayaranController::class,'riwayat'])->name('riwayat'); 
    Route::resource('/create', pembayaranController::class);  
    Route::resource('/pembayaran', pembayaranController::class);   
 
    
    
    //profil komponen
    
    
    Route::get('/profil-home', [profilController::class, 'profilhome'])->name('profilhome'); 
    Route::resource('/profil', profilController::class);
    
    //end profil
    
    
    
    //rekening komponen
    
    Route::get('/rekeningbayar', [rekeningController::class,'rekening'])->name('rekening.rekening');
    Route::get('/rekening/get-rekening/{rekening}', [rekeningController::class, 'getrekening']);
    Route::get('/rekening/checkSlug', [rekeningController::class, 'checkSlug']);

    Route::resource('/rekening', rekeningController::class); 
    
    //end rekening
     
    Route::get('/register', [registerController::class, 'registrasi']);
    Route::resource('/register', registerController::class);
     

        
    Route::get('/absen-home', [AbsenMasukController::class, 'index'])->name('index'); 
    Route::resource('/absen', AbsenController::class); 
    Route::resource('/absen-masuk', AbsenMasukController::class); 


     /* 
    Route::get('/login',[LoginController::class, 'index']);
    Route::post('/login',[LoginController::class, 'authenticate']); */
    
    
    Route::get('/logout', [loginController::class,'logout']);
    Route::post('/login', [loginController::class,'authenticate']);
    Route::get('/login', [loginController::class,'index'])->name('login');
    Route::get('/login-home', [loginController::class,'index'])->name('login-home');
    
    Route::get('/dashboard', [homeController::class,'dashboard'])->name('dashboard-admin'); 
    Route::get('/home', [homeController::class,'home'])->name('home'); 
// });

 