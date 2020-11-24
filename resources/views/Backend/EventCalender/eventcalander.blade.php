@extends('Backend.layouts.app')
@section('title', ' Event Calender')
{{-- @section('head', 'Event Calender') --}}
@section('head_name', 'Event Calender')
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="page-title">
        <i class="mdi mdi-calendar-clock title_icon"></i>Event List
        <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-right" data-toggle="modal" data-target="#add_event"><i class="mdi mdi-plus"></i>Add New Event</button>
        </h4>
    </div> 
</div>
<div class="row">
    <div class="col-lg-12">

    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Basic Datatable</h5>
                <div class="table-responsive">
                    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="zero_config_length">
                                    <label>Show <select id="perPage" name="zero_config_length" aria-controls="zero_config" class="form-control form-control-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select></label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="zero_config_filter" class="dataTables_filter" style="float: right;">
                                    <label>Search:<input type="search" class="search form-control form-control-sm" placeholder="" aria-controls="zero_config">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div id="data_lists">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--Add Modal--}}
<form method="post" id="event_form">@csrf
    <div class="modal" id="add_event" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="event_title" class="col-sm-3 text-right control-label col-form-label">Event Title <span style="color: red">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="event_title" class="form-control" id="event_title" placeholder="Event Title Here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="event_start_date" class="col-sm-3 text-right control-label col-form-label">Event Starting Date <span style="color: red">*</span></label>
                        <div class="col-sm-9">
                            <input type="date" name="event_start_date" class="form-control" id="event_start_date date" placeholder="Event Starting Date Here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="event_end_date" class="col-sm-3 text-right control-label col-form-label">Event Ending Date <span style="color: red">*</span></label>
                        <div class="col-sm-9">
                            <input type="date" name="event_end_date" class="form-control" id="event_end_date date" placeholder="Event Ending Date Here">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" id="close" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
{{--Add Modal--}}
{{--Edit Modal--}}
<form method="post" id="event_update">@csrf
    <div class="modal" id="edit_event" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="event_title" class="col-sm-3 text-right control-label col-form-label">Event Title <span style="color: red">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="event_title" class="form-control" id="event_title" placeholder="Event Title Here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="event_start_date" class="col-sm-3 text-right control-label col-form-label">Event Starting Date <span style="color: red">*</span></label>
                        <div class="col-sm-9">
                            <input type="date" name="event_start_date" class="form-control" id="event_start_date date" placeholder="Event Starting Date Here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="event_end_date" class="col-sm-3 text-right control-label col-form-label">Event Ending Date <span style="color: red">*</span></label>
                        <div class="col-sm-9">
                            <input type="date" name="event_end_date" class="form-control" id="event_end_date date" placeholder="Event Ending Date Here">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" id="close" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
{{--Edit Modal--}}
@endsection
@section('js')
<script src="{{asset('Backend_assets/js/eventCalenders.js')}}"></script>
{@endsection
