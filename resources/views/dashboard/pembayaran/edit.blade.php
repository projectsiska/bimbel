@extends('dashboard.layouts.main')




@section('content')


@section('judul')
Page Pembayaran
@endsection

@section('deskripsi')
Halaman Edit Pembayaran
@endsection

<div class="row  container-fluid">



    <div class="col-lg-12 m-b30">
        <div class="widget-box">
            <div class="container-fluid">
                <div class="db-breadcrumb">
                    <h4 class="breadcrumb-title">Pembayaran Profile</h4>
                    <ul class="db-breadcrumb-list">
                        <li><a href="/dashboard"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="/pembayaran">Pembayaran</a></li>
                    </ul>
                </div>
                <form class="edit-profile m-b30" method="post" enctype="multipart/form-data"
                    action="/pembayaran/{{$pembayaran->id}}">
                    @csrf
                    @method('put')

                    <div class="row">
                        <div class="col-md-12">


                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="inputState">siswa</label>
                                <select name="siswa_id" id="siswa_id" class="form-control col-sm-8"
                                    data-live-search="true">
                                    <option value="{{$pembayaran->siswa_id}}" selected>
                                        --{{ $pembayaran->siswa->nama_siswa }}--</option>
                                    @foreach( $siswa as $siswa)
                                    <option value="{{$siswa->id}}">{{$siswa->nama_siswa}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="inputState">Biaya</label>
                                <select name="biaya" id="biaya" class="form-control col-sm-8" data-live-search="true">
                                    <option value="{{$pembayaran->biaya}}">--{{$pembayaran->biaya}}--</option>
                                    @foreach( $biaya as $biaya)
                                    <option value="{{$biaya->harga}}">{{$biaya->harga}}</option>
                                    @endforeach
                                </select>

                            </div>


                            <div class="form-group row row">
                                <label class="col-sm-4 col-form-label" for="inputState">Rekening</label>
                                <select name="rekening_id" id="rekening" class="form-control col-sm-8"
                                    data-live-search="true">
                                    <option value="{{ $pembayaran->rekening_id }}" selected>--{{ $pembayaran->rekening->bank }}--</option>
                                    @foreach( $rekening as $rekening)
                                    <option value="{{$rekening->id}}">{{$rekening->bank}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row row">
                                <label class="col-sm-4 col-form-label">Bukti Pembayaran</label>
                                <input type="hidden" name="oldImage" value="{{ $pembayaran->bukti }}">
                                @if($pembayaran->bukti)
                                <a href="{{ asset('storage/' . $pembayaran->bukti) }}" target="_blank"> <img src="{{ asset('storage/' . $pembayaran->bukti) }}" style="width:300px"
                                    class="img-preview img-fluid col-sm-8"  > </a>

                                @else
                                <img class=" img-preview img-fluid" class="form-control col-sm-8">
                                @endif
                                <img class="img-preview img-fluid col-sm-8">
                                <input type="file" hidden value="{{ old('bukti')}}" name="bukti" class="form-control col-md-8"
                                    id="bukti" placeholder="Foto Bank" onchange="previewImage()" @if($pembayaran->status=="Menunggu") hidden @endif>

                                @error('bukti')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group row row">
                                <label class="col-sm-4 col-form-label">Kelas</label>
                                <select name="kelas" class="form-control js-example-basic-single w-100">
                                    <option >--Pilih Kelas--</option>
                                    @foreach( $kelas as $kelas)
                                    <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }} / {{ $kelas->guru->nama }}</option>
                                    @endforeach
                                  </select>          
                            </div>

                            <div class="form-group row row">

                            <label class="col-sm-4 col-form-label">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio1"
                                    value="Konfirmasi">
                                <label class="col-form-label" for="inlineRadio1">Konfirmasi</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio2"
                                    value="Tolak">
                                <label class="col-form-label" for="inlineRadio2">Tolak</label>
                            </div>
                            </div>

                        </div>

                      


                        
                        <div class="form-group row col-md-12">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6" style="text-align:right">

                                @if($pembayaran->status=="Menunggu") 


                                <button type="submit" class="btn btn-primary"> Konfirmasi </button> 
                                @else 
                                <button type="submit" class="btn btn-primary"> Update </button>
                                @endif

                            </div>

                        </div>


                </form>

            </div>
        </div>
    </div>


    <script>
        var e = document.getElementById("nis");

        function onChange() {
            var value = e.value;
            var text = e.options[e.selectedIndex].text;
            console.log(value, text);
        }
        e.onchange = onChange;
        onChange();
    </script>



    <script>
        const nis = document.querySelector('#nis');
        const periode = document.querySelector('#periode');
        const biaya_id = document.querySelector('#biaya_id');

        const slug = document.querySelector('#slug');
        const harga = document.querySelector('#harga');
        const lainnya = document.querySelector('#lainnya');
        const denda = document.querySelector('#denda');

        function changeSlug() {
            slug.value = `${nis.value}-${periode.value}-${biaya_id.value}`;
        }

        nis.addEventListener('change', function () {
            fetch('/siswa/checkSlug?nis=' + nis.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        nis.addEventListener('change', function () {
            changeSlug();
        });


        periode.addEventListener('change', function () {
            changeSlug();
        });


        biaya_id.addEventListener('change', function () {
            changeSlug();

            fetch('/biaya_id/get-biaya_id/' + biaya_id.value)
                .then(response => response.json())
                .then(data => {
                    harga.value = data.harga.replace(/\./, '');
                    lainnya.value = data.uang_lainnya.replace(/\./, '');
                    denda.value = data.denda.replace(/\./, '');
                    total.value = parseInt(harga.value) + parseInt(lainnya.value) + parseInt(denda.value);
                });



        });


        function previewImage() {
            const bukti = document.querySelector('#bukti');
            const imgPreview = document.querySelector('.img-preview')

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(bukti.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }
    </script>
    @endsection