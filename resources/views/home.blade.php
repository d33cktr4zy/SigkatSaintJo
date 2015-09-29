{{--{!! dd($pengumuman, $forum) !!}--}}
@extends('template.utama')
		@section('judul') {!! config('stjo.title') . " - Home" !!} @endsection
@section('content')
		<!-- Kontent Kiri -->
<div class="col-xs-9">
	@include('addons.carousel')
	@include('addons.beritaPanel')


	<!-- Hilite Pengumuman -->

		@include('addons.highlightPengumuman')
	<!-- end Hilight Pengumuman -->

	<!-- Latest forum -->
	 @include('addons.higlightsForum')
	<!-- end Latest forum -->

</div>
<!-- end Kontent Kiri -->

<!-- Sidebar -->
<div class="col-xs-3">
	@include('addons.publicSidebar')
	{{--@include('template.sidebar')--}}
</div>
<!-- end Sidebar -->
@stop
