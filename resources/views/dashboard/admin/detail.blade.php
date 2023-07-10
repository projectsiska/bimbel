@extends('dashboard.layouts.main')




@section('content')


@section('judul')
Page Admin
@endsection

@section('deskripsi')
Halaman Detail Admin
@endsection

<div class="row">


    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <a type="button" href="/administrator" class="btn btn-primary">Back</a>
                <Br>
                <Br>
          
                    @foreach ($admin as $admin )
                         
                    <div class="row" >
                        <div class="col-md-6">
                            <div class="form-group row" style="flex-wrap: inherit">
                                <label class="col-sm-4 col-form-label">Nama Admin</label>
                                <label class="col-sm-0 col-form-label" style="width:2px">:</label>
                                <div class="col-sm-8 col-form-label col-form-label">
                                    {{$admin->nama}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row" style="flex-wrap: inherit">
                                <label class="col-sm-4 col-form-label">Email Admin</label>
                                <label class="col-sm-0 col-form-label" style="width:2px">:</label>
                                <div class="col-sm-8 col-form-label">
                                    {{$admin->email}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group row" style="flex-wrap: inherit">
                                <label class="col-sm-4 col-form-label">Level</label>
                                <label class="col-sm-0 col-form-label" style="width:2px">:</label>
                                <div class="col-sm-8 col-form-label">
                                 {{$admin->level}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row" style="flex-wrap: inherit">
                                <label class="col-sm-4 col-form-label">Username</label>
                                <label class="col-sm-0 col-form-label" style="width:2px">:</label>
                                <div class="col-sm-8 col-form-label">
                                    {{$admin->username}}
                                </div>
                            </div>
                        </div>
                    </div> 

                    @endforeach
 
               
            </div>
        </div>
    </div>

    


</div> 
 

@endsection