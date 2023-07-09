@extends('dashboard.layouts.main')

@section('content')

@section('judul')
Page Nilai
@endsection

@section('deskripsi')
Tambah Nilai
@endsection


<div class="container">
    <br>
    <a type="button" href="/nilai" class="btn btn-primary">Back</a>
    <br>
    <br>
    <form method="post" action="/nilai" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6">

                 <div class="form-group">
                    <label for="inputState">Nama Nilai</label>
                    <input name="judul" value="{{ old('judul')}}" placeholder="Nama Nilai" id="judul"
                        class="form-control">

                </div>

 
                @if(auth()->user()->level == "Guru")
                
                <input name="kelas_id" hidden value="{{ auth()->user()->guru->kelas->id }}">

                @else
                <div class="form-group"> 
                    <label for="exampleInputPassword1">Kelas</label>
                    <select name="kelas_id" class="form-control js-example-basic-single w-100">
                        <option >--Pilih kelas--</option>
                        @foreach( $kelas as $kelas)
                        <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }} / {{ $kelas->guru->nama }}</option>
                        @endforeach
                      </select>        
                     
                </div> 
                @endif
                <button type="submit" class="btn btn-primary">Tambah Nilai</button>

            </div>
        </div>


    </form>

</div>
</div>
</div>


<script>
    var e = document.getElementById("judul");

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
    const judul = document.querySelector('#judul');
    const slug = document.querySelector('#slug');



    function changeSlug() {
        slug.value = `${judul.value}-${periode.value}-${ketentuan.value}`;
    }

    judul.addEventListener('change', function () {
        fetch('/siswa/checkSlug?judul=' + judul.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

    judul.addEventListener('change', function () {
        changeSlug();
    });
</script>
@endsection