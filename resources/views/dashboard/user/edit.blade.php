@extends('dashboard.layouts.main')


@section('judul')
Edit Data User
@endsection


@section('container')

 
<div class="container">
  <br>
    <a type="button" href="/user" class="btn btn-primary">Back</a> 
  <br>
  <br>
   <form method="post" action="/user/{{$user->id}}">
 @csrf
@method('put')
 


  <div class="form-group">
    <label for="exampleInputEmail1">Nama Pejabat</label>
    <input type="text" value="{{ old('name',$user->name)}}" required name="name" autofocus class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="name" placeholder="Nama biaya"> 
  </div>
  

  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" required  value="{{ old('email',$user->email)}}" name="email" class="form-control" id="email" placeholder="Email">
  </div>


  <div class="form-group">
    <label for="exampleInputPassword1">Jabatan</label>
  <select id="inputState" name="level" class="form-control">
     
        <option value="{{$user->level}}" selected>-{{$user->level}}-</option>
        

        <option value="Administrator">Administrator</option>
        <option value="Pimpinan">Pimpinan</option>      
      </select>
</div>

  <div class="form-group">
    <label for="exampleInputPassword1">Username</label>
    <input type="text" required  value="{{ old('username',$user->username)}}" name="username" class="form-control" id="username" placeholder="Username">
  </div>


  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" required  value="{{ old('password',$user->password)}})}}" name="password" class="form-control" id="password" placeholder="Password">
  </div>




   <button type="submit" class="btn btn-primary">Tambah User</button>
</form>

</div>


</div>
@endsection