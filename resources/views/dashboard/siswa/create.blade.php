@extends('dashboard.layouts.main')




@section('content')


@section('judul')
Page Siswa
@endsection

@section('deskripsi')
Tambah Siswa
@endsection

<div class="row  container-fluid">



    <div class="col-lg-12 m-b30">
        <div class="widget-box">
            <div class="container-fluid">
                <div class="db-breadcrumb">
                    <h4 class="breadcrumb-title">User Profile</h4>
                    <ul class="db-breadcrumb-list">
                        <li><a href="/dashboard"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="/administrator">Siswa</a></li>
                    </ul>
                </div>
                <form class="edit-profile m-b30" enctype="multipart/form-data" method="post" action="/siswa">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Foto Siswa</label>
                                <div class="col-sm-8">
                                    <input type="file" required value="{{ old('foto')}}" name="foto"
                                        class="form-control" id="foto" placeholder="Foto Siswa"
                                        onchange="previewImage()">
                                    <img class="img-preview img-fluid">

                                    @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nama Siswa</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama_siswa" {{ old('nama')}} />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-8">
                                    <input class="form-control" name="tempat_lahir"
                                        placeholder="Tempat Lahir Sesuai KTP" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="date" name="tanggal_lahir"
                                        placeholder="dd/mm/yyyy" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Gender</label>
                                <div class="col-sm-8">
                                    <select name="jenis_kelamin" {{ old('jenis_kelamin')}} class="form-control">
                                        <option>Laki-Laki</option>
                                        <option>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Agama</label>
                                <div class="col-sm-8">
                                    <select class="form-control" {{ old('agama')}} name="agama">
                                        <option>Budha</option>
                                        <option>Hindu</option>
                                        <option>Islam</option>
                                        <option>Kristen</option>
                                        <option>Katolik</option>
                                        <option>Konghucu</option>
                                    </select>
                                </div>
                            </div>
                        </div>

 
                    </div>





                    <hr>
                    <p class="card-description">
                        Address
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input name="email" type="email" class="form-control" {{ old('email')}}>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Telepon</label>
                                <div class="col-sm-8">
                                    <input type="text" name="telepon" {{ old('telepon')}} class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <textarea name="alamat" class="form-control">{{ old('alamat')}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Asal Sekolah</label>
                              <div class="col-sm-8">
                                  <input type="text" name="asal_sekolah" {{ old('asal_sekolah')}} class="form-control" />
                              </div>
                          </div>
                      </div>
                    </div>

                    <hr>
                    <p class="card-description">
                        Akun
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Username</label>
                                <div class="col-sm-8">
                                    <input name="username" class="form-control" {{ old('username')}}>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password" {{ old('password')}} class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>


                    <input name="status" class="form-control" value="Terdaftar">

                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </div>
                </form>
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

        const oFReader = new FileReader();
        oFReader.readAsDataURL(foto.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }

    }
</script>

@endsection