@extends('dashboard.layouts.main')


@section('content')


@section('judul')
Page rekening
@endsection

@section('deskripsi')
Halaman Utama
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

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a type="button" href="/rekening/create" class="btn btn-primary btn-rounded btn-fw"
                    style="margin-bottom:20px">Tambah</a>

                    @include('dashboard.layouts.alert')

                <div class="row">
                    <br>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="display expandable-table table-striped" style="width:100%">
                                <thead>
                                    <tr>

                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Bank</th>
                                                    <th scope="col">Atas Nama</th>
                                                    <th scope="col">Rekening</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                @foreach($post as $posta)


                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $posta->bank }}</td>
                                                    <td>{{ $posta->atas_nama}}</td>
                                                    <td>{{ $posta->rekening }}</td>
                                                    <td>

                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <a class="edit"
                                                                    href='/rekening/{{ $posta['id']}}/edit'><i
                                                                        class="fa fa-pencil"></i></a>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <form action="/rekening/{{ $posta->id }}" class="d-inline" method="post">
                                                                    @method('delete')
                                                                    @csrf
                                            
                                                                    <input onclick="return confirm('Are You Sure')" role="button"  href='/nilai/{{$posta->id}}/destroy' type="submit" VALUE="X"
                                                                    class="delete"> 
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>



@endsection