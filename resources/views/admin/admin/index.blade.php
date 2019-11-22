@extends('moban.admin')
@section('content')
<!-- 内容 -->
			<div class="col-md-10">
				
				<ol class="breadcrumb">
					<li><a href="#"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
					<li><a href="#">管理员管理</a></li>
					<li class="active">管理员列表</li>

					<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
				</ol>

				<!-- 面版 -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> 批量删除</button>
						<a href="" class="btn btn-success" data-toggle="modal" data-target="#add">
							<span class="glyphicon glyphicon-plus"></span> 添加管理员
						</a>
						
						<p class="pull-right tots" >共有 10 条数据</p>
						<form action="javascript:;" class="form-inline pull-right">
							<div class="form-group">
								<input type="text" name="" class="form-control" placeholder="请输入你要搜索的内容" id="">
							</div>
							
							<input type="submit" value="搜索" class="btn btn-success">
						</form>


					</div>
					<table class="table-bordered table table-hover">
						<th><input type="checkbox" name="" id=""></th>
						<th>ID</th>
						<th>NAME</th>
						<th>PASS</th>
						<th>上次登录时间</th>
						<th>状态</th>
						<th>操作</th>
						@foreach($admins as $admin)
							<tr>
								<td><input type="checkbox" name="" id=""></td>
								<td>{{$admin->id}}</td>
								<td>{{$admin->name}}</td>
								<td>{{$admin->pass}}</td>
								<td>{{$admin->time}}</td>
								<td><span class="btn btn-success">开启</span></td>
								<td>
									<a href="{{route('admin.edit',$admin->id)}}" class="glyphicon glyphicon-pencil"></a>&nbsp;&nbsp;&nbsp;
									<a >
									<form action="{{ route('admin.destroy',$admin->id) }}" method="post" >
										{{csrf_field()}}
										<input type="hidden" name="_method" value="delete">
										<button type="submit" class="glyphicon glyphicon-trash"></button>

									</form>
									</a>
								</td>	
							</tr>
						@endforeach
						

					</table>
					<!-- 分页效果 -->
					<div class="panel-footer">
						
						<nav style="text-align:center;">
							{{$admins->links()}}
						</nav>

					</div>
				</div>
			</div>

				<!-- 添加管理员摸态框 -->
				<div class="modal fade" id="add">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title">添加管理员</h4>
							</div>
							<div class="modal-body">
								<form action="" onsubmit="return false;" id="formAdd">
									<div class="form-group">
										<label for="">用户名：</label>
										<input type="text" name="name" class="form-control" placeholder="请输入用户名" >
									</div>
									<div class="form-group">
										<label for="">密码：</label>
										<input type="password" name="pass" class="form-control" placeholder="请输入密码" i>
									</div>
									<div class="form-group">
										<label for="">确认密码：</label>
										<input type="password" name="repass" class="form-control" placeholder="请再次输入密码" >
									</div>
									<div class="form-group">
										<label for="">状态：</label><br>
										<input type="radio" name="status" checked value='0'>正常   
										<input type="radio" name="status" value='1'>禁用 
									</div>
									<div class="form-group pull-right">
										<input type="submit" value="提交" onclick="add()" class="btn btn-success">
										<input type="reset" id="reset" value="重置" class="btn btn-danger">
									</div>

									<div style="clear:both"></div>
								</form>
							</div>
							
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

	<script type="text/javascript">
		//添加会员处理
		function add(){
			//表单序列化
			str= $("#formAdd").serialize();
			
			
			//提交数据到下一个页面
			$.post('/admin/admin',{str:str,'_token':'{{csrf_token()}}'},function(data){
				if(data){
					$(".close").click();
					$("#reset").click();
				}else{
					alert('添加失败');
				}
			});	
		}
	</script>


@endsection			