<?php

if(Request::segment(1) == null || ((Request::segment(1) == 'kk' || Request::segment(1) == 'ru' || Request::segment(1) == 'en') && Request::segment(2) == null))
	$path = "";
elseif(Request::segment(1) == 'ru' || Request::segment(1) == 'en')
	$path = str_replace(array('en/', 'ru/'), '',  Request::path());
else
	$path = Request::path();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="description" content="@yield('description')">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link
	rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
	<link rel="stylesheet" href="/assets/css/icomoon.css" type="text/css" />
	<link rel="stylesheet" href="/assets/css/jquery.fancybox.min.css" type="text/css" />
	<link rel="stylesheet" href="/assets/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="/assets/css/swiper.min.css" type="text/css" />
	<link rel="stylesheet" href="/assets/css/personal.css" type="text/css" />
	<link rel="stylesheet" href="/assets/css/media.css" type="text/css" />
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">	
	<title>@yield('title')</title>
</head>
<body>
	<div class="header" id="header">
		<div class="container">
			<div class="header_inner">
				<div class="logo">
					<a href="/">
						<img src="/assets/images/logo.svg" alt="logo"/>
					</a>
				</div>
				<div class=links>
					
					<a href="/about">О нас</a>
					<a href="/help">Помощь</a>

					<div class="dropdown">
						@if(\LaravelLocalization::getCurrentLocale() == 'ru')
						<a href="/ru/{{$path}}" class="dropbtn">
							Рус <img src="/assets/images/polygon-down.svg"/>
						</a>
						<div class="dropdownContent">
							<a href="/en/{{$path}}">Eng</a>
						</div>
						@endif
						@if(\LaravelLocalization::getCurrentLocale() == 'en')
						<a href="/en/{{$path}}" class="dropbtn">
							Eng <img src="/assets/images/polygon-down.svg"/>
						</a>
						<div class="dropdownContent">
							<a href="/ru/{{$path}}">Рус</a>
						</div>
						@endif
						
					</div>
					@guest
					<button class="enter" data-toggle="modal" data-target="#exampleModal">
						{{trans('options.sign_in')}}
					</button>
					@else
					<a href="{{ route('logout') }}" class="enter">{{trans('options.sign_out')}}</a>
					
					@endguest
				</div>
				<span class="opennav" onclick="openNav()">&#9776;</span>
			</div>
		</div>


		<div id="mySidenav" class="sidenav">
			<div class="container">
				<div class="header_inner">
					<div class="logo">
						<img src="/assets/images/logo.svg" alt="logo"/>
					</div>
					<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
				</div>
				
				<div class="mobile_links">
					<button class="enter">
						{{trans('options.sign_in')}}
					</button>
					<a href="/about">О нас</a>
					<a href="/help">Помощь</a>
					<div class="dropdown">
						<button class="dropbtn">
							Рус <img src="/assets/images/polygon-down.svg"/>
						</button>
						<div class="dropdownContent">
							<a href="">Eng</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	@yield('content')

	<footer>
		
		<div class="footer">
			<div class="container">
				<div class="upperside">
					<div class="links">
						<a href="/about">О нас</a>
						<a href="/help">Помощь</a>
						<div class="dropdown">
							@if(\LaravelLocalization::getCurrentLocale() == 'ru')
							<a href="/ru/{{$path}}">
								Рус <img src="/assets/images/polygon-down-grey.svg"/>
							</a>
							<div class="dropdownContent">
								<a href="/en/{{$path}}">Eng</a>
							</div>
							@endif
							@if(\LaravelLocalization::getCurrentLocale() == 'en')
							<a href="/en/{{$path}}">
								Eng <img src="/assets/images/polygon-down-grey.svg"/>
							</a>
							<div class="dropdownContent">
								<a href="/ru/{{$path}}">Рус</a>
							</div>
							@endif
						</div>
						
					</div>
					<div class="social_media">
						<div class="facebook">
							<a href=""><img src="/assets/images/facebook.svg" alt=""/></a>
						</div>
						<div class="twitter">
							<a href=""><img src="/assets/images/twitter.svg" alt=""/></a>
						</div>
						<div class="instagram">
							<a href=""><img src="/assets/images/instagram.svg" alt=""/></a>
						</div>
					</div>
				</div>
				<div class="underside">
					<div class="copyright">
						Copyright © 2021
					</div>
					<div class="confident">
						<a href="/privacy-policy">
							Политика конфидециальности
						</a>
					</div>
				</div>
			</div>
		</div>
	</footer>

