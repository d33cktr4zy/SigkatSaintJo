@section('topScripts')
    @parent
    {!! Html::script('//code.jquery.com/jquery-2.1.1.min.js') !!}
    {!! Html::script('//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js') !!}
    {!! Html::script('//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js') !!}

@endsection

@include('addons.publicSidebarKalender')

<div class="row">
    <div class="col-xs-12">
    </div>
</div>

@include('addons.publicSidebarPengumuman')
<div class="row">
    <div class="col-xs-12">
    </div>
</div>

@include('addons.publicSidebarBacaan')
<div class="row">
    <div class="col-xs-12">
    </div>
</div>

@include('addons.publicSidebarData')

<div class="row">
    <div class="col-xs-12">
    </div>
</div>
