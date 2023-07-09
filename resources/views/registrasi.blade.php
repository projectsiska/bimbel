@extends('layouts.main')



@section('judul')

@endsection


@section('content')
<br>
<br>
<br>
<div class="page-content bg-white content-block">
    <div class="section-area section-sp1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="row g-0">
                    <div class="col-lg-12">


                        <div class="heading-bx left">
                            <h2 class="m-b10 title-head">Daftar <span> Sekarang</span></h2>
                        </div>
                        </div>


                        
                        <div class="col-lg-12 d-flex align-items-center reservation-form-bg">
                            <form class="email-form" data-aos="fade-up"  enctype="multipart/form-data" data-aos-delay="100" method="post"
                                action="/register" style="padding: 40px">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6" style="margin-bottom:20px">
                                        <label for="exampleInputPassword1">Nama</label>
                                        <Br>
                                        <input type="text" name="nama_siswa" class="form-control" required id="name"
                                            placeholder="Your Name" data-rule="minlen:4"
                                            data-msg="Please enter at least 4 chars">

                                    </div>



                                    <div class="col-lg-6 col-md-6" style="margin-bottom:20px">
                                        <label for="exampleInputPassword1">Jenis Kelamin</label>
                                        <Br>
                                        <select name="jenis_kelamin" {{ old('jenis_kelamin')}} class="form-control" required>
                                            <option>--Pilih--</option>
                                            <option>Laki-Laki</option>
                                            <option>Perempuan</option>
                                        </select>

                                    </div>


                                    <div class="col-lg-6 col-md-6" style="margin-bottom:20px">
                                        <label for="exampleInputPassword1">Tempat Lahir</label>
                                        <Br>
                                        <input type="text" class="form-control" required name="tempat_lahir" id="tempat_lahir"
                                            placeholder="Tempat Lahir">

                                    </div>


                                    <div class="col-lg-6 col-md-6" style="margin-bottom:20px">
                                        <label for="exampleInputPassword1">Tanggal Lahir</label>
                                        <Br>
                                        <input type="date" class="form-control" required name="tanggal_lahir" id="tanggal_lahir"
                                            placeholder="Tanggal Lahir">

                                    </div>




                                    <div class="col-lg-6 col-md-6" style="margin-bottom:20px">
                                        <label for="exampleInputPassword1">Jenis Kelamin</label>
                                        <Br>
                                        <select class="form-control" required {{ old('agama')}} name="agama">
                                            <option>Budha</option>
                                            <option>Hindu</option>
                                            <option>Islam</option>
                                            <option>Kristen</option>
                                            <option>Katolik</option>
                                            <option>Konghucu</option>
                                        </select>

                                    </div>



                                    <div class="col-lg-6 col-md-6" style="margin-bottom:20px">
                                        <label for="exampleInputPassword1">Email</label>
                                        <Br>
                                        <input type="email" class="form-control" required name="email" id="email"
                                            placeholder="Your Email" data-rule="email"
                                            data-msg="Please enter a valid email">

                                    </div>
                                    <div class="col-lg-6 col-md-6" style="margin-bottom:20px">
                                        <label for="exampleInputPassword1">Whats'app</label>
                                        <Br>
                                        <input type="text" class="form-control" required name="telepon" id="phone"
                                            placeholder="Your Phone" data-rule="minlen:4"
                                            data-msg="Please enter at least 4 chars">

                                    </div>
                                    <div class="col-lg-6 col-md-6" style="margin-bottom:20px">
                                        <label for="exampleInputPassword1">Asal Sekolah</label>
                                        <Br>
                                        <input type="text" class="form-control" required name="asal_sekolah" id="asal_sekolah"
                                            placeholder="Tempat Lahir">

                                    </div>

                                    <div class="col-lg-6 col-md-6" style="margin-bottom:20px">
                                        <label for="exampleInputPassword1">Alamat</label>
                                        <Br>
                                        <textarea class="form-control" required name="alamat" rows="5"
                                            placeholder="Alamat"></textarea>

                                    </div>
                                    <div class="col-lg-6 col-md-6" style="margin-bottom:20px">
                                        <label for="exampleInputPassword1">Foto</label>

                                        <input type="file" value="{{ old('foto')}}" name="foto"
                                        class="form-control" required id="foto" placeholder="foto guru"
                                        onchange="previewImage()">
                                        <img class="img-preview img-fluid">
        
                                        @error('foto')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>



                                    <div class="col-lg-6 col-md-6" style="margin-bottom:20px">
                                        <label for="exampleInputPassword1">Username</label>
                                        <Br>
                                        <input type="text" name="username" class="form-control" required id="username"
                                            placeholder="Username" data-rule="minlen:4"
                                            data-msg="Please enter at least 4 chars">

                                    </div>
                                    <div class="col-lg-6 col-md-6" style="margin-bottom:20px">
                                        <label for="exampleInputPassword1">Password</label>
                                        <Br>
                                        <input type="password" class="form-control" required name="password" id="time"
                                            placeholder="Password" data-rule="minlen:4"
                                            data-msg="Please enter at least 4 chars">

                                    </div>

                                </div>

                                <Br>
                                <div class="text-center"><button type="submit" class="btn button-md">Registrasi</button>
                                </div>
                            </form>
                        </div> 

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage() {
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display = 'block';
        imgPreview.style.width = '200px';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(foto.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }

    }
</script>

@endsection