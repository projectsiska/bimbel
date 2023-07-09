@extends('dashboard.layouts.main')




@section('content')


@section('judul')
Page Guru
@endsection

@section('deskripsi')
Tambah Guru
@endsection

<div class="row  container-fluid">


    
    <div class="col-lg-12 m-b30">
        <div class="widget-box">
            <div class="container-fluid">
                <div class="db-breadcrumb">
                    <h4 class="breadcrumb-title">User Profile</h4>
                    <ul class="db-breadcrumb-list">
                        <li><a href="/dashboard"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="/rekening">Rekening</a></li>
                    </ul>
                </div>	
                <form class="edit-profile m-b30" method="post" action="/rekening" enctype="multipart/form-data">
        @csrf

        <div class="row">
            


            <div class="col-md-12">


                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="exampleInputPassword1">Nama Bank</label>
                    <input type="text" required value="{{ old('bank')}}" name="bank"class="form-control col-md-8" id="bank"
                        placeholder="Nama Bank">

                        
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="exampleInputPassword1">Nama Pimpinan</label>
                    <input type="text" required value="{{ old('atas_nama')}}" name="atas_nama"class="form-control col-md-8"
                        id="atas_nama" placeholder="Atas Nama">
                </div>
                 
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="exampleInputPassword1">Rekening</label>
                    <input type="text" required value="{{ old('rekening')}}" name="rekening"class="form-control col-md-8" id="rekening"
                        placeholder="Rekening">
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="exampleInputPassword1">Foto Bank</label>
                    <img class="img-preview img-fluid">
                    <input type="file" required value="{{ old('foto_bank')}}" name="foto_bank"class="form-control col-md-8" id="foto_bank"
                        placeholder="Foto Bank" onchange="previewImage()">

                    @error('foto_bank')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                 



                <button type="submit" class="btn btn-primary">Tambah rekening</button>
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
    const test = "bababalalbdksfgjsfg";
    const nis = document.querySelector('#nis');
    const periode = document.querySelector('#periode');
    const ketentuan = document.querySelector('#ketentuan');

    const slug = document.querySelector('#slug');
    const spp = document.querySelector('#spp');
    const lainnya = document.querySelector('#lainnya');
    const denda = document.querySelector('#denda');



    function changeSlug() {
        slug.value = `${nis.value}-${periode.value}-${ketentuan.value}`;
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

    ketentuan.addEventListener('change', function () {
        changeSlug();

        fetch('/ketentuan/get-ketentuan/' + ketentuan.value)
            .then(response => response.json())
            .then(data => {
                spp.value = data.spp.replace(/\./, '');
                lainnya.value = data.uang_lainnya.replace(/\./, '');

                if(new Date() > new Date(periode.selectedOptions[0].label)) {

                    denda.value = data.denda.replace(/\./, '');
                } else {
                    denda.value = 0;
                }

                total.value = parseInt(spp.value) + parseInt(lainnya.value) + parseInt(denda.value);
            });
    });

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
