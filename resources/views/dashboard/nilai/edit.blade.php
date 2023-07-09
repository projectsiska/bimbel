@extends('dashboard.layouts.main')




@section('content')


@section('judul')
Page Nilai
@endsection

@section('deskripsi')
Halaman Edit Nilai
@endsection

<div class="container">
    <br>
    <a type="button" href="/nilai" class="btn btn-primary">Back</a>
    <br>
    <br>
    <form method="post" enctype="multipart/form-data" action="/nilai/{{$nilai->id}}">
        @csrf
        @method('put')

        <div class="row">
            <div class="col-md-12">

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="exampleInputPassword1">Judul Nilai</label>
                    <input type="text" required value="{{ old('judul',$nilai->judul)}}" name="judul"
                        class="form-control col-sm-9" placeholder="Nama Nilai">
                </div>

                <input type="text" required hidden value="{{ old('judul',$nilai->id)}}" name="id">
               
            </div>


            <div class="col-md-6">
            </div>
            <div class="col-md-6">



                <button type="submit" class="btn btn-primary">Update Nilai</button>

            </div>
        </div>

    </form>

</div>


@endsection