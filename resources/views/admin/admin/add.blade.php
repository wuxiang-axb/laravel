@extends('moban.admin')
@section('content')
			<!-- 内容 -->
			<div class="col-md-10">
				
				<ol class="breadcrumb">
					<li><a href="#"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
					<li><a href="#">用户管理</a></li>
					<li class="active">管理员添加</li>

					<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
				</ol>

				<!-- 面版 -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="{{ route('admin.index') }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> 管理员页面</a>
						<a href="create" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 添加管理员</a>
						
					</div>
					<div class="panel-body">
						@if(count($errors) > 0)
							<div class="alert alert-danger">
								<ul>
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						<form action="{{ route('admin.store') }}" method="post" >
							{{ csrf_field() }}
							<input type="hidden" name="_method" value="POST">
							<div class="form-group">
								<label for="">用户名：</label>
								<input type="text" name="name" class="form-control" >
							</div>

							<div class="form-group">
								<label for="">密码：</label>
								<input type="password" name="pass" class="form-control" >
							</div>

							<div class="form-group">
								<input type="submit" value="提交" class="btn btn-success">
								<input type="reset" value="重置" class="btn btn-danger">
							</div>

						</form>
					</div>
					
				</div>
			</div>
@endsection		