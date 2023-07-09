<header class="header rs-nav header-transparent">

    <div class="sticky-header navbar-expand-lg">
        <div class="menu-bar clearfix" style="background:black; position:fixed">
            <div class="container clearfix">
                <!-- Header Logo ==== -->
                <div class="menu-logo">
                    <a href=""><img src="{{ asset('storage/foto/logo1.png') }}" alt=""></a>
                </div>
                <!-- Mobile Nav Button ==== -->
                <button class="navbar-toggler collapsed menuicon justify-content-end" type="button"
                    data-toggle="collapse" data-target="#menuDropdown" aria-controls="menuDropdown"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <!-- Author Nav ==== -->
                <div class="secondary-menu">
                    <div class="secondary-inner">
                        <ul>

                            @guest
                            <li> <a href="/login-home" class="btn-link">Login</i></a> </li>
                            <li> <a href="/register" class="btn-link">Register</a> </li>

                            @else

                            <li> <a href="/logout" class="btn-link">Logout</i></a> </li>

                            @endif

                        </ul>
                    </div>
                </div>
                <!-- Search Box ==== -->
                <div class="nav-search-bar">
                    <form action="#">
                        <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                        <span><i class="ti-search"></i></span>
                    </form>
                    <span id="search-remove"><i class="ti-close"></i></span>
                </div>
                <!-- Navigation Menu ==== -->
                <div class="menu-links navbar-collapse collapse justify-content-start" id="menuDropdown">
                    <div class="menu-logo">
                        <a href="index.html"><img src="{{ asset('storage/foto/logo2.png') }}" alt=""></a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/home">Home</i></a>

                        </li>
                        <li><a href="/profil-home">About</i></a></li>
                     



                        @guest

                        @else

                        <li><a href="/rekeningbayar">Rekening</a></li>
                        <li class="add-mega-menu"><a href="javascript:;">Pembayaran <i
                                    class="fa fa-chevron-down"></i></a>
                            <ul class="sub-menu add-menu">
                                <li class="add-menu-left">
                                    <h5 class="menu-adv-title">Pembayaran</h5>
                                    <ul>
                                        <li><a href="/riwayat">Riwayat</a></li>
                                        <li><a href="/pembayaran-home">Bayar</a></li>
                                    </ul>
                                </li>
                                {{-- <li class="add-menu-right">
                                    <img src="{{ asset('storage/foto/logo2.png') }}" alt="" />
                                </li> --}}
                            </ul>
                        </li>
                        @if(auth()->user()->level=="Siswa")
                        @if(auth()->user()->siswa->status=="Terdaftar")
                        <li class="add-mega-menu"><a href="javascript:;">Pembelajaran <i
                                    class="fa fa-chevron-down"></i></a>
                            <ul class="sub-menu add-menu">
                                <li class="add-menu-left">
                                    <h5 class="menu-adv-title">Pembelajaran</h5>
                                    <ul>
                                        <li><a href="/absen-home">Absen</a></li>
                                        <li><a href="/nilai-home">Nilai</a></li>
                                        <li><a href="/sertifikat-home">Sertifikat</a></li>
                                    </ul>
                                </li>
                                {{-- <li class="add-menu-right">
                                    <img src="{{ asset('storage/foto-foto/logo.jpg') }}" alt="" />
                                </li> --}}
                            </ul>
                        </li>
                        @endif
                        @endif
                        @endif

                    </ul>
                    <div class="nav-social-link">

                        <a href="/login">Login</i></a>
                        <a href="/register">Register</a>
                    </div>
                </div>
                <!-- Navigation Menu END ==== -->
            </div>
        </div>
    </div>
</header>