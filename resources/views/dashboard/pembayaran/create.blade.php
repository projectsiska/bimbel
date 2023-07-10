@extends('dashboard.layouts.main')




@section('content')


@section('judul')
Page Pembayaran
@endsection

@section('deskripsi')
Halaman Tambah Pembayaran
@endsection

<div class="row  container-fluid">


    
    <div class="col-lg-12 m-b30">
        <div class="widget-box">
            <div class="container-fluid">
                <div class="db-breadcrumb">
                    <h4 class="breadcrumb-title">Pembayaran Profile</h4>
                    <ul class="db-breadcrumb-list">
                        <li><a href="/dashboard"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="/">Pembayaran</a></li>
                    </ul>
                </div>	
                <form class="edit-profile m-b30" method="post" action="/pembayaran" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-12">

              
                <div class="form-group row">
                     <label class="col-sm-4 col-form-label" for="inputState">siswa</label>
                    <select name="siswa_id" id="siswa_id" class="form-control col-sm-8" data-live-search="true">
                        <option selected>Pilih siswa</option>
                        @foreach( $siswa as $siswa)
                        <option value="{{$siswa->id}}">{{$siswa->nama_siswa}}</option>
                        @endforeach
                    </select>
                </div>
              
 

                <div class="form-group row">
                     <label class="col-sm-4 col-form-label" for="inputState">Biaya</label>
                    <select name="biaya" id="biaya" class="form-control col-sm-8" data-live-search="true">
                        <option selected>Pilih biaya</option>
                        @foreach( $biaya as $biaya)
                        <option value="{{$biaya->harga}}">{{$biaya->harga}}</option>
                        @endforeach
                    </select>
                </div>

 

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="inputState">Rekening</label>
                   <select name="rekening_id" id="rekening" class="form-control col-sm-8" data-live-search="true">
                       <option selected>Pilih Rekening</option>
                       @foreach( $rekening as $rekening)
                       <option value="{{$rekening->id}}">{{$rekening->bank}}</option>
                       @endforeach
                   </select>
               </div>
 
                <div class="form-group row">
                     <label class="col-sm-4 col-form-label" for="exampleInputPassword1">Upload Bukti Pembayaran</label>
                    <img class="img-preview img-fluid">
                    <input type="file" required value="{{ old('bukti')}}" name="bukti" class="form-control col-sm-8" id="bukti"
                        placeholder="Bukti siswa" onchange="previewImage()">

                    @error('bukti')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
 
                 <div class="form-group row">
                     <label class="col-sm-4 col-form-label" for="inputState">Status</label>
                    <select name="status" id="status" class="form-control col-sm-8" data-live-search="true">
                        <option selected>Pilih Status</option>
                        <option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                        <option value="Terkonfirmasi">Terkonfirmasi</option>
                        <option value="Ditolak">Ditolak</option>
                        
                         
                    </select>
                </div>



                <button type="submit" class="btn btn-primary">Tambah Pembayaran</button>
 
            </div>
        </div>
    </div>




</div>
</div> 
<script src="https://unpkg.com/@develoka/angka-rupiah-js@1.0.1/index.min.js"></script>

<script>
    var e = document.getElementById("biaya");

    function onChange() {
        var value = e.value;
        var text = e.options[e.selectedIndex].text;
        console.log(value, text);
    }
    e.onchange = onChange;
    onChange();


//console.log(biaya.value);
</script>

<script>
    const test = "bababalalbdksfgjsfg";
    const nis = document.querySelector('#nis');
    const periode = document.querySelector('#periode');
    const biaya = document.querySelector('#biaya');
 
    const harga = document.querySelector('#harga');
    const jumlah = document.querySelector('#jumlah');
    const denda = document.querySelector('#denda');


 
      

    biaya.addEventListener('change', function () {
         

        fetch('/biaya/get-biaya/' + biaya.value)
            .then(response => response.json())
            .then(data => {
                
                
                const rupiah = (number)=>{
                return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
                }).format(number);
                 }


                harga.value = data.harga; 
                harga1.value = rupiah(harga.value);

                
 
                total.value = parseInt(harga.value) * parseInt(jumlah.value);
                total1.value = rupiah(parseInt(harga.value) * parseInt(jumlah.value));
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
