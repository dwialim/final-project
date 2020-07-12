@extends('layouts.master')

@section('content')
<style>
  p{
    margin-top: 0;
    margin-bottom: 0;
  }
  pre {
    margin-top: 0;
    margin-bottom: 0;
    overflow: auto;
  }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="row">
    <div class="col-3">
      <ul class="list-group">
        <li class="list-group-item"><a href="/" ><i class="fas fa-home"></i> Home</a></li>
        <li class="list-group-item list-group-item-warning"><a href="#" ><i class="fas fa-tags"></i> Tags</a></li>
        <li class="list-group-item list-group-item-warning"><a href="/user" ><i class="fas fa-user"></i> User</a></li>
      </ul>
    </div>
    <div class="col-9">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-lg-8 mt-2">
                    <h6 class="m-0 font-weight-bold text-primary">All Questions <span style="color:#000"> {{number_format($data->total())}} questions</span></h6>
                </div>
                <div class="col-lg-4">
                  <button class="btn btn-primary btn-sm float-right" id="btn_question"><i class="fas fa-sm fa-question"></i> Ask Question</button>
                </div>
            </div>
        </div>
        <div class="card-body">
          <table class="table table-striped" style="font-size: 14px">
            <tbody>
              @foreach ($data as $item => $row)
              <tr>
                <td class="text-center">
                  {{$row->votes}} <br>Votes<br> {{$row->answers}} <br>Answer
                </td>
                <td >
                  <a href="/detail/{{$row->id}}" style="font-size: 16px;font-weight: 600!important;">
                    {{$row->title}}
                  </a>
                    @if (Auth::id()==$row->user_id)
                    <button onclick="EDIT('{{ $row->id }}')" class="btn btn-warning btn-circle btn-sm">
                      <i class="fas  fa-edit"></i>
                    </button>
                    <form action="/stacloverload/quest/{{$row->id}}" method="POST" style="display: inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Delete ?')"><i class="fas fa-trash"></i> </button>
                    </form>
                    @endif
                    
                  <br>
                  <div>
                  {!!\Illuminate\Support\Str::words($row->content, $words = 30, $end = ' [...] ')!!}
                  </div>
                  
                  <?PHP
                    $tags = explode(" ",$row->tag);
                    foreach ($tags as $tag) {
                      echo '<a href="#" class="tags" title rel="tag">'.$tag.'</a>';
                    }
                  ?>
                  
                </td>
              </tr>
              @endforeach
               
            <tbody>
          </table>
          
          {{$data->links()}}
          
        </div>
      </div>
    </div>
  </div>
  
</div>
<!-- /.container-fluid -->
<div class="modal fade" id="MODAL_QUESTION">
  <div class="modal-dialog" style="min-width: 900px;">
    <form  method="post" id="frmEdit">
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
                <label>Title</label>
                <input type="text" class="form-control" name="title">
              </div>
              <div class="form-group">
                <label>Content</label>
                <textarea class="form-control" name="content" id="contents" rows="4"></textarea>
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
  CKEDITOR.replace('contents');
  $(function(){
    $("#btn_question").click(function(){
      $(".modal-title").text('Add Question');
      $("#frmEdit").attr('action','/stacloverload/quest/');
      $("#MODAL_QUESTION").modal('show');
    });
    
  });

  function EDIT($id){
    $.ajax({
      url: '/stacloverload/quest/'+$id,
      tye: 'GET',
      success: function(data){
        data = $.parseJSON(data);
        //console.log(data);
        $("[name='title']").val(data['title']);
        // $("[name='content']").val(data['content']);
        CKEDITOR.instances['contents'].setData(data['content']);
        $("[name='tag']").val(data['tag']);
        $("#MODAL_QUESTION").modal('show');
        $(".modal-title").text('Edit Question');
        $("#frmEdit").attr('action','/stacloverload/quest/'+$id);
      }
    })
  }

</script>
@endpush