@extends('admin.layouts.master')
@section('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">
    <meta name="csrf_token" content="{{csrf_token()}}">
@endsection
@section('title','Contact Data')
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
            <a class="breadcrumb-item" href="{{route('contact.get')}}">Contact Data</a>
            <span class="breadcrumb-item active">Contact Data Form</span>
        </nav>
      </div><!-- br-pageheader -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Contact Data Form</h4>
        <p class="mg-b-0">Forms are used to collect user information with different element types of input, select, checkboxes, radios and more.</p>
      </div>

      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <div class="form-layout form-layout-1">
            <form id="contact_form" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row mg-b-25">
                <div class="col-lg-6">
                    <div class="form-group pmd-textfield pmd-textfield-floating-label">
                        <label class="control-label">Phone</label>
                        <input class="form-control" type="text" name="phone" value="{{$contact->phone}}">
                    </div>
                  </div><!-- col-6 -->
                  <div class="col-lg-6">
                      <div class="form-group pmd-textfield pmd-textfield-floating-label">
                          <label class="control-label">Email</label>
                          <input class="form-control" type="text" name="email" value="{{$contact->email}}">
                      </div>
                  </div><!-- col-12 -->
                  <div class="col-lg-6">
                      <div class="form-group pmd-textfield pmd-textfield-floating-label">
                          <label class="control-label">Facebook URL</label>
                          <input class="form-control" type="text" name="facebook" value="{{$contact->facebook}}">
                      </div>
                  </div><!-- col-6 -->
                  <div class="col-lg-6">
                      <div class="form-group pmd-textfield pmd-textfield-floating-label">
                          <label class="control-label">Twitter URL</label>
                          <input class="form-control" type="text" name="twitter" value="{{$contact->twitter}}">
                      </div>
                  </div><!-- col-6 -->
                  <div class="col-lg-6">
                      <div class="form-group pmd-textfield pmd-textfield-floating-label">
                          <label class="control-label">Linkedin URL</label>
                          <input class="form-control" type="text" name="linkedin" value="{{$contact->linkedin}}">
                      </div>
                  </div><!-- col-6 -->
                  <div class="col-lg-6">
                      <div class="form-group pmd-textfield pmd-textfield-floating-label">
                          <label class="control-label">Instagram URL</label>
                          <input class="form-control" type="text" name="instagram" value="{{$contact->instagram}}">
                      </div>
                  </div><!-- col-6 -->
                  <div class="col-lg-6">
                    <div class="form-group pmd-textfield pmd-textfield-floating-label">
                        <label class="control-label">Arabic Address</label>
                        <textarea rows="5" class="form-control" name="address_ar">{{$contact->address_ar}}</textarea>
                    </div>
                  </div><!-- col-6 -->
                  <div class="col-lg-6">
                    <div class="form-group pmd-textfield pmd-textfield-floating-label">
                        <label class="control-label">English Address</label>
                        <textarea rows="5" class="form-control" name="address_en">{{$contact->address_en}}</textarea>
                    </div>
                  </div><!-- col-6 -->
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
@include('admin.pages.contact.scripts')