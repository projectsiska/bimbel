@extends('layouts.main')

@section('container')
 
<table class="table">
   
  <tbody>
    <tr>
         
      <td>Id biaya</td>
      <td>{{$post->id}}</td> 
    </tr>

    <tr>
          
      <td>Nama biaya</td>
      <td>{{$post->nama_biaya}}</td>
    </tr>

    <tr>
          
      <td>Wali biaya</td>
      <td>{{$post->wali_biaya}}</td>
    </tr>
    
  </tbody>
</table>


@endsection