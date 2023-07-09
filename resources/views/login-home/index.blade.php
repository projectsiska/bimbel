@extends('layouts.main')



@section('judul')

@endsection


@section('content')
  

<br>
<br>
<br>
    <div class="account-container" style="margin-top:40px">
      <div class="heading-bx left">
        <h2 class="title-head">Login to your <span>Account</span></h2>
        <p>Don't have an account? <a href="/register">Create one here</a></p>
      </div>	
      <form class="contact-bx"  method="post" action="/login">
        @csrf   
        <div class="row placeani">
          <div class="col-lg-12">
            <div class="form-group">
              <div class="input-group">
                <label>Username</label>
                <br>
                <input name="username" type="text" required="" class="form-control">
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <div class="input-group"> 
                <label>Password</label>
                <br>
                <input name="password" type="password" class="form-control" required="">
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group form-forget">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
             
              </div>
{{--               <a href="forget-password.html" class="ml-auto">Forgot Password?</a> --}}
            </div>
          </div>
          <div class="col-lg-12 m-b30">
            <button name="submit" type="submit" value="Submit" class="btn button-md">Login</button>
          </div>
         
        </div>
      </form>
    </div> 

@endsection