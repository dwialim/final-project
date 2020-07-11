@extends('layouts.master')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="row">
		<div class="col-3">
			<ul class="list-group">
				<li class="list-group-item"><a href="#" ><i class="fas fa-home"></i> Home</a></li>
				<li class="list-group-item list-group-item-warning"><a href="#" ><i class="fas fa-tags"></i> Tags</a></li>
				<li class="list-group-item list-group-item-warning"><a href="#" ><i class="fas fa-user"></i> User</a></li>
			</ul>
		</div>
		<div class="col-9">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<div class="row">
						<div class="col-lg-8 mt-2">
							<h6 class="m-0 font-weight-bold text-primary">Add Questions</h6>
						</div>
						<div class="col-lg-4">
							<a href="{{route('detail',$data->id)}}" class="btn btn-primary btn-sm float-right">Back</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<h4 style="color: blue;"><b>{{ $data->title }}</b></h4>
							<hr>
							<div class="row">
								<div class="col-md-12">
									<h5 class="black"><strong>{!! $data->content !!}</strong></h5>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<form action="{{url('detail/'.$data->id.'/comment')}}" method="post">
										@csrf
										<textarea name="content" rows="8" class="form-control"></textarea>
										<button type="submit" class="mt-3 btn btn-success">Post</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
@endsection