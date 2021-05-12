@extends('master')

@section('title', 'Главная')
@section('description', 'Частные самолеты на прокат')

@section('content')

    <div class="detail">
        <div class="container">
            <div class="leftside">
                <div class="cities">
                    {{ $flight->getDepartureCity() }} – {{ $flight->getArrivalCity() }}
                </div>
                <div class="data_container">
                    <div class="flight_info" id="info">
                        <div class="date">
                            <div class="dest_date">{{ $flight->getFlightDate() }}</div>
                            <div class="arrival_date">{{ $flight->getArrivalDate() }}</div>
                        </div>
                        <div class="time">
                            <div class="dest_time">{{ $flight->getDepartureTime() }}</div>
                            <div class="duration">{{ $flight->getDuration() }}</div>
                            <div class="arrival_time">{{ $flight->getArrivalTime() }}</div>
                        </div>
                        <div class="flight_cities">
                            <div class="dest_city">{{ $flight->getDepartureAirport('code') }}</div>
                            <div class="straight_line"></div>
                            <div class="arrival_city">{{ $flight->getArrivalAirport('code') }}</div>
                        </div>
                        <div class="flight_points">
                            <div class="dest_point">{{ $flight->getDepartureAirport() }}</div>
                            <div class="arrival_point">{{ $flight->getArrivalAirport() }}</div>
                        </div>
                    </div>
                </div>

                <div class="customer_data">
                    <div class="show_block" id="form_block"></div>
                    <form action="javascript:void(0)" method="POST" id="post-form">
                         @csrf
                        <input type="hidden" name="flight_id" value="{{ $flight->ID }}"/>
                        <input type="hidden" name="departure_city" value="{{ $flight->getDepartureCity() }} ({{ $flight->getDepartureAirport('code') }})"/>
                        <input type="hidden" name="arrival_city" value="{{ $flight->getArrivalCity() }} ({{ $flight->getArrivalAirport('code') }})"/>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
                        <input type="hidden" name="departure_date" value="{{ $flight->getFlightDate() }} -  {{ $flight->getDepartureTime() }}"/>
                        <input type="hidden" name="flight_duration" value="{{ $flight->getDuration() }}"/>
                        <input type="hidden" name="plane" value="{{ $flight->getPlaneTitle() }} "/>
                        <div class="input_wrapper">
                            <input class="customer_name" name="name" type="text" placeholder="{{ trans('options.name') }}"/>
                        </div>
                        <div class="input_wrapper">
                            <input class="customer_mail" name="email" type="text" value="{{ Auth::user()->email }}" readonly/>
                        </div>
                        <div class="input_wrapper">
                            <input class="customer_tel" name="phone" type="tel" placeholder="+7 777 777 77 77" value="{{Auth::user()->phone }}"/>
                        </div>
                        <div class="for_quantity">
                            <div class="quantity_text">{{ trans('options.number') }}</div>
                            <div class="quantity">
                                <a href="#" class="quantity__minus"><span>-</span></a>
                                <input name="count_place" type="text" class="quantity__input" value="1">
                                <a href="#" class="quantity__plus"><span>+</span></a>
                            </div>
                            <span class="text-danger p-1">{{ $errors->first('count_place') }}</span>
                        </div>
                        <textarea name="comment" cols="30" rows="10">
                        </textarea>
                        <span class="text-danger p-1">{{ $errors->first('comment') }}</span>
                        <button class="yellow" type="submit" id="send_form">{{ trans('options.send_request') }}</button>
                    </form>
                    <div class="before_submit" id="if_successful">
                        <div class="circle_check">
                            <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M32 56C45.2548 56 56 45.2548 56 32C56 18.7452 45.2548 8 32 8C18.7452 8 8 18.7452 8 32C8 45.2548 18.7452 56 32 56Z" stroke="#39AE45" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M24 32.0003L29.3333 37.3337L40 26.667" stroke="#39AE45" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            
                        </div>
                        <div class="success_text">
                            Ваш запрос отправлен.
                            Мы свяжемся с вами в течение часа
                        </div>  
                    </div>
                    <div class="ajax_loader" id="ajax_loader">
                        <div class="spinner"><div></div></div>
                    </div>
                </div>

            </div>
            <div class="rightside">
                <div class="carousel">
                    <div class="swiper-container swiper-container1">
                        <div class="swiper-wrapper">
                            @if(isset($images))
                            @foreach($images as $img)
                            <div class="swiper-slide"><img src="{{$img}}" alt="jet"/></div>
                            <!-- <div class="swiper-slide"><img src="images/falcon.jpg" alt="jet"/></div>
                            <div class="swiper-slide"><img src="images/falcon.jpg" alt="jet"/></div> -->
                            @endforeach
                            @endif
                        </div>
                        <div class="swiper-button-next swiper-button-next1"></div>
                        <div class="swiper-button-prev swiper-button-prev1"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="bottom_slider">
                    <div class="leftside">
                        <div class="model">
                            {{$flight->getPlaneTitle()}}
                        </div>
                        <div class="upperside">
                            <span class="available">{{ $flight->getBookedPlace() }}</span> {{ trans('options.out_of') }} <span
                            class="all">{{ $flight->getCountPlace() }}</span> {{ trans('options.available') }}
                        </div>
                    </div>
                    <div class="rightside">
                        <div class="price">
                            ${{ $flight->getCost() }}
                        </div>
                        <div class="za_mesto">
                            {{ trans('options.seat') }}
                        </div>
                    </div>
                </div>
                <div class="facilities">
                    <div class="just">
                         {{ trans('options.comfort') }}
                    </div>
                    <div class="facil_container">
                        @if($flight->haveTerminal())
                        <div class="vip">
                            <img src="/assets/images/vip.svg" alt="vip"/> <span>{{ trans('options.terminal') }}</span>
                        </div>
                        @endif
                        @if($flight->haveFood())
                        <div class="eda">
                            <img src="/assets/images/appliances.svg" alt="appliances"/> <span>{{ trans('options.food') }}</span>
                        </div>
                        @endif
                        @if($flight->haveDepartureTransfer())
                        <div class="car">
                            <img src=/assets/images/car.svg alt="car"/> <span>{{ trans('options.transfer') }}</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop