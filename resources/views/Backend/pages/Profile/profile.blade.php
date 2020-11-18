@extends('Backend.layouts.app')
@section('title', ' Profile')
@section('head', 'Profile')
@section('head_name', 'Profile')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section id="tabs" class="project-tab">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if(session('msg'))
                        <div class="alert with-close alert-info alert-dismissible fade show" role="alert">
                            {{(session('msg'))}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>   
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <nav>
                                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">View Profile </a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Update Profile</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Update Password</a>
                                        <a class="nav-item nav-link" id="nav-setting-tab" data-toggle="tab" href="#nav-setting" role="tab" aria-controls="nav-setting" aria-selected="false">Other Settings</a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        
                        <div class="tab-content" id="nav-tabContent">
                            {{-- View Profile--}}
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="card bg-dark">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                @if(Auth::user()->profile_photo_path)
                                                <img style="height: 250px; width: 250px;" name="student_image" id='studentImg' src="/{{ Auth::user()->profile_photo_path }}" alt="image" class='img-responsive img-fluid img-thumbnail rounded-circle mt-5 mx-auto d-block'><br><br>
                                                @else  
                                                <img style="height: 250px; width: 250px;" name="student_image" id='studentImg' src="{{asset('/Backend_assets/profile.jpg')}}" alt="image" class='img-responsive img-fluid img-thumbnail rounded-circle mt-5 mx-auto d-block'><br><br>  
                                                @endif
                                                
                                            </div>
                                            <div class="col-lg-6 text-white">
                                                <div class="row">
                                                    <div class="col-lg-12 mt-5">
                                                        <div class="row">
                                                            <div class="col-lg-3"><h4>User Name</h4></div>
                                                            <div class="col-lg-9"><h4>:&nbsp;{{ Auth::user()->name }}</h4></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-3"><h4>Full Name</h4></div>
                                                            <div class="col-lg-9"><h4>:&nbsp;{{ Auth::user()->full_name }}</h4></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-3"><h4>Contract</h4></div>
                                                            <div class="col-lg-9"><h4>:&nbsp;{{ Auth::user()->contract }}</h4></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-3"><h4>Email</h4></div>
                                                            <div class="col-lg-9"><h4>:&nbsp;{{ Auth::user()->email }}</h4></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-3"><h4>Adderss</h4></div>
                                                            <div class="col-lg-9"><h4>:&nbsp;{{ Auth::user()->address }}</h4></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-3"><h4>Login as</h4></div>
                                                            <div class="col-lg-9">
                                                                <h4>:&nbsp;
                                                                    @if(Auth::user()->type==1)
                                                                        Super Admin
                                                                    @elseif(Auth::user()->type==2)
                                                                        Teacher
                                                                    @else
                                                                        Student
                                                                    @endif
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Update Profile --}}
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="card">
                                    <form action="{{route('profile.update',Auth::user()->id)}}"  method="post" enctype="multipart/form-data">@csrf
                                        @method("PUT")
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-3 text-right control-label col-form-label">User Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="name" placeholder="Name Here" name="name" value="{{ Auth::user()->name }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="full_name" class="col-sm-3 text-right control-label col-form-label">Full Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="full_name" placeholder="Full Name Here" name="full_name" value="{{ Auth::user()->full_name }}">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="contract" class="col-sm-3 text-right control-label col-form-label">Contract Number</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="contract" placeholder="Contract Number Here" name="contract" value="{{ Auth::user()->contract }}">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Address </label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control">{{ Auth::user()->address }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">User Image </label>
                                                <div class="col-sm-9">
                                                    @if(Auth::user()->profile_photo_path)
                                                <img style="height: 200px; width: 200px;" name="student_image" id='userImg' src="/{{ Auth::user()->profile_photo_path }}" alt="image" class='img-responsive img-fluid img-thumbnail rounded-circle mt-5 mx-auto d-block'><br><br>
                                                @else  
                                                <img style="height: 200px; width: 200px;" name="student_image" id='userImg' src="{{asset('/Backend_assets/profile.jpg')}}" alt="image" class='img-responsive img-fluid img-thumbnail rounded-circle mt-5 mx-auto d-block'><br><br>  
                                                @endif
                                                <input type='file' id="userImg" name="profile_photo" onchange="readURL(this);" />
                                                <span class="text-danger" id="userImg"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-top">
                                            <div class="card-body">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{-- Update Password --}}
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="card">
                                    <form action="/admin/profile/password"  method="post">
                                        <div class="card-body ">
                                            <div class="form-group row mt-5">
                                                <label for="password" class="col-sm-3 text-right control-label col-form-label">Current Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" id="password" placeholder="Password Here" name="password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="new_password" class="col-sm-3 text-right control-label col-form-label">New Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password Here">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="retype_password" class="col-sm-3 text-right control-label col-form-label">Match Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" name="retype_password" class="form-control" id="retype_password" placeholder=" Match Password Here">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-top">
                                            <div class="card-body">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                            {{-- Other Settings --}}
                            <div class="tab-pane fade" id="nav-setting" role="tabpanel" aria-labelledby="nav-setting-tab">
                                <div class="card">
                                    <h2>No Contant</h2>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
@section('js')
<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#userImg')
                .attr('src', e.target.result)
                .width(200)
                .height(200);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
{{-- <script src="{{asset('Backend_assets/js/class.js')}}"></script> --}}
@endsection