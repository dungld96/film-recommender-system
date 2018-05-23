@extends('admin.layouts.admin-lte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Sửa phim {{$movie->title}}
		
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<form action="{{ route('save_edit') }}" method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="movieId" value="{{$movie->movieId}}">
		<div class="form-group">
			<label for="tite">Tiêu đề</label>
			<input type="text" class="form-control" name="title" id="tite" placeholder="Tiêu đề" value="{{$movie->title}}">
		</div>
		<div class="form-group">
			<label for="genres">Thể loại</label>
			<input type="text" class="form-control" name="genres" id="genres" placeholder="Thể loại" value="{{$movie->genres}}">
		</div>
		<button type="submit" class="btn btn-primary">Lưu</button>
		<a href="{{ route('quan-ly-phim') }}"><button type="button" class="btn btn-danger">Hủy</button></a>
		
	</form>
</section>
<!-- /.content -->
@endsection