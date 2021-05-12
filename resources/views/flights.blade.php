@extends('master')

@section('title', 'Рейсы')
@section('description', 'Частные самолеты на прокат')

@section('content')

<div class="flights">
        <div class="container">
            @if(isset($flights))
                @foreach ($flights as $f)
                
                <div class="desktop">
                <div class="orderflights">
                    <div class="photos_slider">
                        <div class="swiper-container swiper-container1">
                            <div class="swiper-wrapper">
                             
                                <div class="swiper-slide"><img src="{{$f->getPlaneImage()}}" alt="jet"/></div>
                                <!-- <div class="swiper-slide"><img src="/assets/images/falcon.jpg" alt="jet"/></div>
                                <div class="swiper-slide"><img src="/assets/images/falcon.jpg" alt="jet"/></div> -->
                               
                            </div>
                            <div class="swiper-button-next swiper-button-next1"></div>
                            <div class="swiper-button-prev swiper-button-prev1"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="flightdata_container">
                        <div class="leftside">
                            <div class="top">
                                <div class="cities">
                                    <span class="source_city">{{$f->getDepartureCity()}}</span> – <span
                                    class="destination_city">{{$f->getArrivalCity()}}</span>
                                </div>
                                <div class="date">
                                    {{$f->getFlightDate()}}

                                </div>
                                <div class="jet_model">
                                    {{ $f->getPlaneTitle() }}
                                </div>
                            </div>
                            <div class="bottom">
                                <div class="cities_shortname">
                                    <div class="departure_point">{{ $f->getDepartureAirport('code') }}</div>
                                    <div class="line">
                                    </div>
                                    <div class="arrival_point">{{ $f->getArrivalAirport('code') }}</div>
                                </div>
                                <div class="time">
                                    <div class="departure_time">{{ $f->getDepartureTime() }}</div>
                                    <div class="duration_time">{{ $f->getDuration() }}</div>
                                    <div class="arrival_time">{{ $f->getArrivalTime() }}</div>
                                </div>
                                
                            </div>

                        </div>
                        <div class="rightside">
                            <div class="top">
                                <div class="services">
                                    @if($f->haveTerminal())
                                    <img src="/assets/images/vip.svg" alt="vip"/>
                                    @endif
                                    @if($f->haveFood())
                                    <img src="/assets/images/appliances.svg" alt="appliances"/>
                                    @endif
                                    @if($f->haveDepartureTransfer())
                                    <img src=/assets/images/car.svg alt="car"/>
                                    @endif
                                </div>
                            </div>
                            <div class="bottom">
                                <div class="price">
                                    ${{ $f->getCost() }}
                                </div>
                                <div class="za_mesto">
                                    {{ trans('options.seat') }}
                                </div>
                                <div class="seats">
                                    <span class="available">12</span> {{ trans('options.out_of') }} <span
                                    class="all">20</span> {{ trans('options.available') }}
                                </div>
                                <div class="order">
                                    <a href="{{ $f->viewFlight()}}" class="btnBook">{{ trans('options.book') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
            
           
            <div class="mobile_version">
                <div class="mobile_flight">
                    <div class="cities">
                        <div class="cities_inner">
                            <span class="source_city">{{$f->getDepartureCity()}}</span> – <span
                            class="destination_city">{{$f->getArrivalCity()}}</span>
                        </div>
                        <div class="date">
                            {{$f->getFlightDate()}}
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="leftside">
                            <div class="time">
                                <span class="destination_time">{{ $f->getDepartureTime() }}</span> –
                                <span class="arrival_time">{{ $f->getArrivalTime() }}</span>
                            </div>
                            <div class="upperside">
                                <span class="available">12</span> из <span
                                class="all">{{ $f->getCountPlace() }}</span> мест доступно
                            </div>
                        </div>
                        <div class="rightside">
                            <div class="price">
                                ${{ $f->getCost() }}
                            </div>
                            <div class="za_mesto">
                                за место
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
            @endif
            
            <div class="just_words">{{ trans('options.find_flight') }}</div>
            <div class="just_word_two">{{ trans('options.find_desc') }}</div>
            <div class="order_other_flight">
                <button type="button" data-toggle="modal" data-target="#flight_request">{{ trans('options.flight_request') }}</button>
            </div>
        </div>
    </div>


    <div class="modal fade" id="flight_request" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modal_registration">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Запрос рейса</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    
                </div>
                <div class="modal_content">

                    <form class="modal_form" action="javascript:void(0)" method="POST" id="request-form">
                         @csrf
                        <input type="text" name="departure_city" required="" placeholder="Откуда">
                        <input type="text" name="arrival_city" class="arrival_city" required="" placeholder="Куда">
                        <div class="form_checkbox">
                            <input class="special" type="checkbox" name="one_way" value="a1" onchange="oneWay()"><span>В один конец</span>
                        </div>
                        <input type="tel" id="flight_date" name="departure_date" required="" placeholder="Дата вылета">
                        <input type="tel" id="arrival_date" class="arrival_date" name="arrival_date" required="" placeholder="Дата возвращения">
                        <div class="for_quantity">
                            <div class="quantity_text">Количество мест</div>
                            <div class="quantity">
                                <a href="#" class="quantity__minus"><span>-</span></a>
                                <input name="count_place" type="text" class="quantity__input" value="1">
                                <a href="#" class="quantity__plus"><span>+</span></a>
                            </div>
                        </div>
                        <input type="text" name="name" required placeholder="Название агенства">
                        <input type="text" name="email" required placeholder="Email" value="{{Auth::user()->email }}" readonly>
                        <input class="phone" type="tel" name="phone" required placeholder="Номер телефона" value="{{Auth::user()->phone }}" >
                        <input type="hidden" name="user_id" value="{{Auth::user()->id }}">
                        <button type="submit" id="send_request">Запросить рейс</button>
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
        </div>
    </div>
@stop