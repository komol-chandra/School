{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label value="{{ __('Email') }}" />
                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="{{asset('Backend_assets/auth_assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('Backend_assets/auth_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('Backend_assets/auth_assets/vendor/animate/animate.css')}}">	
	<link rel="stylesheet" type="text/css" href="{{asset('Backend_assets/auth_assets/vendor/css-hamburgers/hamburgers.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('Backend_assets/auth_assets/vendor/select2/select2.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('Backend_assets/auth_assets/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('Backend_assets/auth_assets/css/main.css')}}">
</head>
<body>
	@if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{asset('Backend_assets/auth_assets/images/02.png')}}" alt="IMG">
                </div>
                
                    <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                        @csrf
					<span class="login100-form-title">
						Member Login
					</span>
                    <div>
                    <p>mail:info@info.com</p>
                    <p>pass:info@info.com</p>
                    </div>
					<div class="wrap-input100 validate-input mt-3" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" name="email" :value="old('email')" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" required autocomplete="current-password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<input type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="{{ route('password.request') }}">
							Username / Password?
						</a>
                    </div>
                    {{-- <div class="text-center p-t-13">
                        <a class="txt2" href="{{ route('register') }}">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div> --}}

					
				</form>
			</div>
		</div>
	</div>	
	<script src="{{asset('Backend_assets/auth_assets/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('Backend_assets/auth_assets/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('Backend_assets/auth_assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('Backend_assets/auth_assets/vendor/select2/select2.min.js')}}"></script>
	<script src="{{asset('Backend_assets/auth_assets/vendor/tilt/tilt.jquery.min.js')}}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="{{asset('Backend_assets/auth_assets/js/main.js')}}"></script>
</body>
</html>