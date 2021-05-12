@extends('master')

@section('title', 'Главная')
@section('description', 'Частные самолеты на прокат')

@section('content')
@foreach($slider as $s)
<div class="first_position">
    <div class="container">
        <div class="heading">
            <p class="paragraph">{{$s->getContent()}}</p>
            <h1>{{$s->getTitle()}}</h1>
            @guest
            <div class="not_logged">
                <button class="sign_up" type="button" data-toggle="modal" data-target="#exampleModal">
                    {{trans('options.register')}}
                </button>
                <button class="log_in" type="button" data-toggle="modal" data-target="#exampleModal">
                    {{trans('options.sign_in')}}
                </button>
            </div>
            @endguest
        </div>
    </div>
</div>
@endforeach



    <div class="second_position">
        <div class="container">
            <div class="service_block">
                <div class="leftside">
                    <h2 class="just">{{$service->getTitle()}}</h2>
                    {!! $service->getContent() !!}
                    <!-- <div class="feature">
                        <img src="/assets/images/world.svg" alt="worldwide"/>
                        Логистика путешествия
                    </div>
                    <div class="feature">
                        <img src="/assets/images/message.svg" alt="worldwide"/>
                        Комплексная поддержка
                        и сопровождение полета
                    </div>
                    <div class="feature">
                        <img src="/assets/images/dish.svg" alt="worldwide"/>
                        Высокая кухня на борту
                    </div>
                    <div class="feature">
                        <img src="/assets/images/chair.svg" alt="worldwide"/>
                        VIP залы в аэропортах
                    </div> -->
                    <div class="for_navlink">
                        <a href="/services">{{trans('options.more')}} <img src="/assets/images/arrow-right.svg" alt=""/></a>
                    </div>
                </div>

                <div class="rightside">
                    <img src="/assets/images/salon.jpg" alt="salon"/>
                </div>
            </div>
        </div>
    </div>

    



    <div class="third_position">
        <div class="container">

            <div class="our_jets">
                <h2 class="just">{{trans('options.planes')}}</h2>

                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($planes as $plane)
                        <div class="swiper-slide">
                            <div class="jet_container">

                                <div class="jet_image">
                                    @if($plane->haveImage())
                                    <img src="{{$plane->getImage()}}" alt="jet"/>
                                    @endif
                                </div>
                                <div class="jet_name">
                                    {{$plane->getTitle()}}

                                </div>
                                <div class="jet_data">
                                    <div class="range">
                                        Дальность полета <span>{{$plane->getDuration()}} км</span>
                                    </div>
                                    <div class="seat">
                                        Количество мест <span>{{$plane->getPlaceCount()}}</span>
                                    </div>
                                    <div class="cabin_height">
                                        Высота салона <span>{{$plane->getCabinHeight()}} м</span>
                                    </div>
                                </div>

                                <!-- <a href="{{$plane->getUrl()}}">Подробнее 
                                    <img src="/assets/images/arrow-right.svg" alt=""/>
                                </a> -->
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="fourth_position">
        <div class="container">
            <div class="small_info">
                <div class="leftside">
                    @if($about->haveImage())
                    <img src="{{$about->getImage()}}" alt="illuminator"/>
                    @endif
                </div>
                <div class="rightside">
                    <h2 class="just">
                       {{$about->getTitle()}}
                    </h2>
                    {!! $about->getContent() !!}
                    <a href="/front-about-info">
                        {{trans('options.more')}}
                        <img src="/assets/images/arrow-right.svg" alt=""/>
                    </a>
                </div>
            </div>
        </div>
    </div>

@stop