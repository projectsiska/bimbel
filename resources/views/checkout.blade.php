@extends('layouts.main')



@section('judul')

@endsection


@section('container')

<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet'>
<link href='' rel='stylesheet'>
<style>
    .section {
        position: relative;
        height: 100vh;
    }

    .section .section-center {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    #pembayaran {
        font-family: 'Raleway', sans-serif;
    }

    .pembayaran-form {
        position: relative;
        max-width: 642px;
        width: 100%;
        padding: 40px;
        overflow: hidden;
        background-size: cover;
        border-radius: 5px;
        z-index: 20;
    }

    .pembayaran-form::before {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        top: 0;
        background: rgba(0, 0, 0, 0.7);
        z-index: -1;
    }

    .pembayaran-form .form-header {
        text-align: center;
        position: relative;
        margin-bottom: 30px;
    }

    .pembayaran-form .form-header h1 {
        font-weight: 700;
        text-transform: capitalize;
        font-size: 42px;
        margin: 0px;
        color: #fff;
    }

    .pembayaran-form .form-group {
        position: relative;
        margin-bottom: 30px;
    }

    .pembayaran-form .form-control {
        background-color: rgba(255, 255, 255, 0.2);
        height: 60px;
        padding: 0px 25px;
        border: none;
        border-radius: 40px;
        color: #fff;
        -webkit-box-shadow: 0px 0px 0px 2px transparent;
        box-shadow: 0px 0px 0px 2px transparent;
        -webkit-transition: 0.2s;
        transition: 0.2s;
    }

    .pembayaran-form .form-control::-webkit-input-placeholder {
        color: rgba(255, 255, 255, 0.5);
    }

    .pembayaran-form .form-control:-ms-input-placeholder {
        color: rgba(255, 255, 255, 0.5);
    }

    .pembayaran-form .form-control::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }

    .pembayaran-form .form-control:focus {
        -webkit-box-shadow: 0px 0px 0px 2px #ff8846;
        box-shadow: 0px 0px 0px 2px #ff8846;
    }

    .pembayaran-form input[type="date"].form-control {
        padding-top: 16px;
    }

    .pembayaran-form input[type="date"].form-control:invalid {
        color: rgba(255, 255, 255, 0.5);
    }

    .pembayaran-form input[type="date"].form-control+.form-label {
        opacity: 1;
        top: 10px;
    }

    .pembayaran-form input[type="time"].form-control {
        padding-top: 16px;
    }

    .pembayaran-form input[type="time"].form-control:invalid {
        color: rgba(255, 255, 255, 0.5);
    }

    .pembayaran-form input[type="time"].form-control+.form-label {
        opacity: 1;
        top: 10px;
    }

    .pembayaran-form select.form-control {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    .pembayaran-form select.form-control:invalid {
        color: rgba(255, 255, 255, 0.5);
    }

    .pembayaran-form select.form-control+.select-arrow {
        position: absolute;
        right: 15px;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        width: 32px;
        line-height: 32px;
        height: 32px;
        text-align: center;
        pointer-events: none;
        color: rgba(255, 255, 255, 0.5);
        font-size: 14px;
    }

    .pembayaran-form select.form-control+.select-arrow:after {
        content: '\279C';
        display: block;
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg);
    }

    .pembayaran-form select.form-control option {
        color: #000;
    }

    .pembayaran-form .form-label {
        position: absolute;
        top: -10px;
        left: 25px;
        opacity: 0;
        color: #ff8846;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.3px;
        height: 15px;
        line-height: 15px;
        -webkit-transition: 0.2s all;
        transition: 0.2s all;
    }

    .pembayaran-form .form-group.input-not-empty .form-control {
        padding-top: 16px;
    }

    .pembayaran-form .form-group.input-not-empty .form-label {
        opacity: 1;
        top: 10px;
    }

    .pembayaran-form .submit-btn {
        color: #fff;
        background-color: #e35e0a;
        font-weight: 700;
        height: 60px;
        padding: 10px 30px;
        width: 100%;
        border-radius: 40px;
        border: none;
        text-transform: uppercase;
        font-size: 16px;
        letter-spacing: 1.3px;
        -webkit-transition: 0.2s all;
        transition: 0.2s all;
    }

    .pembayaran-form .submit-btn:hover,
    .pembayaran-form .submit-btn:focus {
        opacity: 0.9;
    }
