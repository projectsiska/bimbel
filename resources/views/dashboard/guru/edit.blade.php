@extends('dashboard.layouts.main')




@section('content')


@section('judul')
Page Guru
@endsection

@section('deskripsi')
Tambah Guru
@endsection    

<div class="row">
    <div class="col-md-12 grid-margin stretch-card"> 
        <div class="card">
          <div class="card-body">
            <a type="button" href="/guru" class="btn btn-primary">Back</a>
            <br>
            <br>

            <form method="post" enctype="multipart/form-data" action="/guru/{{$guru->id}}">
              @csrf
              @method('put')
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Foto Guru</label>
                    <input type="hidden" name="oldImage" value="{{ $guru->foto }}">
                    @if($guru->foto)
                    <img src="{{ asset('storage/' . $guru->foto) }}" style="height:300px" class="img-preview img-fluid">

                    @else
                    <img class="img-preview img-fluid">
                    @endif
                    <img class="img-preview img-fluid">
                    <input type="file" value="{{ old('foto')}}" name="foto"class="form-control col-md-8"
                        id="foto" placeholder="Foto Bank" onchange="previewImage()">

                    @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nama Guru</label>
                    <div class="col-sm-8">
                      <input type="text" value="{{$guru->nama}}" class="form-control @error('nama') is->invalid @enderror" name="nama" {{ old('nama')}} />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
               
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-8">
                      <input class="form-control" name="tempat_lahir" value="{{$guru->tempat_lahir}}" class="form-control @error('tempat_lahir') is->invalid @enderror" placeholder="Tempat Lahir Sesuai KTP"/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-8">
                      <input value="{{$guru->tanggal_lahir}}" class="form-control @error('tanggal_lahir') is->invalid @enderror" type="date" name="tanggal_lahir" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Gender</label>
                    <div class="col-sm-8">
                      <select name="jenis_kelamin" style="color:black" class="form-control">
                        <option value="{{$guru->jenis_kelamin}}" selected>--{{$guru->jenis_kelamin}}--</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                  </div>
                </div>
              
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Agama</label>
                    <div class="col-sm-8">
                      <select class="form-control" style="color:black" class="form-control @error('agama') is->invalid @enderror" name="agama">
                        <option  value="{{ $guru->agama }}" selected>--{{$guru->agama}}--</option>
                        <option value="Budha">Budha</option>
                        <option value="Hindu">Hindu</option>
                        <option Value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Konghucu">Konghucu</option>
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
                      <input name="email" type="email" value="{{$guru->email}}" class="form-control @error('email') is->invalid @enderror">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Telepon</label>
                    <div class="col-sm-8">
                      <input type="text" name="telepon" value="{{$guru->telepon}}" class="form-control @error('telepon') is->invalid @enderror" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Alamat</label>
                  <div class="col-sm-8">
                    <textarea name="alamat" value="{{$guru->alamat}}" class="form-control @error('alamat') is->invalid @enderror">{{$guru->alamat}}</textarea>
                  </div>
                </div>
              </div>
              </div>

              <hr>
              <p class="card-description">
                Pendidikan
              </p>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Pendidikan Terakhir</label>
                    <div class="col-sm-8">
                      <input type="text" name="pendidikan_terakhir"  value="{{$guru->pendidikan_terakhir}}" class="form-control @error('pendidikan_terakhir') is->invalid @enderror" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Jurusan</label>
                    <div class="col-sm-8">
                      <input type="text" name="jurusan" value="{{$guru->jurusan}}" class="form-control @error('password') is->invalid @enderror" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Tahun Lulus</label>
                    <div class="col-sm-8">
                      <input type="text"  value="{{$guru->tahun}}" name="tahun" class="form-control @error('tahun') is->invalid @enderror" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Universitas</label>
                    <div class="col-sm-8">
                      <input type="text" value="{{$guru->univ}}" name="univ" class="form-control @error('univ') is->invalid @enderror" />
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
                      <input name="username" value="{{$guru->user->username}}"
                      class="form-control  @error('username') is->invalid @enderror">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-8">
                      <input type="password" name="password"  value="{{$guru->user->password}}" 
                      class="form-control @error('password') is->invalid @enderror" />
                    </div>
                  </div>
                </div>
              </div>

             
              
             
           
              <button type="submit" class="btn btn-primary mr-2">Update</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>


    <Script>
          function previewImage() {
            const foto = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview')

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(foto.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
      </script>


@endsection