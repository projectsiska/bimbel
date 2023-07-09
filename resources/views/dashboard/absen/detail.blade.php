@extends('dashboard.layouts.main')




@section('content')


@section('judul')
Page Absen
@endsection

@section('deskripsi')
Halaman Detail Absen
@endsection



<div class="row">


    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <a type="button" href="/absen" class="btn btn-primary">Back</a>
                <Br>
                <Br>
                <form class="form-sample" enctype="multipart/form-data" method="post" action="/absen">
                    @csrf

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group row" style="flex-wrap: inherit">
                                <label class="col-sm-3 col-form-label">Kelas</label>
                                <label class="col-sm-0 col-form-label" style="width:2px">:</label>
                                <div class="col-sm-9 col-form-label">
                                 {{$absen->kelas->nama_kelas}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row" style="flex-wrap: inherit">
                                <label class="col-sm-3 col-form-label">Guru</label>
                                <label class="col-sm-0 col-form-label" style="width:2px">:</label>
                                <div class="col-sm-9 col-form-label">
                                    {{$absen->kelas->guru->nama}}
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="row" >
                        <div class="col-md-6">
                            <div class="form-group row" style="flex-wrap: inherit">
                                <label class="col-sm-3 col-form-label">Judul</label>
                                <label class="col-sm-0 col-form-label" style="width:2px">:</label>
                                <div class="col-sm-9 col-form-label">
                                    {{$absen->judul}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row" style="flex-wrap: inherit">
                                <label class="col-sm-3 col-form-label">Tutup Absen absen</label>
                                <label class="col-sm-0 col-form-label" style="width:2px">:</label>
                                <div class="col-sm-9 col-form-label col-form-label">
                                    {{$absen->tutup_absen}}
                                </div>
                            </div>
                        </div>
                      
                    </div>
                    

                    <div class="mail-list-container">
                         
                        <div class="mail-box-list">
                            @foreach($absenmasuk as $siswa)
                            <div class="mail-list-info">
                                  
                                <div class="mail-list-title">
                                    <h6> {{$siswa->siswa->nama_siswa}}</h6>
                                </div>
                                <div class="mail-list-title-info">
                                    <p> {{$siswa->siswa->jenis_kelamin}}</p>
                                </div>
                                <div class="mail-list-time">
                                    <span> {{$siswa->siswa->created_at}}</span>
                                </div>
                                <ul class="mailbox-toolbar">
                                
                                    <li data-toggle="tooltip" title="" data-original-title="Snooze"><a href="{{ route('siswa.show', $siswa->id) }}"><i class="fa fa-clock-o"></i></a></li> 
                                </ul>
                            </div>

                            @endforeach
                            
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>




</div>
</div>

<script>

const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})


    const myModal = new bootstrap.Modal(document.getElementById('myModal'), options)
    // or
    const myModalAlternative = new bootstrap.Modal('#myModal', options)

    const exampleModal = document.getElementById('exampleModal')
    if (exampleModal) {
    exampleModal.addEventListener('show.bs.modal', event => {
        // Button that triggered the modal
        const button = event.relatedTarget
        // Extract info from data-bs-* attributes
        const recipient = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an Ajax request here
        // and then do the updating in a callback.

        // Update the modal's content.
        const modalTitle = exampleModal.querySelector('.modal-title')
        const modalBodyInput = exampleModal.querySelector('.modal-body input')

        modalTitle.textContent = `New message to ${recipient}`
        modalBodyInput.value = recipient
    })
    }

</script>

@endsection