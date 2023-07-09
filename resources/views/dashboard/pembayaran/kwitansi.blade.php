<html>
<head>

    <title>Kwitansi Pembayaran</title>
    <style type="text/css">
            .lead {
                font-family: "Verdana";
                font-weight: bold;
            }
            .value {
                font-family: "Verdana";
            }
            .value-big {
                font-family: "Verdana";
                font-weight: bold;
                font-size: large;
            }
            .td {
                valign : "top";
            }

            /* @page { size: with x height */
            /*@page { size: 20cm 10cm; margin: 0px; }*/
            @page {
                size: A4;
                margin : 0px;
            }
    /*      @media print {
              html, body {
                width: 210mm;
              }
            }*/
            /*body { border: 2px solid #000000;  }*/
    </style>
    <script type="text/javascript">
        var beforePrint = function() {
        };

        var afterPrint = function() {
            document.location.href = '/pembayaran';
        };

        if (window.matchMedia) {
            var mediaQueryList = window.matchMedia('print');
            mediaQueryList.addListener(function(mql) {
                if (mql.matches) {
                    beforePrint();
                } else {
                    afterPrint();
                }
            });
        }

        window.onbeforeprint = beforePrint;
        window.onafterprint = afterPrint;
    </script>
</head>
<body>
    
    <table border="1px">
        <tr>
            <td width=""><img src="../../../storage/post-image/logo.jpeg" width="80px" style="padding: 10px;" /></td>
            <td>
                <table cellpadding="4">
                    
           <?php 

            function penyebut($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = penyebut($nilai - 10). " belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
        }     
        return $temp;
    }
 
    function terbilang($nilai) {
        if($nilai<0) {
            $hasil = "minus ". trim(penyebut($nilai));
        } else {
            $hasil = trim(penyebut($nilai));
        }           
        return $hasil;
    }
 
 
   

           ?>


@foreach($data as $p)

 
                    <tr >
                        <td colspan="2"><div class="lead">  &nbsp;<center><h2><b>SMP Baiturrahim Kota Jambi<b></h2><center>&nbsp; <hr></td>
                        
                    </tr>
                     

                     <tr>
                        <td width="200px"><div class="lead">No kwitansi:  </td>
                        <td><div class="value">{{$p->slug}}/{{$p->id}}</div></td>
                    </tr>
                    <tr>
                        <td><div class="lead">Telah terima dari: </div></td>
                        <td><div class="value">{{$p->siswa->nama_siswa}}</div></td>
                    </tr>
                    <tr>
                        <td><div class="lead">Untuk Pembayaran:</div></td>
                        <td><div class="value">SPP Bulan {{$p->bulan}} {{$p->tahun}}</div></td>
                    </tr>
                    <tr>
                        <td><div class="lead">Tanggal:</div></td>
                        <td><div class="value">{{date($p->updated_at)}}</div></td>
                    </tr>
                    <tr>
                        <td><div class="lead">Rupiah:</div></td>
                        <td><div class="value-big">{{($total = $p->total)}}</div></td>
                    </tr>
                    <tr>
                        <td><div class="lead">Uang Sejumlah:</div></td>
                        <td><div class="value"> {{ terbilang($total);}} </div></td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td><div class="lead">Penerima:</div></td>
                        <td><img src="../../../storage/post-image/lunas.png" width="200px" /></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>____________________________________________________</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><div class="value">Administrator</div></td>
                    </tr> 
                    @endforeach
                </table>
            </td>
        </tr>
    </table>
    <hr> 
    <script src="/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            window.print();
        });
    </script>
</body>
</html>