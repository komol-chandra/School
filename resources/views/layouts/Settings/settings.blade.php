@extends('Backend.layouts.app')
@section('title', 'Settings')
@section('head', 'Settings')
@section('head_name', 'Settings')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form  id="application_settings" class="form-horizontal" action="{{route('settings.update',$app_data->app_settings_id)}}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @if(session('msg'))
                    <div class="alert with-close alert-info alert-dismissible fade show" role="alert">
                        {{(session('msg'))}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
                    <div class="card-body">
                        <h4 class="card-title">App Settings</h4>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Application Logo</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="app_settings_logo" name="app_settings_logo" onchange="readURL(this);" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="app_settings_name" class="col-sm-3 text-right control-label col-form-label">Application Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="app_settings_name" name="app_settings_name" value="{{$app_data->app_settings_name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="app_settings_about" class="col-sm-3 text-right control-label col-form-label">About Application</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="app_settings_about" name="app_settings_about" value="{{$app_data->app_settings_about}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="app_settings_email" class="col-sm-3 text-right control-label col-form-label">Application Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="app_settings_email" name="app_settings_email" value="{{$app_data->app_settings_email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="app_settings_phone" class="col-sm-3 text-right control-label col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="app_settings_phone" name="app_settings_phone" value="{{$app_data->app_settings_phone}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="app_settings_address" class="col-sm-3 text-right control-label col-form-label">Address</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="app_settings_address" name="app_settings_address" value="{{$app_data->app_settings_address}}">
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="submit btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div>
                        @if("/Backend_assets/Files/App_Settings/{{ $app_data->app_settings_logo }}")
                        <img name="app_settings_logo" id='previmage' src="/Backend_assets/Files/App_Settings/{{$app_data->app_settings_logo}}" alt="image" class='img-responsive img-circle'><br><br>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\AppSettingsRequest', '#application_settings'); !!}
<script type="text/javascript">
    $("#email").click(function() {
        $("#email").prop("readonly", true);
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#previmage')
                    .attr('src', e.target.result)
                    .width(500)
                    .height(300);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function myFunction() {
        window.print();
    }
</script>
@endsection
