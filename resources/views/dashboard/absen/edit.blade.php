@extends('dashboard.layouts.main')


@section('content')


@section('judul')
Page Kelas
@endsection

@section('deskripsi')
Edit Kelas
@endsection

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a type="button" href="/absen" class="btn btn-primary">Back</a>
                <br>
                <br>

                <form method="post" action="/absen/{{$absen->id}}">
                    @csrf
                    @method('put')

                    <input name="id" hidden value="{{ $absen->id }}">
                    <div class="form-group">
                        <label for="exampleInputName1">Nama absen</label>
                        <input type="text" value="{{$absen->judul}}" name="judul" {{ old('judul')}}
                            class="form-control  @error('judul') is->invalid @enderror" id="exampleInputName1"
                            placeholder="Name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail3">Tutup Absen</label>
                        <input value="{{$absen->tutup_absen}}" type="datetime-local"  name="tutup_absen" {{ old('tutup_absen')}}
                            class="form-control @error('tutup_absen') is->invalid @enderror" placeholder="Kode absen">
                    </div>




                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection