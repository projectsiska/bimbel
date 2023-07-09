@extends('dashboard.layouts.main')



@section('judul')
Data User
@endsection


@section('container')

<div class="container" style="padding: 20px; margin:0">

    <div class="row" style="display:flex; margin-bottom:5px">
        <div class="col-md-8">
            <a type="button" href="/user/create" class="btn btn-primary">Tambah</a>
        </div>
        <div class="col-md-4">
            <form action="/user">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" value="{{request('search')}}"
                        placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-secondary">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @elseif(session()->has('deleted'))
    <div class="alert alert-danger" role="alert">
        {{session('deleted')}}
    </div>
    @endif

    <table class="table table-striped">
        <thead class="thead-light">
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Level</th>
                <th scope="col">Email</th>
                <th scope="col">Username</th>
                <th scope="col">Aksi</th>

            </tr>
        </thead>
        <tbody style="overflow:auto;">
            @foreach($post as $posta)
            <tr>

                <td>{{ $posta->name }}</td>
                <td>{{ $posta->level }}</td>
                <td>{{ $posta->email }}</td>
                <td>{{ $posta->username }}</td>

                <td>
                    <a href="/user/{{$posta->id}}/edit" role="button" class="btn btn-warning">Edit</a>
                    <form action="/user/{{ $posta->id }}" class="d-inline" method="post">
                        @method('delete')
                        @csrf

                        <button onclick="return confirm('Are You Sure')" role="button"
                            class="btn btn-danger">Hapus</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="col-md-4"></div>

    <div class="col-md-4" style="display:-webkit-inline-box">
    {{--     <center>{{ $post->links() }}</center> --}}
    </div>
</div>

</div>
@endsection
