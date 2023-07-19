@extends('dashboard.layouts.main')




@section('content')


@section('judul')
Page Kelas
@endsection

@section('deskripsi')
Tambah Kelas
@endsection

<div class="row">


    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <a type="button" href="/kelas" class="btn btn-primary">Back</a>
                <Br>
                <Br>
          

                    <div class="row" >
                        <div class="col-md-6">
                            <div class="form-group row" style="flex-wrap: inherit">
                                <label class="col-sm-4 col-form-label">Nama Kelas</label>
                                <label class="col-sm-0 col-form-label" style="width:2px">:</label>
                                <div class="col-sm-8 col-form-label col-form-label">
                                    {{$kelas->nama_kelas}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row" style="flex-wrap: inherit">
                                <label class="col-sm-4 col-form-label">Nama Guru</label>
                                <label class="col-sm-0 col-form-label" style="width:2px">:</label>
                                <div class="col-sm-8 col-form-label">
                                    {{$kelas->guru->nama}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group row" style="flex-wrap: inherit">
                                <label class="col-sm-4 col-form-label">Keterangan</label>
                                <label class="col-sm-0 col-form-label" style="width:2px">:</label>
                                <div class="col-sm-8 col-form-label">
                                 {{$kelas->keterangan}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row" style="flex-wrap: inherit">
                                <label class="col-sm-4 col-form-label">Tahun Ajaran</label>
                                <label class="col-sm-0 col-form-label" style="width:2px">:</label>
                                <div class="col-sm-8 col-form-label">
                                    {{$kelas->tahun_ajaran}}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row" style="flex-wrap: inherit">
                                <label class="col-sm-4 col-form-label">Status</label>
                                <label class="col-sm-0 col-form-label" style="width:2px">:</label>
                                <div class="col-sm-8 col-form-label">
                                    {{$kelas->status}}
                                </div>
                            </div>
                        </div>
                    </div> 



                    <div class="mail-list-container">
                         
                        <div class="mail-box-list">
                            @foreach($siswa as $siswa)
                            <div class="mail-list-info">
                                  
                                <div class="mail-list-title">
                                    <h6> {{$siswa->nama_siswa}}</h6>
                                </div>
                                <div class="mail-list-title-info">
                                    <p> {{$siswa->jenis_kelamin}}</p>
                                </div>
                                <div class="mail-list-time">
                                    <span> {{$siswa->created_at}}</span>
                                </div>
                                <ul class="mailbox-toolbar">
                                
                                    <li data-toggle="tooltip" title="" data-original-title="Snooze"><a href="{{ route('siswa.show', $siswa->id) }}"><i class="fa fa-clock-o"></i></a></li> 
                                </ul>
                            </div>

                            @endforeach
                            
                        </div>
                    </div>
               
                 
               
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