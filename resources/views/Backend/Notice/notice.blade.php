@extends('Backend.layouts.app')
@section('title', 'Noticeboard')
@section('head', 'Noticeboard Calendar')
@section('head_name', 'Noticeboard Calendar')
@section('content')
<div class="content-page">
    <div class="content content-main">
        <div class="loadings hidden"></div>
            <div class="row ">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="page-title">
                            <i class="mdi mdi-calendar-clock title_icon"></i> Noticeboard Calendar          <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle" data-toggle="modal" style="float: right" data-target="#addModal"> <i class="mdi mdi-plus"></i> Add New Notice</button>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-12 noticeboard_content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="calendar" class="notice-calendar-section"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--Add Modal--}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Notice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="notice_save" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Notice Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="notice_title" class="form-control" id="notice_title" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Notice Date</label>
                            <div class="col-sm-9">
                                <input type="date" name="notice_date" class="form-control" id="notice_date" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Notice</label>
                            <div class="col-sm-9">
                                <input type="text" name="notice_notice" class="form-control" id="notice_notice" >
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" id="close" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
{{--Add Modal--}}
{{-- Edit Modal
    <div class="modal fade" id="edit_notice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Class Room</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="PUT" id="notice_update">
                        @csrf
                        <input type="hidden" name="classroom_id" id="edit_notice_id">
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Notice Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="notice_title" class="form-control" id="notice_title" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Notice Date</label>
                            <div class="col-sm-9">
                                <input type="date" name="notice_date" class="form-control" id="notice_date" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Notice</label>
                            <div class="col-sm-9">
                                <input type="text" name="notice_notice" class="form-control" id="notice_notice" >
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" id="close2" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
@section('js')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
<script src="{{asset('Backend_assets/js/notice.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\NoticeRequest', '#notice_save'); !!}
{!! JsValidator::formRequest('App\Http\Requests\NoticeRequest', '#notice_update'); !!}
@endsection
