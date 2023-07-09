@extends('layouts.main')



@section('judul')
Pembayaran
@endsection


@section('content')

<div class="page-content bg-white">
    <!-- inner page banner -->
    @include('layouts.banner')
    <!-- Breadcrumb row END -->

    <!-- inner page banner -->
    <div class="page-banner contact-page">
        <div class="container-fuild">
            <div class="row m-lr0">
                <div class="col-lg-6 col-md-6 p-lr0 d-flex">
                    <img src="{{ asset('storage/foto/bayar.jpg') }}">
                </div>
                <div class="col-lg-6 col-md-6 section-sp2 p-lr30">
                    <form class="contact-bx ajax-form" method="post" action="/bayarsiswa" enctype="multipart/form-data">
                        @csrf
                    <div class="ajax-message"></div>
                        <div class="heading-bx left p-r15">
                            <h2 class="title-head">Form <span>Pembayaran</span></h2>
                            <p>Silahkan Lakukan Pembayaran untuk Mendapatkan Akses Kelas</p>
                        </div>
                        <div class="row placeani">
                            <div class="col-lg-6 ">
                                <div class="form-group">
                                    <label>Your Name</label>
                                    <div class="input-group">
                                        <input name="nama" value="{{ auth()->user()->nama }}" type="readonly" readonly class="form-control valid-character">
                                        <input name="siswa_id" hidden value="{{ auth()->user()->siswa->id }}" type="readonly" readonly class="form-control valid-character">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Pilih Rekening</label>
                                    <div class="input-group"> 
                                        <select id="rekening_id" name="rekening_id" data-live-search="true" ID="biaya" class="form-control"
                                        required>
                                        <option value="" selected hidden>Pilih Rekening Pembayaran</option>
                                        @foreach($rekening as $posta)
                                        <option value="{{ $posta->id }}">{{ $posta->bank }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Total Biaya</label>
                                    <div class="input-group">
                                        <input type="text" value="@foreach($biaya as $biayaa)@currency($biayaa->harga)@endforeach" class="form-control int-value">
                                        <input name="biaya" hidden value="
                                        @foreach($biaya as $a) 
                                        {{ $a->harga }} 
                                        @endforeach
                                        " required="" class="form-control int-value">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Bukti Pembayaran</label>
                                    <div class="input-group">
                                        <img class="img-preview img-fluid">
                    <input type="file" required value="{{ old('bukti')}}" name="bukti" class="form-control col-sm-8" id="bukti"
                        placeholder="Bukti siswa" onchange="previewImage()">

                    @error('bukti')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                    <i style="color:red">*Batas Upload File Maximal 2Mb</i>
                                    </div>
                                </div>
                            </div>
                             
                            
                            <div class="col-lg-12">
                                <button name="submit" type="submit" value="Submit" class="btn button-md"> Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
<script>
    function previewImage() {
        const foto = document.querySelector('#bukti');
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(foto.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }

    }
</script>

    <!-- inner page banner END -->
</div>


@endsection