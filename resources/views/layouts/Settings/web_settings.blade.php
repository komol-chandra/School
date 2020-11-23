@extends('Backend.layouts.app')
@section('title', ' Website Setting')
{{-- @section('head', 'Teacher') --}}
@section('head_name', 'Website Settings')
@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="page-title">Website Settings</h4>
    </div>
</div>
    @if(session('msg'))
        <div class="alert with-close alert-info alert-dismissible fade show" role="alert">
            {{(session('msg'))}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
<div class="row">
    <div class="col-lg-2 col-sm-2">
        <div class=" ">
            <div class="">

                <a href="{{ url('/admin/notice/')}}" class="btn  btn-secondary  btn-rounded btn-block alignToTitle {{ (request()->is('admin/notice')) ? 'active' : '' }}"  style="float: right" > <i class="mdi mdi-plus"></i>Noticeboard</a>
                <a href="{{ url('/admin/eventCalender')}}" class="btn  btn-secondary  btn-rounded btn-block alignToTitle {{ (request()->is('admin/event_calendar')) ? 'active' : '' }}"  style="float: right" > <i class="mdi mdi-plus"></i>Events</a>
                <a href="{{ url('/admin/teacher')}}" class="btn  btn-secondary  btn-rounded btn-block alignToTitle {{ (request()->is('admin/teacher')) ? 'active' : '' }}"  style="float: right" > <i class="mdi mdi-plus"></i>Teacher</a>
                <a href="{{ url('/admin/teacher')}}" class="btn  btn-secondary  btn-rounded btn-block alignToTitle {{ (request()->is('admin/teacher')) ? 'active' : '' }}"  style="float: right" > <i class="mdi mdi-plus"></i>Gallery</a>
                <a href="{{ url('/admin/teacher')}}" class="btn  btn-secondary  btn-rounded btn-block alignToTitle {{ (request()->is('admin/teacher')) ? 'active' : '' }}"  style="float: right" > <i class="mdi mdi-plus"></i>About Us</a>
                <a href="{{ url('/admin/teacher')}}" class="btn  btn-secondary  btn-rounded btn-block alignToTitle {{ (request()->is('admin/teacher')) ? 'active' : '' }}"  style="float: right" > <i class="mdi mdi-plus"></i>Terms and Conditions</a>
                <a href="{{ url('/admin/teacher')}}" class="btn  btn-secondary  btn-rounded btn-block alignToTitle {{ (request()->is('admin/teacher')) ? 'active' : '' }}"  style="float: right" > <i class="mdi mdi-plus"></i>Privacy Policy</a>
                <a href="{{ url('/admin/teacher')}}" class="btn  btn-secondary  btn-rounded btn-block alignToTitle {{ (request()->is('admin/teacher')) ? 'active' : '' }}"  style="float: right" > <i class="mdi mdi-plus"></i>Home Page Slider</a>
                <a href="{{url('/admin/web_settings')}}" class="btn  btn-secondary  btn-rounded btn-block alignToTitle {{ (request()->is('admin/web_settings')) ? 'active' : '' }}"  style="float: right" > <i class="mdi mdi-plus"></i>General Settings</a>

            </div>
        </div>
    </div>
    <div class="col-lg-10 col-sm-10">
        <div class="card">
        <form class="form-horizontal" id="GeneralSetForm" action="{{url('admin/web_settings/'. $general_setting->website_id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="card-body">
                <h4 class="card-title">General Settings</h4>
                <div class="form-group row">
                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label" name="school_phone">Website Title</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="website_title" value="{{$general_setting->website_title}}"  id="cono1" placeholder="Website Title Here">
                        @if($errors->first('website_title'))
                            <label for="fname" class="error">{{$errors->first('website_title')}}</label>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label" name="school_phone">Social Site</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="link_facebook" value="{{$general_setting->link_facebook}}"  id="cono1" placeholder="http://www.facebook.com/">
                        <br>
                        <input type="text" class="form-control" name="link_twitter" value="{{$general_setting->link_twitter}}"  id="cono1" placeholder="http://www.twitter.com/">
                        <br>
                        <input type="text" class="form-control" name="link_linkedin" value="{{$general_setting->link_linkedin}}" id="cono1" placeholder="http://www.linkedin.com/">
                        <br>
                        <input type="text" class="form-control" name="link_google" value="{{$general_setting->link_google}}" id="cono1" placeholder="http://www.google.com/">
                        <br>
                        <input type="text" class="form-control" name="link_youtube" value="{{$general_setting->link_youtube}}" id="cono1" placeholder="http://www.youtube.com/">
                        <br>
                        <input type="text" class="form-control" name="link_instagram" value="{{$general_setting->link_instagram}}" id="cono1" placeholder="http://www.instagram.com/">

                    </div>
                </div>
                <div class="form-group row">
                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label" name="school_address">Homepage Note Title</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="home_title" value="{{$general_setting->home_title}}"  id="cono1" placeholder="Homepage Note Title Here">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label" name="school_address">Address</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="school_address">{{$general_setting->school_address}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label" name="copy_right_text">Copy Right Text</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="copy_right_text" value="{{$general_setting->copy_right_text}}" id="cono1" placeholder="Copy Right Name Here">
                    </div>
                </div>
                    <div style="display:flex; margin-left:170px;">
                        <div class="form-group col-md-6">
                        <label for="email"> Header Logo:</label>
                        <div class="relative">
                            <img name="header_logo" id='regularLogo'

                            src="{{$general_setting->header_logo ? '/Backend_assets/Files/Logo/header_logo/'.$general_setting->header_logo  : '/Backend_assets/Backend/images/avter4.png'}}"

                            alt="header_logo image" class='img-responsive' style="hight:150px;width:200px">
                            <br><br>
                            <input type='file' id="regularLogo" name="header_logo" onchange="readURL1(this);" />
                            <span class="text-danger" id="image"></span>
                        </div>
                        </div>

                        <div class="form-group col-md-6" style="margin-left:100px;">
                        <label for="email">Footer Logo:</label>
                        <div class="relative">
                            <img name="footer_logo" id='lightLogo'

                            src="{{$general_setting->footer_logo ? '/Backend_assets/Files/Logo/footer_logo/'.$general_setting->footer_logo  : '/Backend_assets/Backend/images/avter4.png'}}"

                            alt="footer_logo image" class='img-responsive' style="hight:150px;width:200px">
                            <br><br>
                            <input type='file' id="lightLogo" name="footer_logo" onchange="readURL2(this);" />
                            <span class="text-danger" id="image"></span>
                        </div>
                        </div>
                        </div>
                    </div>
                    <div class="border-top">
                <div class="card-body text-right mb-3">
                    <button type="submit" value="submit" class="btn btn-primary">Update Settings</button>
                </div>
            </div>
            </div>
            </form>
        </div>
    </div>
</div>


@endsection
@section('js')
{!! JsValidator::formRequest('App\Http\Requests\GeneralSettingRequest', '#GeneralSetForm'); !!}
<script src="{{asset('Backend_assets/js/abc.js')}}"></script>
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
    function myFunction() {
        window.print();
    }
</script>
@endsection
