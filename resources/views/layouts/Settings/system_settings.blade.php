@extends('Backend.layouts.app')
@section('title', 'System Settings')
@section('head', 'System Settings')
@section('head_name', 'System Settings')
@section('content')
    @if(session('msg'))
        <div class="alert with-close alert-info alert-dismissible fade show" role="alert">
            {{(session('msg'))}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
<div class="container-fluid">
    <div class="row">
    <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card">
                <form class="form-horizontal" id="systemForm" action="{{url('admin/system_setting/'. $system_setting->system_id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="card-body">
                        <h4 class="card-title">System Settings</h4>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">System Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="system_name" value="{{$system_setting->system_name}}" id="fname" placeholder="System Name Here">
                                @if($errors->first('system_name'))
                                    <label for="fname" class="error">{{$errors->first('system_name')}}</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Title Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="title_name" value="{{$system_setting->title_name}}" id="lname" placeholder="Title Name Here">
                                @if($errors->first('title_name'))
                                    <label for="fname" class="error">{{$errors->first('title_name')}}</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">School Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="school_email" value="{{$system_setting->school_email}}" id="lname" placeholder="School E-mail Here">
                                @if($errors->first('school_email'))
                                    <label for="fname" class="error">{{$errors->first('school_email')}}</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Contact No</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="contact_no" value="{{$system_setting->contact_no}}" id="cono1" placeholder="Contact No Here">
                                @if($errors->first('contact_no'))
                                    <label for="fname" class="error">{{$errors->first('contact_no')}}</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Address</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="school_address">{{$system_setting->school_address}}</textarea>
                                @if($errors->first('school_address'))
                                    <label for="fname" class="error">{{$errors->first('school_address')}}</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Footer Text</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="footer_text" value="{{$system_setting->footer_text}}" id="cono1" placeholder="Footer Text Here">
                                @if($errors->first('footer_text'))
                                    <label for="fname" class="error">{{$errors->first('footer_text')}}</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Footer Link</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="footer_link" value="{{$system_setting->footer_link}}" id="cono1" placeholder="Footer Link Here">
                                @if($errors->first('footer_link'))
                                    <label for="fname" class="error">{{$errors->first('footer_link')}}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <h4 class="card-title" style="margin-left: 21px; margin-bottom: 20px;">System Logo</h4>
                    <div style="margin-left:200px;">
                        <div class="col-md-6">
                    <div class="card">
                        <div style="display:flex;">
                            <div class="form-group col-md-6">
                            <label for="email"> Regular Logo:</label>
                            <div class="relative">
                                <img name="regular_logo" id='regularLogo'
                                src="{{$system_setting->regular_logo ? '/Backend_assets/Files/Logo/regular_logo/'.$system_setting->regular_logo  : '/Backend_assets/Backend/images/avater.png'}}"
                                alt="regular_logo image" class='img-responsive' style="hight:150px;width:200px">
                                <br><br>
                                <input type='file' id="regularLogo" name="regular_logo" onchange="readURL1(this);" />
                                <span class="text-danger" id="image"></span>
                            </div>
                            </div>

                            <div class="form-group col-md-6" style="margin-left:100px;">
                            <label for="email"> Light Logo:</label>
                            <div class="relative">
                                <img name="light_logo" id='lightLogo'
                                src="{{$system_setting->light_logo ? '/Backend_assets/Files/Logo/light_logo/'.$system_setting->light_logo  : '/Backend_assets/Backend/images/avater2.png'}}"
                                alt="light_logo image" class='img-responsive' style="hight:150px;width:200px">
                                <br><br>
                                <input type='file' id="lightLogo" name="light_logo" onchange="readURL2(this);" />
                                <span class="text-danger" id="image"></span>
                            </div>
                            </div>
                            </div>

                            <div style="display:flex">
                            <div class="form-group col-md-6">
                            <label for="email"> Small Logo:</label>
                            <div class="relative">
                                <img name="small_logo" id='smallLogo'
                                src="{{$system_setting->small_logo ? '/Backend_assets/Files/Logo/small_logo/'.$system_setting->small_logo  : '/Backend_assets/Backend/images/avater3.png'}}"
                                alt="small_logo image" class='img-responsive' style="hight:150px;width:200px">
                                <br><br>
                                <input type='file' id="smallLogo" name="small_logo" onchange="readURL3(this);" />
                                <span class="text-danger" id="smallLogo"></span>
                            </div>
                            </div>

                            <div class="form-group col-md-6" style="margin-left:100px;">
                            <label for="email"> Favicon:</label>
                            <div class="relative">
                                <img name="fav_icon" id='favIcon'
                                src="{{$system_setting->fav_icon ? '/Backend_assets/Files/Logo/fav_icon/'.$system_setting->fav_icon  : '/Backend_assets/Backend/images/avter4.png'}}"
                                alt="fav_icon image" class='img-responsive' style="hight:150px;width:200px">
                                <br><br>
                                <input type='file' id="favIcon" name="fav_icon" onchange="readURL4(this);" />
                                <span class="text-danger" id="favIcon"></span>
                            </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    </div>
                        <div class="border-top">
                            <div class="card-body text-right mb-3">
                                <button type="submit" value="submit" class="btn btn-primary">Update System Setting</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
@endsection
@section('js')
{!! JsValidator::formRequest('App\Http\Requests\SystemSettingRequest', '#systemForm'); !!}
<script type="text/javascript">
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#regularLogo')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(150);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#lightLogo')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#smallLogo')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(150);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#favIcon')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(150);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function myFunction() {
        window.print();
    }
</script>
@endsection
