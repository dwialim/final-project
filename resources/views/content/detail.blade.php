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
              <h6 class="m-0 font-weight-bold text-primary">Detail Questions</h6>
            </div>
            <div class="col-lg-4">
              <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm float-right">Back</a>
            </div>
          </div>
        </div>
        <div class="card-body">

          {{-- Questions --}}
          <div class="row">
            <div class="col-md-12">
              @foreach($data as $key => $p)
              <h4 style="color: blue;"><b>{{ $p->title }}</b></h4>
              <hr>
                <div class="row">
                  <div class="col-md-1" style="text-align: center;">
                    <div class="row">
                      <div class="col-md-12">
                        <button type="sumbit" class="btn shadow-none" value="edit">
                          <a class="arr" href="#"><i class="fas fa-arrow-up"></i></a>
                        </button>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        0
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <button type="sumbit" class="btn shadow-none" value="edit">
                          <a class="arr" href="#"><i class="fas fa-arrow-down"></i></a>
                        </button>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-11">
                    <div class="row">
                      <div class="col-md-12">
                        <h5 class="black"><strong>{!! $p->content !!}</strong></h5>
                      </div>
                    </div>

                      @foreach($p->komentar as $comment)
                        <div class="row">
                          <div class="col-md-12" style="text-align: justify;">
                            <p class="size"><em>{{ $comment }}</em></p>
                            <hr>
                          </div>
                        </div>
                      @endforeach
                    <div class="row">
                      <div class="col-md-12">
                        <a href="#" class="tags" title rel="tag">{{ $p->tag}}</a>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 mt-2">
                        <a href="{{url('detail/'.$p->id.'/comment')}}" class="comments-link disabled-link">add a comment</a>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
          {{-- /end question --}}

          {{-- Answer --}}
          <div class="row mt-3">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <h2>{{App\comment::all()->count()}} Answers</h2>
                </div>
              </div>
              @foreach($data as $key => $p)
                <div class="row mt-2">
                  <div class="col-md-1" style="text-align: center;">
                    <div class="row">
                      <div class="col-md-12">
                        <button type="sumbit" class="btn shadow-none" value="edit">
                          <a class="arr" href="#"><i class="fas fa-arrow-up"></i></a>
                        </button>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        0
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <button type="sumbit" class="btn shadow-none" value="edit">
                          <a class="arr" href="#"><i class="fas fa-arrow-down"></i></a>
                        </button>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-11">
                    <div class="row">
                      <div class="col-md-12">
                        <h5 class="black"><strong>Ini adalah sebuah jawaban</strong></h5>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12" style="text-align: justify;">
                        <p class="size"><em>Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak. Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak. Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak.</em></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 mt-2">
                        <a href="{{url('detail/'.$p->id.'/comment')}}" class="comments-link disabled-link">add a comment</a>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach 
            </div>
          </div>
          {{-- /end answer --}}
          <br>
          <br>

          <form method="post" id="" action="saveanswer">
          @csrf
          <h2>Your Answer</h2>
          <textarea name="createanswer" id="createanswer"></textarea>
          @push('scripts')
          <script>CKEDITOR.replace('createanswer');
          </script>
          @endpush
          <br>
          <button type="submit" class="btn btn-primary btn-sm float-left">Post Your Answer</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
@endsection