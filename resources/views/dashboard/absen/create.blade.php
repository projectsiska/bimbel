@extends('dashboard.layouts.main')




@section('content')


@section('judul')
Page Absen
@endsection

@section('deskripsi')
Tambah Absen
@endsection


<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a type="button" href="/absen" class="btn btn-primary">Back</a>
                <br>
                <br>

                <form class="forms-sample" method="post" action="/absen">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Nama Absen</label>
                        <input type="text" name="judul" {{ old('judul')}} class="form-control" id="exampleInputName1"
                            placeholder="Nama Absen">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail3">Terakhir Absen</label>


                        <input name="tutup_absen" type="datetime-local" class="form-control" id="exampleInputEmail2"
                            placeholder="Last">

                    </div> 

                  
                    <div class="form-group">
                        <select name="kelas_id" class="form-control js-example-basic-single w-100">
                            <option>--Pilih Kelas--</option>
                            @foreach( $kelas as $kelas)
                            <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }} / {{ $kelas->guru->nama }}</option>
                            @endforeach
                        </select>
                    </div> 
                    <br>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection