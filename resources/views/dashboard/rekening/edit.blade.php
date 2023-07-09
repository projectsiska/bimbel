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
                <form method="post" enctype="multipart/form-data" action="/rekening/{{$rekening->id}}">
                    @csrf
                    @method('put')

                    <div class="row">

                        <div class="col-md-12">


                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Bank</label>
                                <input type="text" required value="{{ old('bank',$rekening->bank)}}" name="bank"
                                   class="form-control col-md-8" id="bank" placeholder="Nama Bank">
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Atas Nama</label>
                                <input type="text" required value="{{ old('atas_nama',$rekening->atas_nama)}}"
                                    name="atas_nama"class="form-control col-md-8" id="atas_nama" placeholder="Atas Nama">
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Rekening</label>

                                <input type="text" required value="{{ old('rekening',$rekening->rekening)}}"
                                    name="rekening" class="form-control col-md-8 @error('image') is-incalid @enderror"
                                    id="rekening" placeholder="Nomor Rekening">

                            </div>


                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Foto Bank</label>
                                <input type="hidden" name="oldImage" value="{{ $rekening->foto_bank }}">
                                @if($rekening->foto_bank)
                                <img src="{{ asset('storage/' . $rekening->foto_bank) }}" style="height:300px" class="img-preview img-fluid">

                                @else
                                <img class="img-preview img-fluid">
                                @endif
                                <img class="img-preview img-fluid">
                                <input type="file" value="{{ old('foto_bank')}}" name="foto_bank"class="form-control col-md-8"
                                    id="foto_bank" placeholder="Foto Bank" onchange="previewImage()">

                                @error('foto_bank')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>



                            <input type="text" hidden name="id" value="{{ old('id',$rekening->id)}}" readonly required
                                class="form-control @error('id') is->invalid @enderror" id="id" placeholder="id">



                            @error('id')
                            <div class="invalid-feedback">
                                error nich
                            </div>
                            @enderror


                            <button type="submit" class="btn btn-primary">Edit Bank</button>

                </form>

            </div>
        </div>
    </div>


    <script>
       


        function previewImage() {
            const foto_bank = document.querySelector('#foto_bank');
            const imgPreview = document.querySelector('.img-preview')

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(foto_bank.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }
    </script>
    @endsection