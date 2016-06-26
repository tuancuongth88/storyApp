@extends('admin.layout.default')
@section('title')
{{ $title='Sửa truyện' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('StoryController@index') }}" class="btn btn-success">Danh sách</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			{{ Form::open(array('action' => array('StoryController@update', $data->id), 'method' => 'PUT')) }}
				<div class="box-body">
					<div class="form-group">
						<label>Parent</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::select('parent_id', CommonOption::getOption('Story'), $data->parent_id, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label>Tên Truyện</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('name', $data->name, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label>Thể loại</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::select('category_id', Category::all()->lists('name', 'id'), $data->category_id, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
						<label for="description">Nội dung tin</label>
						<div class="row">
							<div class="col-sm-12">
							   {{ Form::textarea('description', $data->description , array('class' => 'form-control',"rows"=>6, 'id' => 'editor1')) }}
							</div>
						</div>
					</div>
				<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
@include('admin.common.ckeditor')
@stop
