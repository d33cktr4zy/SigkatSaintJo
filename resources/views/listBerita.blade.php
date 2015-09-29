@extends('template.utama')
{{--{{dd($beritas)}}--}}
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1 style="display: block;">Berita Gereja St. Joseph Medan</h1>
                <hr />
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                @foreach($beritas as $tanggal=>$berita)

                    <div class="row text-right">
                        <h3 style="padding-bottom: 0px; margin-bottom: 0px;">{!! \Carbon\Carbon::parse($tanggal)->formatLocalized('%A, %d %B %Y') !!}</h3>
                        <hr style="line-height: 10px;" class="" />
                    </div>
                    @foreach($berita as $news)
                        {{--{!! dd($news) !!}--}}
                        <div class="row">

                            <a href="{{url('/berita/' . $news['id_berita']) }}"><h4 style="display: block;" class="col-xs-8 text-danger">{!! $news['jdl_berita'] !!}.</h4></a>
                            <h5 class="col-xs-4 pull-right text-right"> {!! \Carbon\Carbon::parse($tanggal)->toTimeString() !!}</h5>
                            {{--<img src="file:///C:/Program%20Files%20(x86)/Pinegrow%20Web%20Designer/placeholders/img6.jpg" width="80" class="pull-left" style="display: inline-block;" height="80">--}}
                            <p class="pull-left text-justify" style="display: block;">{!!  preg_replace('/\n/', "</p><p>", str_limit($news['isi_berita'],200,'...')) !!}</p>
                            <hr class="hr-type-one">
                        </div>

                    @endforeach
                @endforeach
                {!! $beritas->render() !!}
            </div>

        </div>
    </div>
@endsection