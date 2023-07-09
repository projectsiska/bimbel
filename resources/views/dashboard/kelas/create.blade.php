@extends('dashboard.layouts.main')




@section('content')


@section('judul')
Page Kelas
@endsection

@section('deskripsi')
Tambah Kelas
@endsection
 

<div class="row">
    <div class="col-md-12 grid-margin stretch-card"> 
        <div class="card">
          <div class="card-body">
            <a type="button" href="/kelas" class="btn btn-primary">Back</a>
            <br>
            <br>

            <form class="forms-sample" method="post" action="/kelas">
              @csrf
              <div class="form-group">
                <label for="exampleInputName1">Nama kelas</label>
                <input type="text" name="nama_kelas" {{ old('nama_kelas')}} class="form-control" id="exampleInputName1" placeholder="Nama Kelas">
              </div>

              <div class="form-group">
                <label for="exampleTextarea1">Guru</label>
                <select name="guru_id" class="form-control js-example-basic-single w-100">
                  <option >--Pilih Guru--</option>
                  @foreach( $guru as $guru)
                  <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                  @endforeach
                </select>              
              </div>

              <div class="form-group">
                <label for="exampleInputEmail3">Keterangan</label>
                <textarea   name="keterangan" {{ old('keterangan')}} class="form-control"  placeholder="keterangan">{{ old('keterangan')}}</textarea>
              </div>
 
                <input name="status" value="aktif" hidden class="form-control" id="exampleInputEmail2" placeholder="Email">
            
              
             
           
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>



@endsection