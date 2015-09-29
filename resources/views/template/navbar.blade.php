<div class="row vertical-center"
     id="navi-bar">
    <div class="col-lg-9"
         id="navi">
        <a href="{!! action('HomeController@index') !!}">
            <button type="button"
                    class="btn btn-default">Home
            </button>
        </a>
        <a href="{!! route('forum') !!}">
            <button type="button"
                    class="btn btn-default">Forum
            </button>
        </a>

        <div class="btn-group dropdown">
            <button
                    type="button"
                    class="btn btn-default dropdown-toggle"
                    data-toggle="dropdown"
                    aria-expanded="false">Sakramen
            </button>
            <ul
                    class="dropdown-menu"
                    role="menu">
                @foreach ( stjo\Model\Sakramen::all() as $sakramen)
                    <li role="presentation">
                        <a
                                role="menuitem"
                                tabindex="-1"
                                href="{!! url('sakramen/'.camel_case($sakramen->nm_sakramen)) !!}">
                            {!! $sakramen->nm_sakramen !!}
                        </a>
                    </li>
                @endforeach

            </ul>
        </div>
        <div class="btn-group">
            <button
                    type="button"
                    class="btn btn-default dropdown-toggle"
                    data-toggle="dropdown"
                    aria-expanded="false">
                Kategorial
            </button>
            <ul class="dropdown-menu"
                role="menu">
                @foreach( stjo\Model\Kategorial::all() as $kategorial)
                    <li role="presentation">
                        <a role="menuitem"
                           tabindex="-1"
                           href="{!! url('kategorial/' .camel_case($kategorial->nm_kategorial)) !!}">
                            {!! $kategorial->nm_kategorial !!}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="btn-group">
            <button type="button"
                    class="btn btn-default dropdown-toggle"
                    data-toggle="dropdown"
                    aria-expanded="false">
                St. Joseph
            </button>
            <ul class="dropdown-menu"
                role="menu">

                <li role="presentation"><a role="menuitem"
                                           tabindex="-1"
                                           href="{!! url('about/stasi') !!}">Tentang Stasi
                                                                             St. Joseph
                                                                             Dr.
                                                                             Mansyur</a>
                </li>
                <li role="presentation"
                    class="divider"></li>
                <li role="presentation"><a role="menuitem"
                                           tabindex="-1"
                                           href="{!! url('about/dps') !!}">Dewan Pengurus
                                                                           Stasi</a></li>
            </ul>
        </div>
    </div>
    <div class="col-xs-3">
        {{--<div>--}}
            {{--<div class="form-group"--}}
                 {{--id="searchBox">--}}
                {{--{!! Form::text('cari',null,['class' => 'form-control','placeholder' => 'Cari Berita']) !!}--}}

            {{--</div>--}}

        {{--</div>--}}
    </div>
</div>