@extends('dashboard.layouts.main')




@section('content')


@section('judul')
Page Rincihan
@endsection

@section('deskripsi')
Tambah Rincihan Biaya
@endsection

<script type=”text/javascript” src=”ckeditor/ckeditor.js”></script>



<div class="row  container-fluid">
 

    <div class="col-lg-12 m-b30">
        <div class="widget-box">
            <div class="container-fluid">
                <div class="db-breadcrumb">
                    <h4 class="breadcrumb-title">User Profile</h4>
                    <ul class="db-breadcrumb-list">
                        <li><a href="/dashboard"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="/biaya">Biaya</a></li>
                    </ul>
                </div>
                <form class="edit-profile m-b30" method="post" action="/biaya" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">

                            <input value="{{ $aa = auth()->user()->level }}" hidden>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" >Biaya</label>

                                <input class="form-control col-sm-8" name="harga" value="{{ old('harga')}}" id="harga"
                                    placeholder="Biaya">

                            </div>









                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" >Keterangan</label>
                                <textarea type="textarea" required value="{{ old('keterangan')}}" name="keterangan"
                                class="form-control col-sm-8" id="keterangan" placeholder="Total"></textarea>
                            </div>

 

                            @error('slug')

                            <div class="invalid-feedback">
                                error nich

                            </div>
                            @enderror

                        </div>


                        <div class="col-md-12 row">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6" style="text-align: right">


                                <button type="submit" class="btn btn-primary">Tambah biaya</button>

                            </div>
                        </div>
                        </div>
                        </div>


                </form>

            </div>
        </div>
    </div>


    @endsection