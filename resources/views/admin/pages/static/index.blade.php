@extends('admin.layouts.master')
@section('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">
    <meta name="csrf_token" content="{{csrf_token()}}">
@endsection
@section('title','Static Data')
@section('styles')
    <link href="{{asset('vendors/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/lib/jquery-switchbutton/jquery.switchButton.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/lib/highlightjs/github.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/lib/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/css/bootstrap-toggle.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/lib/jt.timepicker/jquery.timepicker.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/lib/spectrum/spectrum.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/lib/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/lib/ion.rangespecial/css/ion.rangespecial.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/lib/ion.rangespecial/css/ion.rangespecial.skinFlat.css')}}" rel="stylesheet">
    
    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{asset('vendors/css/bracket.css')}}">
    <link href="{{asset('vendors/toastr/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/css/float-labels.css')}}" rel="stylesheet">
@endsection
@section('content')
    <!-- br-mainpanel -->
    <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.home')}}">Med Troops</a>
            <a class="breadcrumb-item" href="{{route('static.get')}}">Static Data</a>
            <span class="breadcrumb-item active">Static Data Form</span>
        </nav>
      </div><!-- br-pageheader -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Static Data Form</h4>
        <p class="mg-b-0">Forms are used to collect user information with different element types of input, select, checkboxes, radios and more.</p>
      </div>

      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <div class="form-layout form-layout-1">
            <form id="static_form" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row mg-b-25">
              <div class="col-lg-12">
                <div class="user-img-upload">
                  <div class="fileUpload user-editimg">
                      <span><i class="fa fa-camera"></i> Edit</span>
                      <input type="file" id="imgInp" class="upload" name="about_image" value="{{$static->about_image}}">
                      <input type="hidden" value="about" name="storage" >
                  </div>
                  <img src="{{asset('storage/uploads/about/'.$static->about_image)}}" id="blah" class="img-circle" alt="">
                  <p>About Image</p><hr>
                </div>
              </div><!-- col-12 -->
              <div class="col-lg-12">
                <h4 class="tx-gray-800 mg-b-5">Top Header Static Data</h4><hr>
              </div>
              <div class="col-lg-6">
                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                    <label class="control-label">English Header Text</label>
                    <input class="form-control" type="text" name="header_en" value="{{$static->header_en}}">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                    <label class="control-label">Arabic Header Text</label>
                    <input class="form-control" type="text" name="header_ar" value="{{$static->header_ar}}">
                </div>
              </div>
              <div class="col-lg-12">
                <h4 class="tx-gray-800 mg-b-5">Features Static Data</h4><hr>
              </div>
              <div class="col-lg-6">
                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                    <label class="control-label">English Features Header Text</label>
                    <input class="form-control" type="text" name="f_head_en" value="{{$static->f_head_en}}">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                    <label class="control-label">Arabic Features Header Text</label>
                    <input class="form-control" type="text" name="f_head_ar" value="{{$static->f_head_ar}}">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                    <label class="control-label">English Features Content Text</label>
                    <textarea rows="5" class="form-control" name="f_content_en">{{$static->f_content_en}}</textarea>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                    <label class="control-label">Arabic Features Content Text</label>
                    <textarea rows="5" class="form-control" name="f_content_ar">{{$static->f_content_ar}}</textarea>
                </div>
              </div>
              <div class="col-lg-12">
                <h4 class="tx-gray-800 mg-b-5">Mobile App Static Data</h4><hr>
              </div>
              <div class="col-lg-6">
                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                    <label class="control-label">English App Header Text</label>
                    <input class="form-control" type="text" name="app_head_en" value="{{$static->app_head_en}}">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                    <label class="control-label">Arabic App Header Text</label>
                    <input class="form-control" type="text" name="app_head_ar" value="{{$static->app_head_ar}}">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                    <label class="control-label">Android App URL</label>
                    <input class="form-control" type="text" name="android" value="{{$static->android}}">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                    <label class="control-label">IOS App URL</label>
                    <input class="form-control" type="text" name="ios" value="{{$static->ios}}">
                </div>
              </div>
              <div class="col-lg-12">
                <h4 class="tx-gray-800 mg-b-5">Footer Static Data</h4><hr>
              </div>
              <div class="col-lg-6">
                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                    <label class="control-label">English Footer Content Text</label>
                    <textarea rows="5" class="form-control" name="footer_en">{{$static->footer_en}}</textarea>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                    <label class="control-label">Arabic Footer Content Text</label>
                    <textarea rows="5" class="form-control" name="footer_ar">{{$static->footer_ar}}</textarea>
                </div>
              </div>
              <div class="col-lg-12">
                <h4 class="tx-gray-800 mg-b-5">About Page Static Data</h4><hr>
              </div>
              <div class="col-lg-6">
                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                    <label class="control-label">English About Header Text</label>
                    <input class="form-control" type="text" name="about_head_en" value="{{$static->about_head_en}}">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                    <label class="control-label">Arabic About Header Text</label>
                    <input class="form-control" type="text" name="about_head_ar" value="{{$static->about_head_ar}}">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                    <label class="control-label">English About Content Text</label>
                    <textarea rows="5" class="form-control" name="about_content_en">{{$static->about_content_en}}</textarea>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                    <label class="control-label">Arabic About Content Text</label>
                    <textarea rows="5" class="form-control" name="about_content_ar">{{$static->about_content_ar}}</textarea>
                </div>
              </div>
              <div class="col-lg-12">
                <h4 class="tx-gray-800 mg-b-5">Contact Page Static Data</h4><hr>
              </div>
              <div class="col-lg-6">
                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                    <label class="control-label">English Contact Text</label>
                    <textarea rows="5" class="form-control" name="contact_en">{{$static->contact_en}}</textarea>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                    <label class="control-label">Arabic Contact Text</label>
                    <textarea rows="5" class="form-control" name="contact_ar">{{$static->contact_ar}}</textarea>
                </div>
              </div>
            </div><!-- row -->
            <div class="form-layout-footer">
                <input type="hidden" name="button_action" id="button_action" value="update">
                <input type="submit" name="submit" id="action" value="Edit" class="btn btn-primary">
            </div><!-- form-layout-footer -->
            </form>
          </div><!-- form-layout -->
        </div><!-- br-section-wrapper -->
      </div><!-- br-pagebody -->   
@endsection
@include('admin.pages.static.scripts')