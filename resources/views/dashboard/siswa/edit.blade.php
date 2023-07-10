@extends('dashboard.layouts.main')




@section('content')


@section('judul')
Page Siswa
@endsection

@section('deskripsi')
Tambah Siswa
@endsection    

<div class="row">
    <div class="col-md-12 grid-margin stretch-card"> 
        <div class="card">
          <div class="card-body">
            <a type="button" href="/siswa" class="btn btn-primary">Back</a>
            <br>
            <br>

            <form method="post" enctype="multipart/form-data" action="/siswa/{{$siswa->id}}">
              @csrf
              @method('put')
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Upload Foto siswa</label>
                    <input type="hidden" name="oldImage" value="{{ $siswa->foto }}">
                    @if($siswa->foto)
                    <img src="{{ asset('storage/' . $siswa->foto) }}" style="height:300px" class="img-preview img-fluid">

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
                    <label class="col-sm-3 col-form-label">Nama siswa</label>
                    <div class="col-sm-9">
                      <input type="text" value="{{$siswa->nama_siswa}}" class="form-control @error('nama_siswa') is->invalid @enderror" name="nama_siswa" {{ old('nama_siswa')}} />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
               
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-9">
                      <input class="form-control" name="tempat_lahir" value="{{$siswa->tempat_lahir}}" class="form-control @error('tempat_lahir') is->invalid @enderror" placeholder="Tempat Lahir Sesuai KTP"/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-9">
                      <input value="{{$siswa->tanggal_lahir}}" class="form-control @error('tanggal_lahir') is->invalid @enderror" type="date" name="tanggal_lahir" placeholder="dd/mm/yyyy"/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Gender</label>
                    <div class="col-sm-9">
                      <select name="jenis_kelamin" style="color:black" class="form-control">
                        <option value="{{$siswa->jenis_kelamin}}" selected>--{{$siswa->jenis_kelamin}}--</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                  </div>
                </div>
              
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Agama</label>
                    <div class="col-sm-9">
                      <select class="form-control" style="color:black" class="form-control @error('agama') is->invalid @enderror" name="agama">
                        <option  value="{{ $siswa->agama }}" selected>--{{$siswa->agama}}--</option>
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
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input name="email" type="email" value="{{$siswa->email}}" class="form-control @error('email') is->invalid @enderror">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Telepon</label>
                    <div class="col-sm-9">
                      <input type="text" name="telepon" value="{{$siswa->telepon}}" class="form-control @error('telepon') is->invalid @enderror" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Alamat</label>
                  <div class="col-sm-9">
                    <textarea name="alamat" value="{{$siswa->alamat}}" class="form-control @error('alamat') is->invalid @enderror">{{$siswa->alamat}}</textarea>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Asal Sekolah</label>
                  <div class="col-sm-9">
                    <input type="text" name="asal_sekolah"  value="{{$siswa->asal_sekolah}}" class="form-control @error('asal_sekolah') is->invalid @enderror" />
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
                    <label class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-9">
                      <input name="username" value="{{$siswa->user->username}}"
                      class="form-control  @error('username') is->invalid @enderror">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                      <input type="password" name="password"  value="{{$siswa->user->password}}" 
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