</style>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
<script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js'></script>
<script type='text/javascript'></script>


<div id="pembayaran" class="section">
    <div class="section-center">
        <div class="container">
            <div class="row" style="flex-wrap: nowrap">
                <div class="col-mb-8 pembayaran-form">
                    <div class="form-header">
                        <h1>Make your reservation {{ auth()->user()->siswa->id }}</h1>
                    </div>
                    <form method="post" action="/pembayaran/{{$post->id}}" enctype="multipart/form-data">
                        @csrf
                       @method('put')
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="form-control" hidden value="{{ old('name',$post->id)}}" name="id" type="text" required>
                                    <input class="form-control" hidden value="{{ old('name',$post->biaya_id)}}" name="biaya_id" type="text" required>
                                    <input class="form-control" readonly value="{{ old('name',$post->biaya->nama_biaya)}}" type="text" required>
                                    <span class="form-label">biaya</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" value="{{ old('name',$post->tgl_pembayaran)}}" name="tgl_pembayaran" type="date" min='{{ now()->toDateString('Y-m-d') }}' required>
                                    <span class="form-label">Tanggal Pengantaran </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" value="{{ old('name',$post->jam_pembayaran)}}" name="jam_pembayaran" type="time" required>
                                    <span class="form-label">Jam Pengantaran</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input class="form-control" hidden value="{{ old('harga', $post->biaya->harga)}}" name="harga" id="harga"
                                        type="text" placeholder="Harga / Box">
                                        <input class="form-control" readonly  id="harga1" value="@currency($post->biaya->harga)"
                                        type="text" placeholder="Harga / Box">
                                    <span class="form-label">Harga</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input class="form-control" value="{{ old('total_biaya',$post->total_biaya)}}" name="total_biaya" type="text" id="jumlah" placeholder="Jumlah Box">
                                    <span class="form-label">Jumlah</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input class="form-control" hidden name="total" value="{{ old('total',$post->total)}}" type="text" id="total" placeholder="Total">
                                    <input class="form-control" value="{{ old('total',$post->total)}}" type="text" id="total1" placeholder="Total">
                                    <span class="form-label">Total</span>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control"  name="catatan" placeholder="Tulis Catatan Pemesananmu">{{ old('catatan',$post->catatan)}}</textarea>
                                    <span class="form-label">Catatan</span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputPassword1" style="color:#ff8846">Upload Bukti Pembayaran</label>
                                <img class="img-preview img-fluid" style="max-height:200px" >
                                <input type="file" value="{{ old('bukti')}}" required name="bukti" class=""
                                    id="bukti" placeholder="Bukti siswa" style="color:white" onchange="previewImage()" >

                                @error('bukti')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            

                            <input class="form-control" hidden name="status" value="Menunggu Konfirmasi" type="text" placeholder="Total">
                            <input class="form-control" hidden name="siswa_id" value=" {{ auth()->user()->siswa->id }}" type="text" placeholder="Total">


                        </div>
                        <div class="form-btn">
                            <button type="submit" class="submit-btn">Pesan Sekarang</button>
                        </div>
                    </form>
                </div>


                

                <div class="col-mb-4" style="width: fit-content;">


                    <style>
                        @charset "UTF-8";



                        .row {
                            display: flex;
                        }

                        .row .col {
                            flex: 1;
                        }

                        .row .col:last-child {
                            margin-left: 1em;
                        }

                        /* Accordion styles */
                        .tabs {
                            border-radius: 8px;
                            overflow: hidden;
                            box-shadow: 0 4px 4px -2px rgba(0, 0, 0, 0.5);
                        }

                        .tab {
                            width: 100%;
                            color: white;
                            overflow: hidden;
                        }

                        .tab-label {
                            display: flex;
                            justify-content: space-between;
                            padding: 1em;
                            background: #2c3e50;
                            font-weight: bold;
                            cursor: pointer;
                            /* Icon */
                        }

                        .tab-label:hover {
                            background: #1a252f;
                        }

                        .tab-label::after {
                            content: "❯";
                            width: 1em;
                            height: 1em;
                            text-align: center;
                            transition: all 0.35s;
                        }

                        .tab-content {
                            max-height: 0;
                            padding: 0 1em;
                            color: #2c3e50;
                            background: white;
                            transition: all 0.35s;
                        }

                        .tab-close {
                            display: flex;
                            justify-content: flex-end;
                            padding: 1em;
                            font-size: 0.75em;
                            background: #2c3e50;
                            cursor: pointer;
                        }

                        .tab-close:hover {
                            background: #1a252f;
                        }

                        input:checked+.tab-label {
                            background: #1a252f;
                        }

                        input:checked+.tab-label::after {
                            transform: rotate(90deg);
                        }

                        input:checked~.tab-content {
                            max-height: 100vh;
                            padding: 1em;
                        }




                        .process {
                            width: 800px;
                            margin: 3em auto;
                            cursor: default;
                        }

                        .process-items {
                            display: table;
                            margin: 0 0 10px;
                            padding: 0;
                            list-style-type: none;
                            color: black;
                            font-size: 18px;
                            text-align: center;
                        }

                        .process-items li {
                            display: table-cell;
                            width: 25%;
                            vertical-align: bottom;
                            padding: 0 0.5em;
                            transform: scale(0.65) translateY(40px);
                            transform-origin: bottom center;
                            transition: transform 0.5s;
                        }

                        .process-items li.active {
                            transform: scale(1) translateY(0);
                        }

                        .process-items em {
                            display: block;
                            margin-top: 0.5em;
                        }
                    </style>



                    <div class="row" style="width: fit-content; display: flow-root">

                        <div class="col">
                            <h4>Pilihan Rekening</h4>
                            <br>
                            <div class="tabs">
                                @foreach($rekening as $posta)
                                <div class="tab">
                                    <input type="radio" hidden id="{{ $posta->id }}" name="rd">
                                    <label class="tab-label" for="{{ $posta->id }}">{{ $posta->bank }}</label>
                                    <div class="tab-content">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="{{ asset('storage/' . $posta->foto_bank) }}" width="200px"
                                                    alt="{{ $posta->bank }}" class="img-fluid mt-3">
                                            </div>
                                            <div class="col-md-6">
                                                <h3>{{ $posta->atas_nama }}</h3>
                                                <p>{{ $posta->rekening }}</p> 
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                @endforeach
                                <div class="tab">
                                    <input type="radio" hidden id="rd3" name="rd">
                                    <label for="rd3" class="tab-close">Close others &times;</label>
                                </div>
                            </div>
                        </div>


                        <div class="col">

                        </div>
                    </div>
                    <div class="row" style="padding-left:15px">
                        <?php $pesannya = "Halo Miami bimbel... Ada yang ingin saya tanyakan" ;?>
                        <a class="btn btn-success" href="https://wa.me/6282280282126?text={{ $pesannya }}" target="_blank">Hubungi Via WhatsApp</a></td>
        
                    </div>
                    <script>
                        var e = document.getElementById("biaya");

                        function onChange() {
                            var value = e.value;
                            var text = e.options[e.selectedIndex].text;
                            console.log(value, text);
                        }
                        e.onchange = onChange;
                        onChange();

                        // console.log('biaya');
                    </script>

                                    
                    <script>
                        const test = "bababalalbdksfgjsfg";
                        const nis = document.querySelector('#nis');
                        const periode = document.querySelector('#periode');
                        const biaya = document.querySelector('#biaya');
                    
                        const harga = document.querySelector('#harga');
                        const jumlah = document.querySelector('#jumlah');
                        const denda = document.querySelector('#denda');


                    
                        

                        biaya.addEventListener('change', function () {
                            

                            fetch('/biaya/get-biaya/' + biaya.value)
                                .then(response => response.json())
                                .then(data => {
                                    
                                    
                                    const rupiah = (number)=>{
                                    return new Intl.NumberFormat("id-ID", {
                                    style: "currency",
                                    currency: "IDR"
                                    }).format(number);
                                    }


                                    harga.value = data.harga; 
                                    harga1.value = rupiah(harga.value);

                                    
                    
                                    total.value = parseInt(harga.value) * parseInt(jumlah.value);
                                    total1.value = rupiah(parseInt(harga.value) * parseInt(jumlah.value));
                                });

                            
                                
                        });




                        function previewImage() {
                            const bukti = document.querySelector('#bukti');
                            const imgPreview = document.querySelector('.img-preview')

                            imgPreview.style.display = 'block';

                            const oFReader = new FileReader();
                            oFReader.readAsDataURL(bukti.files[0]);

                            oFReader.onload = function (oFREvent) {
                                imgPreview.src = oFREvent.target.result;
                            }

                        }

                    </script> 

                    <script>
                        var process = $('.process');
                        var canvas = document.getElementById('canvas');
                        var ctx = canvas.getContext('2d');

                        var SECTION_WIDTH = 200;

                        var sections = [];
                        var create = function (start) {
                            var section = {
                                start: start,
                                width: SECTION_WIDTH,
                                height: 45,
                                hMax: 35,
                                hMod: 0,
                                progress: 0,
                                dot: {
                                    x: 0,
                                    y: 0
                                }
                            };
                            section.end = section.start + section.width;
                            section.dot.x = section.start + section.width / 2;
                            section.dot.y = section.height;
                            sections.push(section);
                        };

                        var draw = function (s) {
                            var wMod = s.width * 0.3;
                            ctx.beginPath();
                            ctx.moveTo(s.start, s.height);
                            ctx.bezierCurveTo(
                                s.start + wMod, s.height,
                                s.start + wMod, s.height - s.hMod,
                                s.start + s.width / 2, s.height - s.hMod
                            );
                            ctx.bezierCurveTo(
                                s.end - wMod, s.height - s.hMod,
                                s.end - wMod, s.height,
                                s.end, s.height
                            );
                            ctx.lineWidth = 4;
                            ctx.strokeStyle = 'black';
                            ctx.stroke();

                            ctx.beginPath();
                            ctx.fillStyle = 'black';
                            ctx.arc(s.dot.x, s.dot.y, 8, 0, Math.PI * 2);
                            ctx.fill();
                        };

                        function quad(progress) {
                            return Math.pow(progress, 2);
                        }

                        function makeEaseOut(delta) {
                            return function (progress) {
                                return 1 - delta(1 - progress);
                            }
                        }
                        var quadOut = makeEaseOut(quad);

                        var bend = function (s) {
                            if (s.progress < s.hMax) {
                                var delta = quadOut(s.progress / s.hMax);
                                s.hMod = s.hMax * delta;
                                s.dot.y = s.height - s.hMax * delta;
                                s.progress++;
                            }
                        };
                        var reset = function (s) {
                            if (s.progress > 0) {
                                var delta = quadOut(s.progress / s.hMax);
                                s.hMod = s.hMax * delta;
                                s.dot.y = s.height - s.hMax * delta;
                                s.progress -= 2;
                            } else {
                                s.hMod = 0;
                                s.dot.y = s.height;
                                s.progress = 0;
                            }
                        };

                        var currentSection = 0;
                        process.on('mousemove', function (event) {
                            var section = Math.floor((event.clientX - process.offset().left) / SECTION_WIDTH);
                            currentSection = section;
                            process.find('.active').removeClass('active');
                            process.find('li').eq(section).addClass('active');
                        });

                        create(0);
                        create(200);
                        create(400);
                        create(600);

                        var loop = function () {
                            ctx.clearRect(0, 0, canvas.width, canvas.height);

                            sections.forEach(function (s, index) {
                                if (currentSection === index) {
                                    bend(s);
                                } else {
                                    reset(s);
                                }
                                draw(s);
                            });

                            window.requestAnimationFrame(loop);
                        };
                        loop();




                        function previewImage() {
                            const bukti = document.querySelector('#bukti');
                            const imgPreview = document.querySelector('.img-preview')

                            imgPreview.style.display = 'block';

                            const oFReader = new FileReader();
                            oFReader.readAsDataURL(bukti.files[0]);

                            oFReader.onload = function (oFREvent) {
                                imgPreview.src = oFREvent.target.result;
                            }

                        }
                    </script>

                </div>
            </div>
        </div>
    </div>
</div> 


@endsection