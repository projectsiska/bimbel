@extends('dashboard.layouts.main')


@section('content')


@section('judul')
Page Biaya
@endsection

@section('deskripsi')
Halaman Utama Rincihan Biaya
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
    }

    .edit:hover {
        border: 2px solid #ffc95f;
        background-color: #ffc95f;
        color: #fff;
    }
</style>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            
                    @include('dashboard.layouts.alert')

                <div class="row">
                    <br>
                    <div class="col-12">
                        <div class="table-responsive">

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th> 
                                        <th scope="col">Harga</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach($post as $posta)


                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                         <td>@currency($posta->harga)</td>
                                        <td>{{$posta->keterangan }}</td>
                                        <td>

                                            <a href="/biaya/{{$posta->id}}/edit" role="button"
                                                class="btn btn-warning">Edit</a>

                                            {{-- <form action="/biaya/{{ $posta->id }}" class="d-inline" method="post">
                                                @method('delete')
                                                @csrf

                                                <button onclick="return confirm('Are You Sure')" role="button"
                                                    class="btn btn-danger">Hapus</button>
                                            </form> --}}
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