<!-- Modal registration -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content" id="modal_registration">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">{{trans('options.register')}}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					
				</div>
				<div class="modal_content">
					<button class="register_login" type="button" id="autorize_button">{{trans('options.login')}}</button>
					<div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
					<form class="modal_form" method="POST" action="{{ route('register') }}">
                        @csrf
						<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{ trans('options.agency') }}" value="{{ old('name') }}" required autocomplete="name" autofocus>
						@error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
						<input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
						@error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
						<input class="form-control @error('phone') is-invalid @enderror" name="phone" type="tel" required placeholder="{{ trans('options.phone') }}">
						@error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
						<input type="password" name="password" placeholder="{{ trans('options.password') }}" class="form-control @error('password') is-invalid @enderror"  required autocomplete="new-password">
						@error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input id="password-confirm" type="password" placeholder="{{ trans('options.confirm_password') }}" class="form-control" name="password_confirmation" required autocomplete="new-password">
						<button type="input">{{ trans('options.register') }}</button>
					</form>
				</div>
			</div>
			<div class="modal-content" id="modal_autorization">
				<div class="modal-header">		
					<h5 class="modal-title" id="exampleModalLabel">{{ trans('options.login') }}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					
				</div>
				<div class="modal_content" >
					<button class="register_login" type="button" id="create_account">{{ trans('options.register') }}</button>
					<form class="modal_form" method="POST" action="{{ route('login') }}">
                        @csrf
				
						<input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
						@error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
						<input type="password" name="password" placeholder="{{ trans('options.password') }}" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
						<button type="submit">{{ trans('options.sign_in') }}</button>
					</form>
				</div>
			</div>
		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>  
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
	<script src="/assets/js/jquery.counterup.min.js"></script>
	<script src="/assets/js/swiper.min.js"></script> 
	<script src="/assets/js/maskedinput.js"></script>
	<script src="/assets/js/jquery.fancybox.min.js"></script> 
	<script src="/assets/js/script.js" defer></script>
	<script src="/assets/js/form_submition.js" defer></script>

<script type="text/javascript">
		let button1 = document.querySelector("#create_account");
		let button2 = document.querySelector("#autorize_button");
		let autorization = document.querySelector("#modal_autorization");
		let registration = document.querySelector("#modal_registration");
		button1.addEventListener("click", () => {
			modal_autorization.style.display= "none";
			modal_registration.style.display= "block";
		});
		button2.addEventListener("click", () => {
			modal_autorization.style.display= "block";
			modal_registration.style.display= "none";
		});



		var swiper = new Swiper('.swiper-container', {
			slidesPerView: 3,
			spaceBetween: 30,
			breakpoints: {
				320: {
					slidesPerView: 1.4,
					spaceBetween: 20,
				},
				768: {
					slidesPerView: 1.7,
					spaceBetween: 20,
				},
				1024: {
					slidesPerView: 3,
					spaceBetween: 30,
				},
			}
		});

        var swiper1 = new Swiper('.swiper-container1', {
            slidesPerView: 1,
            spaceBetween: 50,
            navigation: {
                nextEl: '.swiper-button-next1',
                prevEl: '.swiper-button-prev1',
            },
            pagination: {
                el: '.swiper-pagination1',
            },
        });

    function oneWay()
    {
        if($('.special').is(":checked")) {
        	
        	$(".arrival_city").hide();
        	$(".arrival_date").hide();

        }   
        else {
        	$(".arrival_city").show();
        	$(".arrival_date").show();
            
        }
    }
    
	</script>	
</body>
</html>