@extends('admin.layouts.master')
@section('title')
@if (Config::get('app.locale') == 'en') Messages @else الرسائل @endif
@endsection
@section('content')
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="{{route('admin.home')}}">@if (Config::get('app.locale') == 'en') Home @else الرئيسة  @endif</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>@if (Config::get('app.locale') == 'en') Messages @else الرسائل @endif</span>
                            </li>
                        </ul>
                    </div><!--End page-bar-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>@if (Config::get('app.locale') == 'en') Messages Table @else جدول الرسائل @endif 
                                    </div>
                                    <div class="tools">
                                       <a href="javascript:;" class="reload"> </a>
                                        <a href="javascript:;" class="collapse"> </a>
                                    </div><!--End tools-->
                                </div><!-- portlet-title-->
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                @if (Config::get('app.locale') == 'en')
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Message</th>
                                                </tr>
                                                @else
                                                <tr>
                                                    <th>#</th>
                                                    <th>الاسم</th>
                                                    <th>البريد الاكترونى</th>
                                                    <th>الرسالة</th>
                                                </tr>
                                                @endif
                                            </thead>
                                            
                                            <tbody>
                                                @foreach($objects as $object)
                                                <tr>
                                                    <td class="sorting">
                                                        {{$loop->index + 1}}
                                                    </td>
                                                    <td>
                                                        {{$object->name}}
                                                    </td>
                                                    <td> 
                                                        {{$object->email}}
                                                    </td>
                                                    <td>
                                                        {{$object->message}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div><!--End table-scrollable-->
                                </div><!--End portlet-body-->
                            </div><!--End portlet box green-->
                        </div><!--End Col-md-12-->
                    </div><!--End Row-->
                </div><!-- END CONTENT BODY -->
@endsection