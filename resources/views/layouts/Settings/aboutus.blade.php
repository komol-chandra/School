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
                <a href="{{ url('/admin/teacher')}}" class="btn  btn-secondary  btn-rounded btn-block alignToTitle {{ (request()->is('admin/teacher')) ? 'active' : '' }}"  style="float: right" > <i class="mdi mdi-plus"></i>Privacy Policy</a>
                <a href="{{ url('/admin/teacher')}}" class="btn  btn-secondary  btn-rounded btn-block alignToTitle {{ (request()->is('admin/teacher')) ? 'active' : '' }}"  style="float: right" > <i class="mdi mdi-plus"></i>Gallery</a>
                <a href="{{ url('/admin/home_page_slider')}}" class="btn  btn-secondary  btn-rounded btn-block alignToTitle {{ (request()->is('admin/home_page_slider')) ? 'active' : '' }}"  style="float: right" > <i class="mdi mdi-plus"></i>Home Page Slider</a>
                <a href="{{url('/admin/web_settings')}}" class="btn  btn-secondary  btn-rounded btn-block alignToTitle {{ (request()->is('admin/web_settings')) ? 'active' : '' }}"  style="float: right" > <i class="mdi mdi-plus"></i>General Settings</a>

            </div>
        </div>
    </div>
    <div class="col-lg-10 col-sm-10">
        <div class="card">
        <form class="form-horizontal" id="GeneralSetForm" action="{{url('admin/about_us/'. $about_us->aboutus_id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="card-body">
                <h4 class="card-title">About Us Settings</h4>
                <div class="form-group row">
                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label" name="school_phone">Website Title</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="about_title" id="summernote">{{$about_us->about_title}}</textarea>
                    </div>
                </div>

                    <div style="display:flex; margin-left:150px;">
                        <div class="form-group col-md-6">
                        <label for="email"> About Us Banner</label>
                        <div class="relative">
                            <img name="about_img" id='aboutus' style="margin-left:250px; width:135px"
                            src="{{$about_us->about_img ? '/Backend_assets/Files/Logo/about_img/'.$about_us->about_img  : '/Backend_assets/Backend/images/avter4.png'}}"
                            alt="aboutus image" class='img-responsive'>
                            <br><br>
                            <input type='file' id="aboutus" name="about_img" onchange="readURL1(this);" />
                            <span class="text-danger" id="image"></span>
                        </div>
                        </div>
                        </div>
                    </div>
                    <div class="border-top">
                <div class="card-body text-right mb-3">
                    <button type="submit" value="submit" class="btn btn-primary">Update About Us</button>
                </div>
            </div>
            </div>
            </form>
        </div>
    </div>
</div>


@endsection
@section('js')
<script>
    $('#summernote').summernote({
    placeholder: 'WebSite Title Here',
    tabsize: 2,
    height: 100
    });
</script>
<script type="text/javascript">
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#aboutus')
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
