<div class="page-banner ovbl-dark" style="background-image:url('{{ asset('storage/foto/banner2.jpg') }}'');">
    <div class="container">
        <div class="page-banner-entry">
            <h1 class="text-white">@yield('judul')</h1>
         </div>
    </div>
</div>
<!-- Breadcrumb row -->
<div class="breadcrumb-row">
    <div class="container">
        <ul class="list-inline">
            <li><a href="/home">Home</a></li>
            <li>@yield('judul')</li>
        </ul>
    </div>
</div>