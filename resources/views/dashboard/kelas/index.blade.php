@extends('dashboard.layouts.main')




@section('content')


@section('judul')
Page Kelas
@endsection

@section('deskripsi')
Halaman Utama Kelas
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
            @if(auth()->user()->level=="Administrator")
                <a type="button" href="/kelas/create" class="btn btn-primary btn-rounded btn-fw"
                    style="margin-bottom:20px">Tambah</a>
            @endif
                    @include('dashboard.layouts.alert')

                <div class="row">
                    <br>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="display expandable-table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kelas</th>
                                        <th>Guru</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($post as $posta)
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $posta->nama_kelas }}</td>
                                        <td>{{ $posta->guru->nama }}</td>
                                        <td>{{ $posta->status }}</td>

                                        <td>

                                            <div class="noti-box-list">
                                                <ul>
                                                    <li>
                                                        <a href='/kelas/{{ $posta['id']}}' class="showw">
                                                                <i class="fa fa-eye"></i>
                                                             
                                                        </a> <br>
                                                        @if(auth()->user()->level=="Administrator")
                                                        <a href='/kelas/{{$posta->id}}/edit' class="edit">
                                                                <i class="fa fa-pencil"></i>
                                                            
                                                        </a> <br>

                                                       
                                                        <form action="/kelas/{{ $posta->id }}" method="post"
                                                            style="display:contents">
                                                            @method('delete')
                                                            @csrf


                                                            <input onclick="return confirm('Are You Sure')" role="button"
                                                                href='/kelas/{{$posta->id}}/destroy' type="submit" VALUE="X" class="delete">
                                                               
                                                                
                                                            </a>
                                                        </form>

                                                        @endif

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