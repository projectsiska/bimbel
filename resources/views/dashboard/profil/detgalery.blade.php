@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <br>
    <a href="/galery" class="btn btn-primary"><span data-feather="arrow-left"></span>Back</a>
    <br>
    <br>
    <div class="row">
        <div class="col-md-6">

            <table class="table">

                <tbody>

                  
                    <tr>

                        <td>Nama Menu</td>
                        <td>:</td>
                        <td>{{$galery->nama_menu}}</td>
                    </tr>

                    <tr>

                        <td>Harga</td>
                        <td>:</td>
                        <td>@currency($galery->harga)</td>
                    </tr>

                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td>{{$galery->keterangan}}</td>
                    </tr>
 


                </tbody>
            </table>

        </div>


        <div class="col-md-6">

            <table class="table">

                <tbody>

                    

                     <tr>
                        <td>Foto</td>
                        <td>:</td>
                        <td><img src="{{ asset('storage/' . $galery->foto) }}" alt="{{ $galery->nama_menu }}" class="img-fluid mt-3"></td>
                    </tr>

                    <tr>


                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection
