@extends('admin.layouts.master')
@section('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">
    <meta name="csrf_token" content="{{csrf_token()}}">
@endsection
@section('title','Doctors')
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
    <link href="{{asset('vendors/lib/ion.rangeSlider/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/lib/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
    
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
            <a class="breadcrumb-item" href="{{route('doctor.get')}}">Doctors</a>
            <span class="breadcrumb-item active">Doctors Table</span>
        </nav>
        </div><!-- br-pageheader -->
        <div class="br-pagebody">
        <div class="br-section-wrapper">
            <button class="btn btn-oblong btn-outline-primary mg-b-10 float-right" id="add_data" type="button" name="add">Add New</button>
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Basic Responsive DataTable</h6>
            <p class="mg-b-25 mg-lg-b-50">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p>
            <div class="table-wrapper">
            <table id="doctor_table" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Price</th>
                        <th>Wallet</th>
                        <th>Action</th>
                        <th><a name="bulk_delete" id="bulk_delete" class="text-danger"><i class="fa fa-close"></i></a></th>
                    </tr>
                </thead>
            </table>
            </div><!-- table-wrapper -->
        </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->

        <!-- modal -->
        <div id="doctorModal" class="modal fade">
            <div class="modal-dialog modal-dialog-vertical-center modal-lg" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold modal-title">Add New Doctor</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body pd-25">
                <div class="form-layout">
                    <form method="post" id="doctor_form" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row mg-b-25">
                            <div class="col-lg-3">
                                <div class="user-img-upload">
                                    <div class="fileUpload user-editimg">
                                        <span><i class="fa fa-camera"></i> Add</span>
                                        <input type="file" id="imgInp" class="upload" name="image">
                                        <input type="hidden" value="doctor" name="storage" >
                                    </div>
                                    <img src="{{asset('vendors/img/1.jpg')}}" id="blah" class="img-circle" alt="">
                                    <p>    </p>
                                </div>
                            </div><!-- col-12 -->
                            <div class="col-lg-3">
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Doctor Username</label>
                                    <input class="form-control" type="text" name="username" id="username">
                                </div>
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Doctor Password</label>
                                    <input class="form-control" type="password" name="password" id="password">
                                </div>
                            </div><!-- col-12 -->
                            <div class="col-lg-3">
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Arabic Doctor Name</label>
                                    <input class="form-control" type="text" name="doctor_name_ar" id="doctor_name_ar">
                                </div>
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">English Doctor Name</label>
                                    <input class="form-control" type="text" name="doctor_name" id="doctor_name">
                                </div>
                            </div><!-- col-12 -->
                            <div class="col-lg-3">
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Date Of Birth</label>
                                    <input class="form-control fc-datepicker" type="text" name="birth" id="birth">
                                </div>
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Email</label>
                                    <input class="form-control" type="email" name="email" id="email">
                                </div>
                            </div><!-- col-12 -->
                            <div class="col-lg-3">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Specialty</label>
                                    <select class="select2 pmd-select2 form-control" name="specialty" id="specialty">
                                      <option></option>
                                    </select>
                                  </div>
                            </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-3">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label class="control-label">Phone</label>
                                <input class="form-control" type="text" name="phone" id="phone">
                            </div>
                            </div><!-- col-6 -->
                            
                            <div class="col-lg-3">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label class="control-label">Price</label>
                                <input class="form-control" type="number" name="price" id="price">
                            </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-3">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label class="control-label">Bank Account</label>
                                <input class="form-control" type="number" name="bank_acc_num" id="bank_acc_num">
                            </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-3">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label class="control-label">Arabic Bank Name</label>
                                <input class="form-control" type="text" name="bank_name_ar" id="bank_name_ar">
                            </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-3">
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">English Bank Name</label>
                                    <input class="form-control" type="text" name="bank_name" id="bank_name">
                                </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-3">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label class="control-label">Doctor Percentage</label>
                                <input class="form-control" type="number" name="percent" id="percent">
                            </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-3">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label class="control-label">Wallet</label>
                                <input class="form-control" type="number" name="wallet" id="wallet">
                            </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-3">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label class="control-label">Balance</label>
                                <input class="form-control" type="number" name="balance" id="balance">
                            </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-3">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label class="control-label">Rate</label>
                                <input class="form-control" type="number" name="rate" id="rate">
                            </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-6">
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Served Areas</label>
                                    <select class="form-control pmd-select2 select2" name="area[]" id="area" multiple>
                                      <option></option>
                                    </select>
                                </div>
                            </div><!-- col-12 -->
                            <div class="col-lg-6">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label class="control-label">Arabic Address</label>
                                <textarea rows="2" class="form-control" name="address_ar" id="address_ar"></textarea>
                            </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-6">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label class="control-label">English Address</label>
                                <textarea rows="2" class="form-control" name="address" id="address"></textarea>
                            </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-6">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label class="control-label">Arabic Bio</label>
                                <textarea rows="2" class="form-control" name="bio_ar" id="bio_ar"></textarea>
                            </div>
                            </div><!-- col-12 -->
                            <div class="col-lg-6">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label class="control-label">English Bio</label>
                                <textarea rows="2" class="form-control" name="bio" id="bio"></textarea>
                            </div>
                            </div><!-- col-12 -->
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="control-label">Status :          </label>
                                    <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" name="active" id="active">
                                </div>
                            </div><!-- col-4 -->
                        </div><!-- row -->
                        <div class="col-lg-12" style="text-align:center">
                            <input type="hidden" name="doctor_id" id="doctor_id" value="" />
                            <input type="hidden" name="button_action" id="button_action" value="insert" />
                            <input type="submit" name="submit" id="action" value="Add" class="btn btn-primary" />
                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                        </div><!-- form-layout-footer -->
                    </form>
                    </div><!-- form-layout -->
                </div>
            </div>
            </div><!-- modal-dialog -->
        </div>
        <!-- modal -->
        <div id="dataModal" class="modal fade animated fadeInLeftBig">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content bd-0">
                    <div class="modal-body pd-0">
                        <div class="row flex-row-reverse no-gutters">
                            <div class="col-lg-4">
                            <button type="button" class="close mg-t-15 mg-r-20" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <img src="http://via.placeholder.com/912x912" class="img-fluid rounded-right pd-40" alt="" id="doctor-image">
                            </div><!-- col-6 -->
                            <div class="col-lg-8 rounded-left">
                            <div class="pd-40">
                                <h2 class="mg-b-5 tx-semibold tx-inverse" id="doctor-name"></h2>
                                <h5 class="mg-b-5 tx-inverse lh-2 " id="doctor-title"></h5>
                                <hr>
                                <p class="tx-inverse">
                                    <span class="tx-semibold tx-inverse">Doctor Bio:</span>
                                    <span class="mg-b-20" id="doctor-bio"></span>
                                </p>
                                <p class="tx-inverse">
                                    <span class="tx-semibold tx-inverse">Doctor Address:</span>
                                    <span class="mg-b-20" id="doctor-address"></span>
                                </p>
                                <p class="tx-inverse">
                                    <span class="tx-semibold tx-inverse">Doctor Email:</span>
                                    <span class="mg-b-20" id="doctor-email"></span>
                                </p>
                                <p class="tx-inverse">
                                    <span class="tx-semibold tx-inverse">Doctor Phone:</span>
                                    <span class="mg-b-20" id="doctor-phone"></span>
                                </p>
                                <p class="tx-inverse">
                                    <span class="tx-semibold tx-inverse">Price:</span>
                                    <span class="mg-b-20" id="doctor-price"></span>
                                </p>
                            </div>
                            </div><!-- col-6 -->
                        </div><!-- row -->
                    </div><!-- modal-body -->
                </div><!-- modal-content -->
            </div><!-- modal-dialog -->
        </div>
        <!-- modal -->
        <div id="delete-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class = "modal-content" >
                    {{csrf_field()}}
                    <div class = "modal-header" >
                        <h4 class = "bold" >Are you sure you want to Delete this data?</h4>
                    </div>
                    <div class = "modal-body" >
                        <p >Note : all the data related to this item will be deleted also!</p>
                    </div>
                    <div class = "modal-footer" >
                        <a href = "#" class = "btn btn-danger btndelete" >Delete</a>
                        <button type = "button" class = "btn btn-default" data-dismiss = "modal" >Close</button >
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->
        <div id="multi_delete-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class = "modal-content" >
                    {{csrf_field()}}
                    <div class = "modal-header" >
                        <h4 class = "bold" >Are you sure you want to Delete the selected raws?</h4>
                    </div>
                    <div class = "modal-body" >
                        <p >Note : all the data related to this item will be deleted also!</p>
                    </div>
                    <div class = "modal-footer" >
                        <a href = "#" class = "btn btn-danger multideletebtn" >Delete</a>
                        <button type = "button" class = "btn btn-default" data-dismiss = "modal" >Close</button >
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->
        <div id="error-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class = "modal-content" >
                    <div class = "modal-header" >
                        <h4 class = "bold" >Please select atleast one checkbox</h4>
                    </div>
                    <div class = "modal-body" >
                    </div>
                    <div class = "modal-footer" >
                        <button type = "button" class = "btn btn-default" data-dismiss = "modal" >Close</button >
                    </div>
                </div>
            </div>
        </div>    
@endsection
@include('admin.pages.doctor.scripts')