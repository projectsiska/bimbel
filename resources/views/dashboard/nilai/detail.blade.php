@extends('dashboard.layouts.main')

@section('content')

@section('judul')
Page Nilai
@endsection

@section('deskripsi')
Detail Nilai
@endsection
 
 
<style>

    .col-md-6 {
            -ms-flex: 0 0 50%;
            flex: 0 0 0%;
            max-width: none;
        }
        .edit {
            border: 2px solid;
            padding: 5px 10px;
            display: inline-block;
            color: #ffc95f;
            border-radius: 4px;
            margin-right:10px;
        }

        .edit:hover {
            border: 2px solid #ffc95f;
            background-color: #ffc95f;
            color: #fff;
        }

        .showw {
            border: 2px solid;
            padding: 5px 10px;
            display: inline-block;
            color: #34bfa3;
            border-radius: 4px;
            margin-right:10px;
        }

        .showw:hover {
            border: 2px solid #34bfa3;
            background-color: #34bfa3;
            color: #fff;
        }

</style>


<div class="container">
    <br>

    <br>

    <div class="row">
        <div class="col-md-12" style="margin-bottom:15px">



            <div class="form-group row" style="flex-wrap: inherit">
                <label class="col-sm-4 col-form-label">Judul</label> 
                <div class="col-sm-8 col-form-label col-form-label">
                    : {{ $nilai->first()->judul }}
                </div>


            </div>

            <div class="form-group row" style="flex-wrap: inherit">
                <label class="col-sm-4 col-form-label">Kelas</label> 
                <div class="col-sm-8 col-form-label col-form-label">
                    : {{ $nilai->first()->kelas->nama_kelas }}
                </div>


            </div>
        </div>
        </div>



        <form method="post" action="/nilai-masuk">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <input name="nilai_id" hidden value="{{ $nilai->first()->id }}">
                    <div class="form-group">
                        <label  >Siswa</label>
                        <select class="form-control theSelect   js-example-basic-single w-100" id="select-state" placeholder="Pick a state..." name="siswa_id" class="form-control">
                            <option>--Pilih Siswa--</option>
                            @foreach( $siswa as $siswa)
                            <option value="{{ $siswa->id }}">{{ $siswa->nama_siswa }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label >Nilai</label>
                        <input type="text" name="nilai" {{ old('nilai')}} class="form-control" placeholder="Nilai">
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="form-group" style="padding-top:30px">
                        <button type="submit" class="btn btn-primary">Tambah Nilai</button>
                    </div>
                </div>

            </div>
        </form>





    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">

        <table class="display expandable-table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Siswa</th>
                    <th>Nilai</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>


             
                @foreach($nilai_masuk as $posta)
                <tr>
                    <td>{{ $loop->iteration }}</td> 
                    <td>{{ $posta->siswa->nama_siswa }}</td>
                    <td>{{ $posta->nilai }}</td>

                    <td>



                        <ul>

 
                             

                            <form action="/nilai-masuk/{{ $posta->id }}" method="post" style="display:contents">
                                @method('delete')
                                @csrf


                                <input onclick="return confirm('Are You Sure')" role="button"
                                    href='/nilai-masuk/{{$posta->id}}/destroy' type="submit" VALUE="X" class="delete">



                            </form>

                        </ul>

                    </td>
                </tr>

                @endforeach 





            </tbody>
        </table>
    </div>

</div>
</div>
 
<script>
    $(".theSelect").select2();
</script>

@endsection