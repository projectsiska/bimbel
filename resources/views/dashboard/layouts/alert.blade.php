@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{session('success')}}
</div>
@elseif(session()->has('update'))
<div class="alert alert-warning" role="alert">
    {{session('update')}}
</div>
@elseif(session()->has('deleted'))
<div class="alert alert-danger" role="alert">
    {{session('deleted')}}
</div>
@endif