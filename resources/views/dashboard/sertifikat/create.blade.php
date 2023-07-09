@extends('dashboard.layouts.main')




@section('content')


@section('judul')
Page Sertifikat
@endsection

@section('deskripsi')
Tambah Sertifikat
@endsection

<div class="row  container-fluid">



    <div class="col-lg-12 m-b30">
        <div class="widget-box">
            <div class="container-fluid">
                <div class="db-breadcrumb">
                    <h4 class="breadcrumb-title">User Profile</h4>
                    <ul class="db-breadcrumb-list">
                        <li><a href="../../dashboard"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="/sertifikat">Sertifikat</a></li>
                    </ul>
                </div>
                <form class="edit-profile m-b30" method="post" action="/sertifikat" enctype="multipart/form-data">
                    @csrf

                    <div class="row">



                        <div class="col-md-12">


                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="exampleInputPassword1">Siswa</label>
                                <select class="form-control theSelect form-control  js-example-basic-single w-100"
                                    id="select-state" placeholder="Pick a state..." name="siswa_id"
                                    class="form-control">
                                    <option>--Pilih Siswa--</option>
                                    @foreach( $siswa as $siswa)
                                    <option value="{{ $siswa->id }}">{{ $siswa->nama_siswa }}</option>
                                    @endforeach
                                </select>

                            </div>



                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="exampleInputPassword1">File Sertifikat</label>
                                <img class="img-preview img-fluid">
                                <input type="file" required value="{{ old('sertifikat')}}" name="sertifikat"
                                    class="form-control col-md-8" id="sertifikat" placeholder="Foto Sertifikat"
                                    onchange="previewImage()">

                                @error('sertifikat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>






                            <button type="submit" class="btn btn-primary">Tambah Sertifikat</button>
                </form>

            </div>
        </div>
    </div>





    <script>
        function previewImage() {
            const sertifikat = document.querySelector('#sertifikat');
            const imgPreview = document.querySelector('.img-preview')

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(sertifikat.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }
    </script>

    <script>
        $(".theSelect").select2();
    </script>

    @endsection