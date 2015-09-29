@extends('template.utama')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				@include('addons.adminMenu')
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<h1>Manajemen Forum</h1>
				<hr style="display: block;">
				<h2 style="display: block;">Forum Kategori</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-4">
				{!! Form::open(['role'=>'form']) !!}
					<div class="form-group">
						<label class="control-label" for="namaKategori">Nama Kategori</label>
						@if(isset($edit))
							<input type="text" class="form-control" id="namaKategori" placeholder="Nama Kategori" name="namaKategori" value="{!! $katEdit->nm_kategori !!}">
						@else
							<input type="text" class="form-control" id="namaKategori" placeholder="Nama Kategori" name="namaKategori">
						@endif

						{!! $errors->first('namaKategori', '<span class="help-block">:message</span>') !!}
						@if(isset($edit))
						{!! Form::hidden('id',$katEdit->id_kategori) !!}
						@endif
					</div>
					<div class="form-group">
						<label class="control-label crsa-selected" for="desc">Deskripsi Kategori</label>
						@if(isset($edit))
							<textarea class="form-control" rows="4" id="desc" name="desc">{!! $katEdit->kat_desc !!}</textarea>
						@else
							<textarea class="form-control" rows="4" id="desc" name="desc"></textarea>
						@endif

					</div>
					<div class="btn-group pull-right">
						<button type="button" class="btn btn-danger">Batal</button>
						@if(isset($edit))
							<button type="submit" class="btn btn-primary" name="edit" value="edit">Simpan</button>
						@else
							<button type="submit" class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
						@endif

					</div>
				{!! Form::close() !!}
			</div>
			<div class="col-xs-8">
				<div class="row">
					<table class="table">
						<thead>
						<tr>
							<th>id</th>
							<th>Nama Kategori</th>
							<th>Deskripsi</th>
							<th>Last Post</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						@foreach($kat as $kategori)

						<tr>
							<td>{!! $kategori->id_kategori !!}</td>
							<td>{!! $kategori->nm_kategori !!}</td>
							<td>{!! $kategori->kat_desc !!}</td>
							<td>@if(!is_null($kategori->id_last_post))
								{!! $kategori->id_last_post !!}
									@else
								--
									@endif
							</td>
							<td>
								<a href="/admin/forum/kategori/{!! $kategori->id_kategori !!}"><i class="fa fa-pencil"></i></a>
								&nbsp;
								<a href="#" data-href="/admin/forum/kategori/{!! $kategori->id_kategori !!}" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>
						@endforeach
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<ul class="pager list-inline">
							<li class="previous">
								<a href="{!! $kat->previousPageUrl() !!}">Previous</a>
							</li>

							<li class="next">
								<a href="{!! $kat->nextPageUrl() !!}">Next</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{--modal confirmasi--}}
	<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
				</div>
				<div class="modal-body">
					<p>Anda akan menghapus record.</p>
					<p>Anda yakin?</p>
					<p class="debug-url"></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<a class="btn btn-danger btn-ok">Delete</a>
				</div>
				<script>
					$('#confirm-delete').on('show.bs.modal', function(e) {
						$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

						$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
					});
				</script>
			</div>
		</div>
	</div>
@stop