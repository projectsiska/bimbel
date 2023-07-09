@extends('dashboard.layouts.main')




@section('content')


@section('judul')
Page Administrator
@endsection

@section('deskripsi')
Tambah Administrator
@endsection

<div class="row  container-fluid">


    
    <div class="col-lg-12 m-b30">
        <div class="widget-box">
            <div class="container-fluid">
                <div class="db-breadcrumb">
                    <h4 class="breadcrumb-title">User Profile</h4>
                    <ul class="db-breadcrumb-list">
                        <li><a href="/dashboard"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="/administrator">Administrator</a></li>
                    </ul>
                </div>	
                <form class="edit-profile m-b30" enctype="multipart/form-data" method="post" action="/administrator">
                    @csrf
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nama Admin</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama" {{ old('nama')}} />
                            </div>
                        </div>
                    </div>
 
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input name="email" type="email" class="form-control" {{ old('email')}}>
                            </div>
                        </div>
                    </div>

                    <input type="text" hidden name="level" value="Administrator" class="form-control" />

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Username</label>
                        <div class="col-sm-8">
                            <input name="username" class="form-control" {{ old('username')}}>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" name="password" {{ old('password')}} class="form-control" />
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <br>
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>




</div>
</div>

<script>
    function previewImage() {
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(foto.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }

    }
</script>

@endsection