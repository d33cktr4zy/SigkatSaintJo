@extends('template.utama')

@section('content')
<div class="container-fluid" id="mainContainer">
    <!-- Header Section -->
    <div class="container" id="header">
        <div class="row vertical-center" id="top-nav">
            <div class="col-xs-5">
                <!-- decide login or not -->
                <div id="sessionNote" class="">
                    <!-- Loggedin -->

                    <p>Hi, <a href="http://saintjoseph.con/user/profile">Gabriel Fermy</a>!! |
                        <a href="http://saintjoseph.con/logout">Logout</a>

                       &nbsp; <a href="#">Manajemen Situs</a>
                    </p>
                </div>
            </div>
        </div>	<div class="row vertical-center" id="head-banner">
            <div class="col-xs-12"></div>
        </div>	<div class="row vertical-center" id="navi-bar">
            <div class="col-lg-9" id="navi">
                <a href="http://saintjoseph.con/">
                    <button type="button" class="btn btn-default">Home
                    </button>
                </a>
                <a href="http://saintjoseph.con/forum/index">
                    <button type="button" class="btn btn-default">Forum
                    </button>
                </a>

                <div class="btn-group dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Sakramen
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="http://saintjoseph.con/sakramen/sakramenPermandian">
                                Sakramen Permandian
                            </a>
                        </li>
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="http://saintjoseph.con/sakramen/sakramenKrisma">
                                Sakramen Krisma
                            </a>
                        </li>
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="http://saintjoseph.con/sakramen/sakramenPerkawinan">
                                Sakramen Perkawinan
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        Kategorial
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="http://saintjoseph.con/kategorial/orangMudaKatolik%28OMK%29">
                                Orang Muda Katolik (OMK)
                            </a>
                        </li>
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="http://saintjoseph.con/kategorial/anakSekolahMingguKatolik%28ASMIKA%29">
                                Anak Sekolah Minggu Katolik (ASMIKA)
                            </a>
                        </li>
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="http://saintjoseph.con/kategorial/anakRemajaKatolik%28AREKA%29">
                                Anak Remaja Katolik (AREKA)
                            </a>
                        </li>
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="http://saintjoseph.con/kategorial/misdinar">
                                Misdinar
                            </a>
                        </li>
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="http://saintjoseph.con/kategorial/perkumpulanBapakBapakKatolik%28KOMPAK%29">
                                Perkumpulan Bapak-Bapak Katolik (KOMPAK)
                            </a>
                        </li>
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="http://saintjoseph.con/kategorial/perkumpulanIbuIbuKaotolik%28PIK%29">
                                Perkumpulan Ibu-Ibu Kaotolik (PIK)
                            </a>
                        </li>
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="http://saintjoseph.con/kategorial/perkumpulanDoaNarwastu">
                                Perkumpulan Doa Narwastu
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        St. Joseph
                    </button>
                    <ul class="dropdown-menu" role="menu">

                        <li role="presentation"><a role="menuitem" tabindex="-1" href="http://saintjoseph.con/about/stasi">Tentang Stasi
                                                                                                                           St. Joseph
                                                                                                                           Dr.
                                                                                                                           Mansyur</a>
                        </li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="http://saintjoseph.con/about/dps">Dewan Pengurus
                                                                                                                         Stasi</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-3">


            </div>
        </div></div>
    <!-- Header selesai -->

    <!-- konten mulai
         konten tidak dalam file tersendiri karena nanti di render di halaman ini dengan yield
    -->
    <div class="container" id="konten">
        <div class="row" id="isi">
            <div class="col-lg-12">
                <!-- Ini Isi Konten -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Edit User Data</h1>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <div class="col-sm-2">
                                        <label for="username" class="control-label">Username</label>
                                    </div>
                                    <div class="col-sm-5">
                                        <input class="form-control" id="username" placeholder="Username" type="text">
                                    </div>
                                    <div class="col-sm-5">
                                        <input class="form-control" id="userid" placeholder="UserID" type="text">User ID</div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2 text-right">
                                        <label for="namaDepan" class="control-label">Email</label>
                                    </div>
                                    <div class="col-sm-5">
                                        <input class="form-control" id="namaDepan" placeholder="Nama Depan" type="text">
                                    </div>
                                    <div class="col-sm-5">
                                        <input class="form-control" id="namaBelakang" placeholder="Nama Belakang" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2 text-right">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <div class="col-sm-5">
                                        <input class="form-control" id="password" placeholder="Password" type="password">
                                    </div>
                                    <div class="col-sm-5">
                                        <input class="form-control" id="confirm" placeholder="Password" type="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2 text-right">
                                        <label for="tempatLahir" class="control-label">Tempat/Tanggal Lahir</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input class="form-control" id="tempatLahir" placeholder="Tempat Lahir" type="text">
                                    </div>

                                    <div class="col-sm-4">
                                        <input class="form-control" id="thnLahir" placeholder="Tahun" type="text">
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="radio">
                                            <label class="radio-inline">
                                                <input name="jk" type="radio">Laki-laki</label>
                                            <label class="radio-inline">
                                                <input name="jk" type="radio">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2 text-right">
                                        <label for="alamat" class="control-label">Alamat</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="alamat" placeholder="Alamat" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2 text-right">
                                        <label for="kota" class="control-label">Kota</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input class="form-control" id="kota" placeholder="Kota" type="text">
                                    </div>
                                    <div class="col-sm-2 text-right">
                                        <label for="kodePos" class="control-label">Kode Pos</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input class="form-control" id="kodePos" placeholder="Kode Pos" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2 text-right">
                                        <label for="uLevel" class="control-label">User Level</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <select class="form-control" id="sel1">
                                            <option selected="selected" value="0">User</option>
                                            <option value="1">Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-8 col-sm-2">
                                        <button type="cancel" class="btn btn-block btn-danger">Batal</button>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-block btn-default">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-2">
                            <div class="col-md-12" id="gambarHolder">
                                <img src="Sistem%20Informasi%20Gereja%20Katolik_files/placeholder.png" alt="" width="267" height="200" class="img-responsive">
                            </div>
                            <div class="col-sm-12">
                                <button type="cancel" class="btn btn-block btn-danger">Foto</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection