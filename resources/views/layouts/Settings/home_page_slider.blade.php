@extends('Backend.layouts.app')
@section('title', ' Website Setting')
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
                <a href="{{ url('/admin/about_us')}}" class="btn  btn-secondary  btn-rounded btn-block alignToTitle {{ (request()->is('admin/about_us')) ? 'active' : '' }}"  style="float: right" > <i class="mdi mdi-plus"></i>About Us</a>
                <a href="{{ url('/admin/terms_and_condition')}}" class="btn  btn-secondary  btn-rounded btn-block alignToTitle {{ (request()->is('admin/terms_and_condition')) ? 'active' : '' }}"  style="float: right" > <i class="mdi mdi-plus"></i>Terms and Conditions</a>
                <a href="{{ url('/admin/privacy_policy')}}" class="btn  btn-secondary  btn-rounded btn-block alignToTitle {{ (request()->is('admin/privacy_policy')) ? 'active' : '' }}"  style="float: right" > <i class="mdi mdi-plus"></i>Privacy Policy</a>
                <a href="{{ url('/admin/teacher')}}" class="btn  btn-secondary  btn-rounded btn-block alignToTitle {{ (request()->is('admin/teacher')) ? 'active' : '' }}"  style="float: right" > <i class="mdi mdi-plus"></i>Gallery</a>
                <a href="{{ url('/admin/home_page_slider')}}" class="btn  btn-secondary  btn-rounded btn-block alignToTitle {{ (request()->is('admin/home_page_slider')) ? 'active' : '' }}"  style="float: right" > <i class="mdi mdi-plus"></i>Home Page Slider</a>
                <a href="{{url('/admin/web_settings')}}" class="btn  btn-secondary  btn-rounded btn-block alignToTitle {{ (request()->is('admin/web_settings')) ? 'active' : '' }}"  style="float: right" > <i class="mdi mdi-plus"></i>General Settings</a>
            </div>
        </div>
    </div>
    <div class="col-lg-10 col-sm-10">
        <div class="card">
        <form class="form-horizontal" id="GeneralSetForm" method="post" action="{{url('admin/home_page_slider/'. $home_slider->slider_id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="card-body">
                <h4 class="card-title">Home Page Slider</h4>
                <div class="form-group row">
                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label" name="slider_title1">Slider Title 1</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="slider_title1" value="{{$home_slider->slider_title1}}" id="cono1" placeholder="Slider Title 1 Here">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label" name="slider_title1_descryption">Description 1</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="slider_title1_descryption">{{$home_slider->slider_title1_descryption}}</textarea>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="email" style="text-align:center; width:78%"> Slider 1 Image</label>
                    <div class="relative">
                        <img name="slider1_img" id='slider1'
                        src="{{$home_slider->slider1_img ? '/Backend_assets/Files/Logo/slider1_img/'.$home_slider->slider1_img  : '/Backend_assets/Backend/images/avter4.png'}}"
                        alt="slider1 image" class='img-responsive' style="width:115px; margin-left:350px">
                        <br><br>
                        <input type='file' id="slider1" style="margin-left: 320px;" name="slider1_img" onchange="readURL1(this);" />
                        <span class="text-danger" id="image"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label" name="slider_title2">Slider Title 2</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="slider_title2" value="{{$home_slider->slider_title2}}" id="cono1" placeholder="Slider Title 2 Here">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label" name="slider_title2_descryption">Description 2</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="slider_title2_descryption">{{$home_slider->slider_title2_descryption}}</textarea>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="email" style="text-align:center; width:78%"> Slider 2 Image</label>
                    <div class="relative">
                        <img name="slider2_img" id='slider2'
                        src="{{$home_slider->slider2_img ? '/Backend_assets/Files/Logo/slider2_img/'.$home_slider->slider2_img  : '/Backend_assets/Backend/images/avter4.png'}}"
                        alt="slider2 image" class='img-responsive' style="width:115px; margin-left:350px">
                        <br><br>
                        <input type='file' id="slider2" style="margin-left: 320px;" name="slider2_img" onchange="readURL2(this);" />
                        <span class="text-danger" id="image"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label" name="slider_title3">Slider Title 3</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="slider_title3" value="{{$home_slider->slider_title3}}" id="cono1" placeholder="Slider Title 3 Here">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label" name="slider_title3_descryption">Description 3</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="slider_title3_descryption">{{$home_slider->slider_title3_descryption}}</textarea>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="email" style="text-align:center; width:78%"> Slider 3 Image</label>
                    <div class="relative">
                        <img name="slider3_img" id='slider3'
                        src="{{$home_slider->slider3_img ? '/Backend_assets/Files/Logo/slider3_img/'.$home_slider->slider3_img  : '/Backend_assets/Backend/images/avter4.png'}}"
                        alt="slider3 image" class='img-responsive' style="width:115px; margin-left:350px">
                        <br><br>
                        <input type='file' id="slider3" style="margin-left: 320px;" name="slider3_img" onchange="readURL3(this);" />
                        <span class="text-danger" id="image"></span>
                    </div>
                </div>
            </div>
                <div class="border-top">
                <div class="card-body text-right mb-3">
                    <button type="submit" value="submit" class="btn btn-primary">Update Home Page Slider</button>
                </div>
            </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
{!! JsValidator::formRequest('App\Http\Requests\SystemSettingRequest', '#GeneralSetForm'); !!}
<script type="text/javascript">
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#slider1')
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
                $('#slider2')
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
                $('#slider3')
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
