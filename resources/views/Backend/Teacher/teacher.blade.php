@extends('Backend.layouts.app')
@section('title', ' Teacher')
@section('head', 'Teacher')
@section('head_name', 'Teacher')

@section('content')
<div class="row">
    <a class="btn btn-default mb-3" href="{{url('/admin/teacher/create')}}">add new</a>
</div>
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
                <div class="row">
                    <div class="col-sm-12">
                        <div id="data_lists">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
                <th>Extn.</th>
                <th>E-mail</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger</td>
                <td>Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
                <td>5421</td>
                <td>t.nixon@datatables.net</td>
            </tr>
            <tr>
                <td>Garrett</td>
                <td>Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$170,750</td>
                <td>8422</td>
                <td>g.winters@datatables.net</td>
            </tr>
            
        </tbody>
    </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script src="{{asset('Backend_assets/js/teacher.js')}}"></script>
@endsection