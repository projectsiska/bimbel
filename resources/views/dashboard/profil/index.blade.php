@extends('dashboard.layouts.main')


@section('content')


@section('judul')
Page Profil
@endsection

@section('deskripsi')
Halaman Profil
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
                            <table class="display expandable-table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Telepon</th> 
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($post as $posta)
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $posta->nama }}</td>
                                        <td>{{ $posta->alamat }}</td>
                                        <td>{{ $posta->email }}</td>
                                        <td>{{ $posta->telepon }}</td> 

                                        <td>
                                          

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <a class="edit" href='/profil/{{ $posta['id']}}/edit'><i
                                                            class="fa fa-pencil"></i></a>
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