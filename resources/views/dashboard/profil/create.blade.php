@extends('dashboard.layouts.main')



@section('judul')
Tambah Menu
@endsection


@section('container')


<div class="container">
    <br>
    <a type="button" href="/galery" class="btn btn-primary">Back</a>
    <br>
    <br>
    <form method="post" action="/galery" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-5">

                <input value="{{ $aa = auth()->user()->level }}" hidden>
                <div class="form-group">
                    <label for="inputState">Nama Menu</label>
                    <input name="nama_menu" value="{{ old('nama_menu')}}" placeholder="Nama galery" id="nama_menu" class="form-control" >

                </div>

                <div class="form-group">
                    <label for="inputState">Harga</label>

                    <input name="harga" value="{{ old('harga')}}" id="harga" placeholder="Harga" class="form-control">

                </div>

                







                <div class="form-group">
                    <label for="exampleInputPassword1">Keterangan</label>
                    <textarea type="textarea" required value="{{ old('keterangan')}}" name="keterangan"
                        class="form-control" id="keterangan" placeholder="Total"></textarea>
                </div>

                


                @error('slug') <div class="invalid-feedback">
                    error nich
                @enderror

            </div>
            

        <div class="col-md-5">

        <div class="form-group">
                    <label for="exampleInputPassword1">Foto galery</label>
                    <img class="img-preview img-fluid">
                    <input type="file" required value="{{ old('foto')}}" name="foto" class="form-control" id="foto"
                        placeholder="foto siswa" onchange="previewImage()">

                    @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
        <button type="submit" class="btn btn-primary">Tambah galery</button>

        </div>

            
    </form>

</div>
</div>
</div>


<script>
    var e = document.getElementById("nama_menu");

    function onChange() {
        var value = e.value;
        var text = e.options[e.selectedIndex].text;
        console.log(value, text);
    }
    e.onchange = onChange;
    onChange();


    
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



<script>
    const test = "bababalalbdksfgjsfg";
    const nama_menu = document.querySelector('#nama_menu');
    const slug = document.querySelector('#slug');



    function changeSlug() {
        slug.value = `${nama_menu.value}-${periode.value}-${ketentuan.value}`;
    }

    nama_menu.addEventListener('change', function () {
        fetch('/siswa/checkSlug?nama_menu=' + nama_menu.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

    nama_menu.addEventListener('change', function () {
        changeSlug();
    });



</script>
@endsection
