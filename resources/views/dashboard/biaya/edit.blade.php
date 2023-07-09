@extends('dashboard.layouts.main')



@section('judul')
Konfirmasi Data biaya
@endsection


@section('container')


<div class="container">
    <br>
    <a type="button" href="/biaya" class="btn btn-primary">Back</a>
    <br>
    <br>
    <form method="post" enctype="multipart/form-data" action="/biaya/{{$biaya->id}}">
        @csrf
        @method('put')

        <div class="row">
            <div class="col-md-5">
 
                 <div class="form-group">
                    <label for="exampleInputPassword1">Nama biaya</label>
                    <input type="text" required value="{{ old('nama_biaya',$biaya->nama_biaya)}}" name="nama_biaya" class="form-control"
                        id="spp" placeholder="Nama biaya">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Harga</label>
                    <input type="text" required value="{{ old('harga',$biaya->harga)}}" name="harga" class="form-control"
                        id="spp" placeholder="Harga biaya">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Keterangan</label>
                    <textarea type="text" required name="keterangan" class="form-control"  placeholder="Keterangan biaya">{{ old('keterangan',$biaya->keterangan)}}</textarea>
                </div>
               

            </div>


            <div class="col-md-7">


              
                <div class="form-group">
                    <label for="exampleInputPassword1">Upload foto biaya</label>
                   <input type="hidden" name="oldImage" value="{{ $biaya->foto }}">
                    @if($biaya->foto)
                    <img src="{{ asset('storage/' . $biaya->foto) }}" class="img-preview img-fluid">
                   {{ $biaya->foto }}
                    @else
                    <img class="img-preview img-fluid">
                    @endif
                    <img class="img-preview img-fluid">
                    <input type="file"  value="{{ old('foto')}}" name="foto" class="form-control" id="foto"
                        placeholder="foto siswa" onchange="previewImage()">

                    @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit"  class="btn btn-primary">Update Pembayaran</button>


                
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
                denda.value = data.denda.replace(/\./, '');
                total.value = parseInt(spp.value) + parseInt(lainnya.value) + parseInt(denda.value);
            });



    });


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
