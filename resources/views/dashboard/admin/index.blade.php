@extends('dashboard.layouts.main')


@section('content')


@section('judul')
Page Administrator
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
                <a type="button" href="/administrator/create" class="btn btn-primary btn-rounded btn-fw"
                    style="margin-bottom:20px">Tambah</a>
                    @include('dashboard.layouts.alert')
                <div class="row">
                    <br>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="display expandable-table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Level</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($post as $posta)
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $posta->nama }}</td>
                                        <td>{{ $posta->level }}</td>
                                        <td>{{ $posta->email }}</td>
                                        <td>{{ $posta->user->username }}</td>

                                        <td>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <a class="edit" href='/administrator/{{ $posta['id']}}/edit'><i
                                                            class="fa fa-pencil"></i></a>
                                                </div>





                                                <div class="form-group col-md-6">
                                                    <form action="/administrator/{{ $posta->id }}" method="post"
                                                        style="display:contents">
                                                        @method('delete')
                                                        @csrf
                                                        <a class="delete" onclick="return confirm('Are You Sure')"
                                                            type="button"><i class="fa fa-close"></i></a>
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