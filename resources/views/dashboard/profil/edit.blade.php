@extends('dashboard.layouts.main')

@section('content')


@section('judul')
Page Guru
@endsection

@section('deskripsi')
Halaman Utama
@endsection


<div class="container">
    <br>
    <a type="button" href="/profil" class="btn btn-primary">Back</a>
    <br>
    <br>
    <form method="post" enctype="multipart/form-data" action="/profil/{{$profil->id}}">
        @csrf
        @method('put')

        <div class="row">
            <div class="col-md-12">
 
                 <div class="form-group row">
                    <label class="col-sm-3 col-form-label"for="exampleInputPassword1">Nama profil</label>
                    <input type="text" required value="{{ old('nama',$profil->nama)}}" name="nama" class="form-control col-sm-9"
                        placeholder="Nama profil">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"for="exampleInputPassword1">Email</label>
                    <input type="email" required value="{{ old('email',$profil->email)}}" name="email" class="form-control col-sm-9"
                        id="spp" placeholder="email profil">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"for="exampleInputPassword1">Telepon</label>
                    <input type="text" required value="{{ old('telepon',$profil->telepon)}}" name="telepon" class="form-control col-sm-9"
                         placeholder="No Telepon">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"for="exampleInputPassword1">Deskripsi</label>
                    <textarea type="text" required name="deskripsi" class="form-control col-sm-9"  placeholder="Deskripsi Profil">{{ old('deskripsi',$profil->deskripsi)}}</textarea>
                </div>
               

            </div>


            <div class="col-md-12">


              
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"for="exampleInputPassword1">Upload Foto Profil</label>
                   <input type="hidden" name="oldImage" value="{{ $profil->foto }}" class="col-sm-9 form-control">
                    @if($profil->foto)
                    <img src="{{ asset('storage/' . $profil->foto) }}" class="img-preview img-fluid">
                   {{ $profil->foto }}
                    @else
                    <img class="img-preview img-fluid">
                    @endif
                    <img class="img-preview img-fluid">
                    <input type="file"  value="{{ old('foto')}}" name="foto" class="col-sm-9 form-control" id="foto"
                        placeholder="foto profil" onchange="previewImage()">

                    @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit"  class="btn btn-primary">Update Profil</button>


                
    </form>

</div>
</div>
</div>

  
@endsection
