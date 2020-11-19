@extends('Backend.layouts.app')
@section('title', 'About Developer')
@section('head', 'About Developer')
@section('head_name', 'About Developer')
@section('content')
@section('css')
<link href="{{asset('Backend_assets/css/about_dev.css')}}" rel="stylesheet" />
@endsection

<div class="container d-flex justify-content-center">
    <div class="card p-3 py-4">
        <div class="text-center"> <img src="{{'/Backend_assets/assets/images/developer/jubair.jpg'}}" width="100" class="rounded-circle">
            <h3 class="mt-2">Ahsan Mahbub</h3>
            <span class="mt-1 clearfix">Web Designer & Developer</span>
            <small class="mt-4">Describe Developer Details</small>
            <div class="social-buttons mt-5">
                <button class="neo-button"><a href="https://www.facebook.com/mahbub.jubair/" target="_blank"><i class="fab fa-facebook-f"></i></a></button>
                <button class="neo-button"><a href="https://www.linkedin.com/in/ahsan-mahbub-27735a1b3/" target="_blank"><i class="fab fa-linkedin-in"></i></a></button>
                <button class="neo-button"><a href="https://github.com/Ahsan-Mahbub" target="_blank"><i class="fab fa-github"></i></a></button>
                <button class="neo-button"><a href="https://twitter.com/jubair_mahbub" target="_blank"><i class="fab fa-twitter"></i></a></button>
            </div>
        </div>
    </div>
    <div class="card p-3 py-4">
        <div class="text-center"> <img src="{{'/Backend_assets/assets/images/developer/komol.jpg'}}" width="150" class="rounded-circle">
            <h3 class="mt-2">Komol Chandra</h3>
            <span class="mt-1 clearfix">Web Designer & Developer</span>
            <small class="mt-4">Describe Developer Details</small>
            <div class="social-buttons mt-5">
                <button class="neo-button"><i class="fab fa-facebook-f"></i> </button>
                <button class="neo-button"><i class="fab fa-linkedin-in"></i></button>
                <button class="neo-button"><i class="fab fa-github"></i> </button>
                <button class="neo-button"><i class="fab fa-twitter"></i> </button>
            </div>
        </div>
    </div>
    <div class="card p-3 py-4">
        <div class="text-center"> <img src="{{'/Backend_assets/assets/images/developer/nipen.jpg'}}" width="100" class="rounded-circle">
            <h3 class="mt-2">Nipen Mojumder</h3>
            <span class="mt-1 clearfix">Web Designer & Developer</span>
            <small class="mt-4">Describe Developer Details</small>
            <div class="social-buttons mt-5">
                <button class="neo-button"><i class="fab fa-facebook-f"></i> </button>
                <button class="neo-button"><i class="fab fa-linkedin-in"></i></button>
                <button class="neo-button"><i class="fab fa-github"></i> </button>
                <button class="neo-button"><i class="fab fa-twitter"></i> </button>
            </div>
        </div>
    </div>
</div>

@endsection
