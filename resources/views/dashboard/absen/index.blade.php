@extends('dashboard.layouts.main')


@section('content')


@section('judul')
Page Absen
@endsection

@section('deskripsi')
Halaman Utama Absen
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
                <a type="button" href="/absen/create" class="btn btn-primary btn-rounded btn-fw"
                    style="margin-bottom:20px">Tambah</a>
               
                    @include('dashboard.layouts.alert')

                <div class="row">
                    <br>
                    <div class="col-12">
                        <div class="table-responsive">

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kelas</th>
                                        <th>Guru</th>
                                        <th>Judul</th>
                                        <th>Buka Absen</th>
                                        <th>Tutup Absen</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($post as $posta) 
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $posta->kelas->nama_kelas }}</td>
                                        <td>{{ $posta->kelas->guru->nama }}</td>
                                        <td>{{ $posta->judul }}</td>
                                        <td>{{ $posta->created_at }}</td>
                                        <td>{{ $posta->tutup_absen }}</td>

                                        <td>
                                            <div class="noti-box-list">
                                                <ul>
                                                    <li>
                                                        <a href='/absen/{{ $posta['id']}}' class="showw">
                                                                <i class="fa fa-eye"></i>
                                                             
                                                        </a> <br>

                                                        <a href='/absen/{{$posta->id}}/edit' class="edit">
                                                                <i class="fa fa-pencil"></i>
                                                            
                                                        </a> <br>

                                                       
                                                        <form action="/absen/{{ $posta->id }}" method="post"
                                                            style="display:contents">
                                                            @method('delete')
                                                            @csrf


                                                            <input onclick="return confirm('Are You Sure')" role="button"
                                                            href='/absen/{{$posta->id}}/destroy' type="submit" VALUE="X" class="delete">
                                                        </form>

                                                    </li>
                                                </ul>
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