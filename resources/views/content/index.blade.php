@extends('layouts.master')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <div class="row">
              <div class="col-lg-12 mt-2">
                  <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
              </div>
          </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr style="text-align: center;">
                <th colspan="6">Judul</th>
              </tr>
            </thead>
            <tbody>
              <tr style="text-align: center;">
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
@endsection