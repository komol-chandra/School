@extends('Backend.layouts.app')
@section('title', ' Routine')
@section('head', 'Routine')
@section('head_name', 'Routine')
@section('content')
<div class="row">
    <a class="btn btn-default mb-3" href="{{route('routine.create')}}">add new</a>
</div>
<br>
<div class="card">
    <div class="card-body">
        <h4 class="card-title text-center">Routine Datatable</h4><br>

        <div class="row mt-3">
            <div class="col-md-3 col-sm-3 mb-1">
                <h5 class="card-title">Filter Data</h5>
            </div>
            <div class="col-md-4 col-sm-4 mb-1">
                <select name="class_name" class="select2 form-control custom-select" id="filterClass" onchange="datalist()">
                    <option disabled selected hidden>Select Class Name</option>
                    @foreach($className as $vlaue)
                    <option value="{{$vlaue->class_id}}">{{$vlaue->class_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 col-sm-4 mb-1">
                <select name="class_name" class="select2 form-control custom-select" id="filterSection" onchange="datalist()">
                    <option disabled selected hidden>Select Section</option>
                    @foreach($sectionName as $vlaue)
                    <option value="{{$vlaue->section_id}}">{{$vlaue->section_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div id="data_lists"></div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('Backend_assets/js/routine.js')}}"></script>
@endsection
