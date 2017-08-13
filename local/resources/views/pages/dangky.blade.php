@extends('pages.layout.index')
@section('content')
  <!-- Page Content -->
  <div class="container">

    <!-- slider -->
    <div class="row carousel-holder">
      <div class="col-md-2">
      </div>
      <div class="col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading">Đăng ký tham gia chương trình</div>
          <div class="panel-body">

            @if(count($errors)>0)
              <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                  {{$err}}<br/>
                @endforeach
              </div>
            @endif

            @if(session('thongbao'))
              <div class="alert alert-success">
                {{session('thongbao')}}
              </div>
            @endif

            <form action="pages/dangky" method="post">
              <input type="hidden" name="_token" value="{{csrf_token()}}"/>
              <div>
                <label>Họ tên (*) :</label>
                <input type="text" class="form-control" placeholder="Nhập họ tên đầy đủ" name="ten" aria-describedby="basic-addon1">
              </div>
              <br>
              <div>
                <label>Email (*) :</label>
                <input type="email" class="form-control" placeholder="Nhập email chính xác" name="email" aria-describedby="basic-addon1"
                >
              </div>
              <br>
              <div>
                <label>Số điện thoại (*) :</label>
                <input type="number" class="form-control" placeholder="(+84) Nhập số điện thoại" name="sodt" aria-describedby="basic-addon1"
                >
              </div>
              <br>
              <div>
                <label >Công việc :</label>
                <label class="radio-inline">
                  <input name="congviec" value="0" checked="" type="radio">Đi học
                </label>
                <label class="radio-inline">
                  <input name="congviec" value="1" type="radio">Đi làm
                </label>
              </div>
              <br>
              <div class="form-group">
                <label>Giới tính</label>
                <label class="radio-inline">
                  <input name="gioitinh" value="0" checked="" type="radio">Nữ
                </label>
                <label class="radio-inline">
                  <input name="gioitinh" value="1" type="radio">Nam
                </label>
              </div>
              <br>
              <div class="form-group">
                <label>Chọn ban (*)</label>
                <select class="form-control" name="ban">
                  @foreach($ban as $b)
                  <option value="{{$b->id}}">{{$b->ten}}</option>
                    @endforeach
                </select>
              </div>
              <br>
              <div>
                <label>Ghi chú :</label>
                <input type="text" class="form-control" placeholder="đóng góp của bạn về chương trình" name="ghichu" aria-describedby="basic-addon1">
              </div>
              <br>

              <button type="submit" class="btn btn-default">Đăng ký
              </button>

            </form>
          </div>
        </div>
      </div>
      <div class="col-md-2">
      </div>
    </div>
    <!-- end slide -->
  </div>
  <!-- end Page Content -->

@endsection