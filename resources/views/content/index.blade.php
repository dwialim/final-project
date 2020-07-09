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
                    <h6 class="m-0 font-weight-bold text-primary">All Questions</h6>
                </div>
                <div class="col-lg-4">
                  <button class="btn btn-primary btn-sm float-right" id="btn_question"><i class="fas fa-sm fa-question"></i> Ask Question</button>
                </div>
            </div>
        </div>
        <div class="card-body">
          <table class="table table-striped" style="font-size: 14px">
            <tbody>
              <tr>
                <td class="text-center">
                  0 <br>Votes<br> 0 <br>Answer
                </td>
                <td >
                  <a href="#" style="font-size: 16px;font-weight: 600!important;">Judul how can i compare aws lambda to regular function</a><br>
                  Isi What is AWS lambda function, can any one give a simple example just be able to compare it with regular function in javascript I tried to read documentation but it little bit confused me<br>
                  <button class="btn btn-sm btn-info">PHP</button>
                  <button class="btn btn-sm btn-info">MySQL</button>
                </td>
              </tr>  
              <tr>
                <td class="text-center">
                  0 <br>Votes<br> 0 <br>Answer
                </td>
                <td >
                  <a href="#" style="font-size: 16px;font-weight: 600!important;">Judul how can i compare aws lambda to regular function</a><br>
                  <p>Aditia on May 30, 2020</p>
                  Isi What is AWS lambda function, can any one give a simple example just be able to compare it with regular function in javascript I tried to read documentation but it little bit confused me<br>
                  <button class="btn btn-sm btn-info">PHP</button>
                  <button class="btn btn-sm btn-info">MySQL</button>
                </td>
              </tr>  
            <tbody>
          </table>
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end" style="margin-right: 20px!important;">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
  
</div>
<!-- /.container-fluid -->
<div class="modal fade" id="MODAL_QUESTION">
  <div class="modal-dialog" style="min-width: 900px;">
    <form action="#" method="post">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>JUDUL</label>
                <input type="text" class="form-control" name="judul">
              </div>
              <div class="form-group">
                <label>ISI</label>
                <textarea class="form-control" name="isi" id="isi" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label>TAGS</label>
                <input type="text" class="form-control" name="tag">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endsection
@push('scripts')

<script>
  // Swal.fire({
  //   title: 'Berhasil!',
  //   text: 'Memasangkan script sweet alert',
  //   icon: 'success',
  //   confirmButtonText: 'Cool'
  // });
  CKEDITOR.replace('isi');
  $(function(){
    $("#btn_question").click(function(){
      $("#MODAL_QUESTION").modal('show');
    });
  });
</script>
@endpush