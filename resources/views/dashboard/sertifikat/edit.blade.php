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
                <form method="post" enctype="multipart/form-data" action="/sertifikat/{{$sertifikat->id}}">
                    @csrf
                    @method('put')

                    <div class="row">

                        <div class="col-md-12">


                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="inputState">siswa</label>
                                <select name="siswa_id" id="siswa_id" class="form-control col-sm-8"
                                    data-live-search="true">
                                    <option value="{{$sertifikat->siswa_id}}" selected>
                                        --{{ $sertifikat->siswa->nama_siswa }}--</option>
                                    @foreach( $siswa as $siswas)
                                    <option value="{{$siswas->id}}">{{$siswas->nama_siswa}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Sertifikat</label>
                                <input type="hidden" name="oldImage" value="{{ $sertifikat->sertifikat }}">
                                @if($sertifikat->sertifikat)
                                <img src="{{ asset('storage/' . $sertifikat->sertifikat) }}" style="height:300px" class="img-preview img-fluid">

                                @else
                                <img class="img-preview img-fluid">
                                @endif
                                <img class="img-preview img-fluid">
                                <input type="file" value="{{ old('sertifikat')}}" name="sertifikat"class="form-control col-md-8"
                                    id="sertifikat" placeholder="Foto Bank" onchange="previewImage()">

                                @error('sertifikat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>



                            <input type="text" hidden name="id" value="{{ old('id',$sertifikat->id)}}" readonly required
                                class="form-control @error('id') is->invalid @enderror" id="id" placeholder="id">



                            @error('id')
                            <div class="invalid-feedback">
                                error nich
                            </div>
                            @enderror


                            <button type="submit" class="btn btn-primary">Edit Sertifikat</button>

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
    @endsection