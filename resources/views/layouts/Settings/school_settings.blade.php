@extends('Backend.layouts.app')
@section('title', 'School Settings')
@section('head', 'School Settings')
@section('head_name', 'School Settings')
@section('content')
    @if(session('msg'))
        <div class="alert with-close alert-info alert-dismissible fade show" role="alert">
            {{(session('msg'))}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
<div style="margin-bottom: 45px;"></div>
<div class="container-fluid">
    <div class="row">
    <div class="col-md-2"></div>
        <div class="col-md-7">
            <div class="card">
                <form class="form-horizontal" action="{{url('admin/school_setting/'. $school_settings->school_id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="card-body">
                        <h4 class="card-title">School Settings</h4>
                        <div class="form-group row">
                            <label for="fname" name="school_name" class="col-sm-3 text-right control-label col-form-label">School Name</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="school_name" value="{{$school_settings->school_name}}" id="fname" placeholder="School Name Here">
                                @if($errors->first('school_name'))
                                    <label for="fname" class="error">{{$errors->first('school_name')}}</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label" name="school_phone">Phone No</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="school_phone" value="{{$school_settings->school_phone}}" id="cono1" placeholder="Phone No Here">
                                @if($errors->first('school_phone'))
                                    <label for="fname" class="error">{{$errors->first('school_phone')}}</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label" name="school_address">Address</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="school_address">{{$school_settings->school_address}}</textarea>
                                @if($errors->first('school_address'))
                                    <label for="fname" class="error">{{$errors->first('school_address')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body text-right mb-3">
                            <button type="submit" value="submit" class="btn btn-primary">Update School Settings</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script type="text/javascript">

</script>
@endsection
