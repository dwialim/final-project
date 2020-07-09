@extends('layouts.master')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="row">
    <div class="col-3">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
          <ul class="list-group">
            <li class="list-group-item"><a href="#" ><i class="fas fa-home"></i> Home</a></li>
            <li class="list-group-item list-group-item-warning">Tags</li>
            <li class="list-group-item list-group-item-warning"><a href="#" ><i class="fas fa-user"></i> User</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-9">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <h6 class="m-0 font-weight-bold text-primary">All Questions</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
          
        </div>
      </div>
    </div>
  </div>
    <!-- DataTales Example -->
    

  </div>
  <!-- /.container-fluid -->
@endsection