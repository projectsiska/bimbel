@extends('dashboard.layouts.main')




@section('content')


@section('judul')
Page Administrator
@endsection

@section('deskripsi')
Edit Administrator
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
                <form class="edit-profile m-b30" method="post" enctype="multipart/form-data" action="/administrator/{{$admin->id}}">
                    @csrf
                    @method('put')
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nama Admin</label>
                                <div class="col-sm-8">
                                    <input type="text" value="{{$admin->nama}}"
                                        class="form-control @error('nama') is->invalid @enderror" name="nama"
                                        {{ old('nama')}} />
                                </div>
                            </div>
                        </div>


                        <input type="text" hidden value="{{$admin->user_id}}"
                        class="form-control" name="user_id" />

                        <input type="text" hidden value="{{$admin->level}}"
                        class="form-control" name="level" />

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input name="email" type="email" value="{{$admin->email}}"
                                        class="form-control @error('email') is->invalid @enderror">
                                </div>
                            </div>
                        </div>

                    </div>
                   
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Username</label>
                                <div class="col-sm-8">
                                    <input name="username" value="{{$admin->user->username}}"
                                        class="form-control  @error('username') is->invalid @enderror">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password" value="{{$admin->user->password}}"
                                        class="form-control @error('password') is->invalid @enderror" />
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
                </form>
            </div>
        </div>
    </div>
</div>



@endsection