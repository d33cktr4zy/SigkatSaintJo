@extends('template.utama')

@section('content')
<div class="container-fluid">
	<h1>Input Pengumuman</h1>
	<hr>
	{!! Form::Model !!}
	<form role="form" style="display: block;">
		<div class="form-group">
			<label class="control-label" for="exampleInputEmail1">Nama Kegiatan</label>
			<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Kegiatan">
		</div>
		<div class="row" style="display: block;">
			<div class="col-md-12 col-sm-12 col-xs-12" style="display: block;">
				<div class="col-md-5" style="display: block;">
					<div class="form-group form-inline" style="display: block;">
						<label class="control-label" for="tglMulai">Tanggal</label>
						<input type="password" class="form-control form-tanggal" placeholder="Password" id="tglMulai" size="2" maxlength="2" style="display: inline-block;">
						<input type="password" class="form-control form-tanggal" id="tglMulai " placeholder="Password" maxlength="2" size="2" style="display: inline-block;">
						<input type="password" class="form-control form-tanggal" placeholder="Password" size="4" maxlength="4" style="display: inline-block;">
					</div>
				</div>
				<div class="col-md-6" style="display: block;">
					<div class="form-group form-inline" style="display: block;">
						<label class="control-label" for="formInput434">Jenis Pengumuman</label>
						<select id="formInput434" class="form-control">
							<option>1</option>
							<option>2</option>
							<option>3</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<textarea class="form-control input-lg" rows="12"></textarea>
		<div class="form-group">
			<label class="control-label" for="formInput426">Field label</label>
			<textarea class="form-control" rows="3" id="formInput426"></textarea>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-default">Batal</button>
			<button type="button" class="btn btn-default">Kirim</button>
		</div>
	</form>
</div>
@stop
