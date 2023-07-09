@extends('dashboard.layouts.main')




@section('content')


@section('judul')
Page Guru
@endsection

@section('deskripsi')
Detail Guru
@endsection

<div class="row">


    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <a type="button" href="/guru" class="btn btn-primary">Back</a>
                <Br>
                <Br>
                <form class="form-sample" enctype="multipart/form-data" method="post" action="/guru">
                    @csrf

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Foto Guru:</label>
                                <div class="col-sm-8 col-form-label">
                                    <img class="img-preview img-fluid col-sm-10"
                                        src="{{ asset('storage/' . $guru->foto) }}" style="width:200px; height:200px">

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
                                <label class="col-sm-4 col-form-label">Nama Guru</label>
                                <div class="col-sm-8 col-form-label">
                                    : {{$guru->nama}}
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-8 col-form-label">
                                    : {{$guru->tempat_lahir}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-8 col-form-label">
                                    : {{ \Carbon\Carbon::parse($guru->tanggal_lahir)->format('d F Y')}}

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Gender</label>
                                <div class="col-sm-8 col-form-label">
                                    : {{$guru->jenis_kelamin}}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Agama</label>
                                <div class="col-sm-8 col-form-label">
                                    : {{$guru->agama}}
                                </div>
                            </div>
                        </div>



                    </div>


                    <div class="">
                        <div class="row form-group">

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
                                <div class="col-sm-8 col-form-label">
                                    : {{$guru->email}} </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Telepon</label>
                                <div class="col-sm-8 col-form-label">
                                    : {{$guru->telepon}} </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-8 col-form-label">
                                    : {{$guru->alamat}} </div>
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
                                <div class="col-sm-8 col-form-label">
                                    : {{$guru->pendidikan_terakhir}} </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Jurusan</label>
                                <div class="col-sm-8 col-form-label">
                                    : {{$guru->jurusan}} </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tahun Lulus</label>
                                <div class="col-sm-8 col-form-label">
                                    : {{$guru->tahun}} </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Universitas</label>
                                <div class="col-sm-8 col-form-label">
                                    : {{$guru->univ}} </div>
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
                                <div class="col-sm-8 col-form-label">
                                    : {{$guru->user->username}} </div>
                            </div>
                        </div>

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