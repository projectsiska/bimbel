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
                <a type="button" href="/kelas" class="btn btn-primary">Back</a>
                <br>
                <br>

                <form method="post" action="/kelas/{{$kelas->id}}">
                    @csrf
                    @method('put')

                    <input name="id" hidden value="{{ $kelas->id }}">
                    <div class="form-group">
                        <label for="exampleInputName1">Nama Kelas</label>
                        <input type="text" value="{{$kelas->nama_kelas}}" name="nama_kelas" {{ old('nama_kelas')}}
                            class="form-control  @error('nama_kelas') is->invalid @enderror" id="exampleInputName1"
                            placeholder="Name">
                    </div>

                    
                    <div class="form-group">
                        <label for="exampleTextarea1">Guru</label>
                        <select name="guru_id" style="color:black" class="form-control">
                            <option value="{{$kelas->guru_id}}" selected>--{{$kelas->guru->nama}}--
                            </option>
                            @foreach( $guru as $guru)
                            <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="exampleTextarea1">Keterangan</label>
                        <textarea class="form-control @error('keterangan') is->invalid @enderror" {{ old('keterangan')}}
                            name="keterangan" id="exampleTextarea1" rows="4">{{$kelas->keterangan}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Status</label>
                        <select name="status" style="color:black" class="form-control">
                            <option value="{{$kelas->status}}" selected>--{{$kelas->status}}--
                            </option>
                            <option value="aktif">Aktif</option>
                            <option value="penuh">Penuh</option>
                        </select>
                    </div>




                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection