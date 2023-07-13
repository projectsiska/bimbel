<div class="ttr-sidebar">
    <div class="ttr-sidebar-wrapper content-scroll">
        <!-- side menu logo start -->
        <div class="ttr-sidebar-logo">
            <a href="#"><img alt="" src="{{ asset('assets/images/logo.png')}}" width="122" height="27"></a>
            <!-- <div class="ttr-sidebar-pin-button" title="Pin/Unpin Menu">
                <i class="material-icons ttr-fixed-icon">gps_fixed</i>
                <i class="material-icons ttr-not-fixed-icon">gps_not_fixed</i>
            </div> -->
            <div class="ttr-sidebar-toggle-button">
                <i class="ti-arrow-left"></i>
            </div>
        </div>
        <!-- side menu logo end -->
        <!-- sidebar menu start -->
        <nav class="ttr-sidebar-navi">
            <ul>
                <li>
                    <a href="../../dashboard" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-home"></i></span>
                        <span class="ttr-label">Dashborad</span>
                    </a>
                </li>

                @if(auth()->user()->level == "Administrator")
                <li>
                    <a href="#" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-user"></i></span>
                        <span class="ttr-label">User</span>
                        <span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('administrator.index')}}" class="ttr-material-button"><span class="ttr-label">Administrator</span></a>
                        </li>
                        <li>
                            <a href="{{route('guru.index')}}" class="ttr-material-button"><span class="ttr-label">Guru</span></a>
                        </li>
                        <li>
                            <a href="{{route('siswa.index')}}" class="ttr-material-button"><span class="ttr-label">Siswa</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('pembayaran.index')}}" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-book"></i></span>
                        <span class="ttr-label">Pembayaran</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-email"></i></span>
                        <span class="ttr-label">Biaya</span>
                        <span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('biaya.index')}}" class="ttr-material-button"><span class="ttr-label">Rincihan</span></a>
                        </li>
                        <li>
                            <a href="{{route('rekening.index')}}" class="ttr-material-button"><span class="ttr-label">Rekening</span></a>
                        </li>
                    </ul>
                </li>
                

                <li>
                    <a href="#" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-bookmark-alt"></i></span>
                        <span class="ttr-label">Pembelajaran</span>
                        <span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('kelas.index')}}" class="ttr-material-button"><span class="ttr-label">Kelas</span></a>
                        </li> 
                        <li>
                            <a href="{{route('absen.index')}}" class="ttr-material-button"><span class="ttr-label">Absen</span></a>
                        </li>
                        <li>
                            <a href="{{route('nilai.index')}}" class="ttr-material-button"><span class="ttr-label">Nilai</span></a>
                        </li> 

                        <li>
                            <a href="{{route('sertifikat.index')}}" class="ttr-material-button"><span class="ttr-label">Sertifikat</span></a>
                        </li> 

                    </ul>
                </li>

                <li>
                    <a href="#" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-comments"></i></span>
                        <span class="ttr-label">Tentang</span>
                        <span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('profil.index')}}" class="ttr-material-button"><span class="ttr-label">Profil</span></a>
                        </li>
                       
                    </ul>
                </li>

                <li>
                    <a href="#" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-layout-accordion-list"></i></span>
                        <span class="ttr-label">Laporan</span>
                        <span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('siswa.laporan-siswa') }}" class="ttr-material-button"><span class="ttr-label">Siswa</span></a>
                        </li>
                        <li>
                            <a href="{{ route('guru.laporan-guru') }}" class="ttr-material-button"><span class="ttr-label">Guru</span></a>
                        </li> 

                        <li>
                            <a href="{{ route('pembayaran.laporan-pembayaran') }}" class="ttr-material-button"><span class="ttr-label">Pembayaran</span></a>
                        </li> 
                    </ul>
                </li>

                @elseif(auth()->user()->level == "Pimpinan")

                <li>
                    <a href="{{ route('siswa.laporan-siswa') }}" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-book"></i></span>
                        <span class="ttr-label">Siswa</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('guru.laporan-guru') }}" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-user"></i></span>
                        <span class="ttr-label">Guru</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('pembayaran.laporan-pembayaran') }}" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-bookmark-alt"></i></span>
                        <span class="ttr-label">Pembayaran</span>
                    </a>
                </li>

                @elseif(auth()->user()->level == "Guru")

                <li>
                    <a href="../../absen" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-book"></i></span>
                        <span class="ttr-label">Absen</span>
                    </a>
                </li>

                <li>
                    <a href="../../nilai" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-bookmark-alt"></i></span>
                        <span class="ttr-label">Nilai</span>
                    </a>
                </li>


                <li>
                    <a href="../../kelas" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-comments"></i></span>
                        <span class="ttr-label">Kelas</span>
                    </a>
                </li>

                @endif

                
                
                
               
                <li class="ttr-seperate"></li>
            </ul>
            <!-- sidebar menu end -->
        </nav>
        <!-- sidebar menu end -->
    </div>
</div>