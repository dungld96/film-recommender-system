@extends('admin.layouts.admin-lte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Danh sách phim
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Danh sách phim</h3>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Thêm phim</button>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
				<div class="row">
					<div class="col-sm-6"></div>
					<div class="col-sm-6"></div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
							<thead>
								<tr role="row">
									<th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">STT</th>

									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Tiêu đề</th>

									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Thể loại</th>
									<th>Tùy chọn</th>
									
								</tr>
							</thead>
							<tbody>
								@foreach ($objMovies as $m)
								<tr role="row" class="odd">
									<td>{{$loop->iteration}}</td>
									<td>{{$m->title}}</td>
									<td>{{$m->genres}}</td>
									<td><a href="{{route('edit',['movie_id' => $m->movieId])}}">Sửa</a>/<a href="{{route('delete',['movie_id' => $m->movieId])}}">Xóa</a></td>
								</tr>
								@endforeach

							</tbody>

						</table>
					</div>
				</div>
				<div class="row">
					<!-- paginate -->
					<div class="col-md-12">
						<!--pagination-->
						<div class="text-center">
							{!! $objMovies->links() !!}
						</div>
						<!--pagination-->
					</div>
				</div>
			</div>
		</div>
		<!-- /.box-body -->
	</div>
	<!-- Modal -->
	<form action="{{ route('add-movie')}}" method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Modal Header</h4>
					</div>
					<div class="modal-body">
							<input type="hidden"  name="movieId" value="
							@php
								echo(rand(200000,500000));
							@endphp
							">

						<div class="form-group">
							<label for="tite">Tiêu đề</label>
							<input type="text" class="form-control" name="title" id="tite" placeholder="Tiêu đề">
						</div>
						<div class="form-group">
							<label for="genres">Thể loại</label>
							<input type="text" class="form-control" name="genres" id="genres" placeholder="Thể loại">
						</div>
					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Lưu</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>

					</div>
				</div>

			</div>
		</div>
	</form>

</section>
<!-- /.content -->
@endsection
