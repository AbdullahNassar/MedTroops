@extends('admin.layouts.master')
@section('title')
@if (Config::get('app.locale') == 'en') Profile @else الصفحة الشخصية  @endif
@endsection
@section('content')      
<!-- Content page Start -->
<div class="content-wrapper">
	<section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{asset('storage/uploads/users').'/'.Auth::guard('admins')->user()->image}}" alt="User profile picture">
                  <h3 class="profile-username text-center">{{Auth::guard('admins')->user()->name}}</h3>
                  <p class="text-muted text-center">{{Auth::guard('admins')->user()->type}}</p>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
              <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">المعلومات الشخصية</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> نبذة مختصرة</strong>

              <p class="text-muted">
              {{Auth::guard('admins')->user()->about}}
              </p>

              <hr>

              <strong><i class="fa fa-globe margin-r-5"></i> الموقع</strong>

              <p class="text-muted">{{Auth::guard('admins')->user()->website}}</p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> العنوان</strong>

              <p>
              {{Auth::guard('admins')->user()->address}}
              </p>
            </div>
            <!-- /.box-body -->
          </div>

            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#settings" data-toggle="tab" >الاعدادات</a></li>
                  <li><a href="#img" data-toggle="tab">تغير الصورة الشخصية</a></li>
                </ul>
                <div class="tab-content">
                  <!-- /.tab-pane -->
                  <div class="active tab-pane" id="settings">
                  <form  class="form-1 fl-form" action="{{ route('admin.profile.edit') }}" enctype="multipart/form-data" method="post"  onsubmit="return false;">
                        {{ csrf_field() }}
                        <div class="row form-row">
                        <div class="col-md-6">
							<div class="form-group">
							    <label for="input-1">الاسم</label>
								<input  value="{{Auth::guard('admins')->user()->name}}" name="name" class="form-control" id="input-1" type="text">
							</div>
						</div>
                        <div class="col-md-6">
							<div class="form-group">
							    <label for="input-2">رقم الموبايل</label>
								<input value="{{Auth::guard('admins')->user()->mobile}}" name="mobile" class="form-control" id="input-2" type="text">
							</div>
						</div>
                        <div class="col-md-6">
							<div class="form-group">
							    <label for="input-3">البريد الالكترونى</label>
								<input value="{{Auth::guard('admins')->user()->email}}" name="email" class="form-control" id="input-3" type="text">
							</div>
						</div>
                        
                        <div class="col-md-6">
							<div class="form-group">
							    <label for="input-5">رابط الموقع</label>
								<input name="website" value="{{Auth::guard('admins')->user()->website}}" class="form-control" id="input-5" type="text">
							</div>
						</div>
                        <div class="col-md-6">
							<div class="form-group">
							    <label for="input-6">رابط الفيسبوك</label>
								<input name="facebook" value="{{Auth::guard('admins')->user()->facebook}}" class="form-control" id="input-6" type="text">
							</div>
						</div>
                        <div class="col-md-6">
							<div class="form-group">
							    <label for="input-7">رابط تويتر</label>
								<input name="twitter" value="{{Auth::guard('admins')->user()->twitter}}" class="form-control" id="input-7" type="text">
							</div>
						</div>
                        <div class="col-md-6">
							<div class="form-group">
							    <label for="input-8"> رابط جوجل</label>
								<input name="google" class="form-control" id="input-8" type="text" value="{{Auth::guard('admins')->user()->google}}">
							</div>
						</div>
                        <div class="col-md-6">
							<div class="form-group">
							    <label for="input-9">رابط انستغرام</label>
								<input value="{{Auth::guard('admins')->user()->instagram}}" name="instagram" class="form-control" id="input-9" type="text">
							</div>
						</div>
                        <div class="col-md-12">
							<div class="form-group">
							    <label for="input-4">نبذة مختصرة </label>
                                <textarea class="form-control" rows="5" id="input-4" name="about">{{Auth::guard('admins')->user()->about}}</textarea>
							</div>
						</div>
                        <div class="col-md-12">
                                <button type="submit" class="btn btn-orange addButton pmd-ripple-effect btn-sm">حفظ</button>
                            </div>
                        </div>
                    </form>
                  </div><!-- /.tab-pane -->

                  <div class="tab-pane white-bg" id="img">
                  <form  class="form-1 fl-form" action="{{ route('admin.profile.image') }}" enctype="multipart/form-data" method="post"  onsubmit="return false;">
                        {{ csrf_field() }}
                        <div class="row form-row">
                            <div class="col-md-12">
								<div class="user-img-upload">
									<div class="fileUpload user-editimg">
											<span><i class="fa fa-camera"></i> تغيير</span>
											<input type='file' id="imgInp" class="upload" name="image" value="{{Auth::guard('admins')->user()->image}}"/>
                                            <input type="hidden" value="users" name="storage" >
                                    </div>
									<img src="{{asset('storage/uploads/users').'/'.Auth::guard('admins')->user()->image}}" id="blah" class="img-circle" alt="">
									<p id="result"></p>
									<br>
								</div>
							</div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-orange addButton pmd-ripple-effect btn-sm">حفظ</button>
                            </div>
                        </div>
                    </form>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section>
        
  </div>
  <!-- Content page End -->

</div><!-- wrapper -->

@endsection