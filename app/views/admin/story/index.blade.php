@extends('admin.layout.default')
@section('title')
{{ $title='Quản lý truyện' }}
@stop

@section('content')
	<div class="row margin-bottom">
		<div class="col-xs-12">
			<a href="{{ action('StoryController@create') }}" class="btn btn-primary">Thêm mới</a>
		</div>
	</div>
<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Danh sách truyện</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding">
		  <table class="table table-hover">
			<tr>
				<th>ID</th>
				<th>Tên truyên</th>
				<th>Parent</th>
				<th>Thể loại</th>
				<th>Người đăng</th>
				<th>Trạng thái</th>
				<th>Ngày đăng</th>
				<th>Action</th>
			</tr>
			@foreach($data as $key => $value)
			<tr>
				<td>{{ $value->id }}</td>
				<td>{{ getnameParent('Story',$value->id, $value->parent_id) }}</td>
				<td>{{ CommonOption::getNameOption('Story', $value) }}</td>
				<td>{{ Category::find($value->category_id)->name }}</td>
				<td>{{ User::find($value->user_id)->username }}</td>
				<td>{{ getStatus($value->status) }}</td>
				<td>{{ $value->created_at }}</td>
				<td >
					<a href="{{ action('StoryController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
					{{ Form::open(array('method'=>'DELETE', 'action' => array('StoryController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
					<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
					{{ Form::close() }}
					<a href="{{ action('StoryController@show', $value->id) }}" class="btn btn-primary">View</a>
			  </td>
			</tr>
			@endforeach
		  </table>
		</div>
		<!-- /.box-body -->
	  </div>
	  <!-- /.box -->
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<ul class="pagination">
		<!-- phan trang -->
		{{ $data->appends(Request::except('page'))->links() }}
		</ul>
	</div>
</div>

@stop

