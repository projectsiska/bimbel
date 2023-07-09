@extends('dashboard.layouts.main')




@section('content')


@section('judul')
Page Siswa
@endsection

@section('deskripsi')
Detail Siswa
@endsection

<div class="row">


    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <a type="button" href="/siswa" class="btn btn-primary">Back</a>
                <Br>
                <Br>
                <form class="form-sample" enctype="multipart/form-data" method="post" action="/siswa">
                    @csrf

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Foto siswa:</label>
                                <div class="col-sm-8 col-form-label">
                                    <img class="img-preview img-fluid col-sm-10"
                                        src="{{ asset('storage/' . $siswa->foto) }}" style="width:200px; height:200px">

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
                                <label class="col-sm-4 col-form-label">Nama siswa</label>
                                <div class="col-sm-8 col-form-label">
                                    : {{$siswa->nama_siswa}}
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-8 col-form-label">
                                    : {{$siswa->tempat_lahir}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-8 col-form-label">
                                    : {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d F Y')}}

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Gender</label>
                                <div class="col-sm-8 col-form-label">
                                    : {{$siswa->jenis_kelamin}}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Agama</label>
                                <div class="col-sm-8 col-form-label">
                                    : {{$siswa->agama}}
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
                                    : {{$siswa->email}} </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Telepon</label>
                                <div class="col-sm-8 col-form-label">
                                    : {{$siswa->telepon}} </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-8 col-form-label">
                                    : {{$siswa->alamat}} </div>
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
                                <label class="col-sm-4 col-form-label">Asal Sekolah </label>
                                <div class="col-sm-8 col-form-label">
                                    : {{$siswa->asal_sekolah}} </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Status</label>
                                <div class="col-sm-8 col-form-label">
                                    : {{$siswa->status}} </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Kelas</label>
                                <div class="col-sm-8 col-form-label">
                                    : {{$siswa->kelas}} </div>
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
                                    : {{$siswa->user->username}} </div>
                            </div>
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