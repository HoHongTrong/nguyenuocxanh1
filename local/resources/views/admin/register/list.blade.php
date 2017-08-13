@extends('admin.layout.index')
@section('content')

<div id="wrapper">


  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Danh sách
            <small>Đăng ký</small>
          </h1>
        </div>
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
          <tr align="center">
            <th>ID</th>
            <th>Họ và Tên</th>
            <th>Số ĐT</th>
            <th>email</th>
            <th>Công Việc</th>
            <th>Giới Tính</th>
            <th>Ban</th>
          </tr>
          </thead>
          <tbody>
          @foreach($dangky as $da)
          <tr class="odd gradeX" align="center">
            <td>{{$da->id}}</td>
            <td>{{$da->ten}}</td>
            <td>{{$da->sodt}}</td>
            <td>{{$da->email}}</td>
            <td>
              @if($da->congviec == 0)
                {{'Đi học'}}
              @else
                {{'Đi làm'}}
              @endif
            </td>
            <td>
              @if($da->gioitinh == 0)
                {{'Nữ'}}
              @else
                {{'Nam'}}
              @endif
            </td>

            <td>{{$da->ban->ten}}</td>
          </tr>
            @endforeach
          <a href="download" class="btndownload"  >
            <input type="button" value="Download view "/>
          </a>

          </tbody>
        </table>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
@endsection