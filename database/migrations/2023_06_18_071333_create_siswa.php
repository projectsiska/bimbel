<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id(); 
            $table->string('user_id');
            $table->string('nama_siswa'); 
            $table->string('tempat_lahir'); 
            $table->string('tanggal_lahir'); 
            $table->string('jenis_kelamin');
            $table->string('foto'); 
            $table->string('agama'); 
            $table->string('alamat');
            $table->string('asal_sekolah');
            $table->string('email');
            $table->string('telepon');    
            $table->string('username')->unique();
            $table->string('password');
            $table->string('status');
            $table->string('kelas');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
