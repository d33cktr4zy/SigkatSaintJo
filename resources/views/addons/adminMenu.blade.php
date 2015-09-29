<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="btn-group btn-group-justified">
                <ul class="dropdown-menu list-inline btn-group-justified"
                    role="menu"
                    aria-labelledby="dropdownMenu"
                    style="display: block; position: inherit; margin-bottom: 5px; *width: 180px;">
                    <li class="dropdown-submenu">
                        <a tabindex="-1"
                           href="#">Manajemen Konten <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a href="#">Manajemen Forum</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{!! url('manKategoriForum') !!}">Kategori</a>
                                    </li>
                                    <li>
                                        <a href="{!! action('ForumController@topIndex') !!}">Topik</a>
                                    </li>
                                    {{--<li>--}}
                                        {{--<a href="{!! action('ForumController@show') !!}">Post</a>--}}
                                    {{--</li>--}}
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#">Manajeman Pengumuman</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{!! action('PengumumanController@create') !!}">Buat Baru</a>
                                    </li>
                                    <li>
                                        <a href="{!! action('PengumumanController@index') !!}">Lihat Pengumuman</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#">Manajeman Berita</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{!! action('BeritaController@create') !!}">Buat Baru</a>
                                    </li>
                                    <li>
                                        <a href="{!! action('BeritaController@index') !!}">Lihat Berita</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#">Manajeman Bacaan dan Doa</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{!! action('BacaanController@create') !!}">Buat Baru</a>
                                    </li>
                                    <li>
                                        <a href="{!! action('BacaanController@index') !!}">Lihat Bacaan</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a tabindex="-1"
                           href="#">Manajemen Gereja <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a href="#">Manajemen Umat</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{!! action('UmatController@adminIndex') !!}">Lihat data Umat</a>
                                    </li>
                                    <li>
                                        <a href="{!! action('UmatController@create') !!}">Tambah Umat</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#">Manajemen Lingkungan</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{!! action('LingkunganController@adminIndex') !!}">Lihat Data Lingkungan</a>
                                    </li>
                                    <li>
                                        <a href="{!! action('LingkunganController@keluarga') !!}">Lihat Data Keluarga</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#">Kegiatan</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{!! action('KegiatanController@index') !!}">Lihat kegiatan</a>
                                    </li>
                                    <li>
                                        <a href="{!! action('KegiatanController@create') !!}">Tambah Baru</a>
                                    </li>
                                </ul>
                            </li>
                            {{--<li class="dropdown-submenu">--}}
                                {{--<a href="#">Pengurus</a>--}}
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li>--}}
                                        {{--<a href="#">Manajemen Pengurus</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#">Pengurus Lingkungan</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a tabindex="-1"
                           href="#">Manajemen User <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <a href="{!! action('UserController@list') !!}">Lihat Daftar User</a>
                            {{--<a href="{!! action('') !!}">Password Reset</a>--}}
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
