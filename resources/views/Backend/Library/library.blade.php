@extends('Backend.layouts.app')
@section('title', 'Library')
@section('head', 'Library')
@section('head_name', 'Library')
@section('content')
<div class="card">
    <div class="card-body">
        <button type="button" class="btn btn-info margin-5 text-white"  style="float:right" data-toggle="modal" data-target="#addModal">Add Books</button>
        <h5 class="card-title"  >Basic Datatable</h5>
        <br>
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
                            </select> entries</label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div id="zero_config_filter" class="dataTables_filter" style="float: right;">
                            <label>Search:<input type="search" class="search form-control form-control-sm" placeholder="" aria-controls="zero_config">
                            </label>
                        </div>
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="row mt-3">
                                <div class="col-md-1"></div>
                                <div class="col-md-4">
                                    <select name="class_id" id="filter_class" class="form-control select2" data-toggle = "select2" required onchange="loaddata()">
                                        <option value="" >Select Class</option>
                                        @foreach($class as $value)
                                            <option value="{{$value->class_id}}" >{{$value->class_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select name="section_id" id="filter_section" class="form-control select2" data-toggle = "select2" required onchange="loaddata()">
                                        <option value="" >Select Class</option>
                                        @foreach($section as $value)
                                            <option value="{{$value->section_id}}" >{{$value->section_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-block btn-secondary" onclick="loaddata()" >Filter</button>
                                </div>
                            </div>
                            <div class="card-body data_lists">
                                  <div class="empty_box">
                                    <img class="mb-1-center" width="120px" src="http://ekattor-school-erp.com/demo/v7/assets/backend/images/empty_box.png" />
                                    <br>
                                    <span class="">No Data Found</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="row">
                    <div class="col-sm-12">
                        <div id="data_lists"></div>
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
                <h5 class="modal-title" id="exampleModalLabel">Add Class Routine</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="library_save" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Book Name</label>
                        <div class="col-md-9">
                            <input type="text" name="book_name" value=""  class="form-control" id="book_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Author</label>
                        <div class="col-md-9">
                            <input type="text" name="author_name" value=""  class="form-control" id="author_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Number Of Copy</label>
                        <div class="col-md-9">
                            <input type="text" name="copy_number" value=""  class="form-control" id="copy_number">
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
</div>

{{--Add Modal--}}
{{--Edit Modal--}}
<form method="PUT" id="library_update">@csrf
    <div class="modal fade" id="edit_library" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Routine</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="library_id" id="edit_library_id">

                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Book Name</label>
                        <div class="col-md-9">
                            <input type="text" value="" name="book_name" class="form-control" id="edit_book_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Author</label>
                        <div class="col-md-9">
                            <input type="text" value="" name="author_name" class="form-control" id="edit_author_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Number Of Copy</label>
                        <div class="col-md-9">
                            <input type="text" value="" name="copy_number" class="form-control" id="edit_copy_number">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" id="close2" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
{{--Edit Modal--}}
@endsection
@section('js')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
<script src="{{asset('Backend_assets/js/library.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\LibraryRequest', '#library_save'); !!}
{!! JsValidator::formRequest('App\Http\Requests\LibraryRequest', '#library_update'); !!}
@endsection
