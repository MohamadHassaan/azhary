
@extends('admin.layouts.home')

@section('content')


<div>
    <div>
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">إضافة مستخدم جديد</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @if (count($errors)>0)
  @foreach ($errors->all() as $error)
      <div class="alert alert-danger">
        {{$error}}
      </div>
    
  @endforeach    
@endif
    <form role="form" action="{{route('adduser.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">ادخل الاسم</label>
                <input type="text" class="form-control" name="name" id="inputname" placeholder="Enter Your Name">
              </div>
            <div class="form-group">
              <label for="exampleInputEmail1">الايميل</label>
              <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">الرقم السري</label>
              <input type="password" class="form-control" name="password" id="InputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="exampleInputFile">صورة المستخدم</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="photo" id="InputFile">
                  <label class="custom-file-label" for="exampleInputFile">إختر الصورة</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text" id="">رفع الصورة</span>
                </div>
              </div>
            </div>
            {{-- <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> --}}
          </div>
          <!-- /.card-body -->

              <!-- SELECT2 EXAMPLE -->
              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">حالة ونوع المستخدم</h3>
      
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>نوع المستخدم</label>
                        <select class="form-control select2" name="role" style="width: 100%;">
                          <option selected="selected" value="4">user</option>
                          <option value="1">Super Admin</option> 
                          <option value="2">Admin</option>
                          <option value="3">Moderator</option>
                        </select>
                      </div>
                      <!-- /.form-group -->
                      
                      <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success ">
                          <input type="checkbox" class="custom-control-input" value="1" name="active" id="customSwitch3">
                          <label class="custom-control-label" for="customSwitch3"> تنشيط الحساب</label>
                        </div>


                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                      </div>
                      <!-- /.card -->

@endsection