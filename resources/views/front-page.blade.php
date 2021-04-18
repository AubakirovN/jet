@extends('master')

@section('title', 'Главная')
@section('description', 'Частные самолеты на прокат')

@section('content')

<div class="first_position">
        <div class="container">
            <div class="heading">
                <p class="paragraph">Комфорт и лучший сервис</p>
                <h1>Аренда частного самолета</h1>
                <div class="not_logged">
                    <button class="sign_up" type="button" data-toggle="modal" data-target="#exampleModal">
                        Зарегистрироваться
                    </button>
                    <button class="log_in" type="button" data-toggle="modal" data-target="#exampleModal1">
                        Войти
                    </button>
                </div>
            </div>
        </div>
    </div>



    <div class="second_position">
        <div class="container">
            <div class="service_block">
                <div class="leftside">
                    <h2 class="just">Особенности сервиса</h2>
                    <div class="feature">
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
                    </div>
                    <div class="for_navlink">
                        <a href="">Подробнее <img src="/assets/images/arrow-right.svg" alt=""/></a>
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
                <h2 class="just">Наши самолеты</h2>

                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="jet_container">

                                <div class="jet_image">
                                    <img src="/assets/images/citationx.jpg" alt="jet"/>
                                </div>
                                <div class="jet_name">
                                    Citation X
                                </div>
                                <div class="jet_data">
                                    <div class="range">
                                        Дальность полета <span>10 848 км</span>
                                    </div>
                                    <div class="seat">
                                        Количество мест <span>8-19</span>
                                    </div>
                                    <div class="cabin_height">
                                        Высота салона <span>1.88 м</span>
                                    </div>
                                </div>
                                <a href="">Подробнее <img src="/assets/images/arrow-right.svg" alt=""/></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="jet_container">

                                <div class="jet_image">
                                    <img src="/assets/images/citationx.jpg" alt="jet"/>
                                </div>
                                <div class="jet_name">
                                    Citation X
                                </div>
                                <div class="jet_data">
                                    <div class="range">
                                        Дальность полета <span>10 848 км</span>
                                    </div>
                                    <div class="seat">
                                        Количество мест <span>8-19</span>
                                    </div>
                                    <div class="cabin_height">
                                        Высота салона <span>1.88 м</span>
                                    </div>
                                </div>
                                <a href="">Подробнее <img src="/assets/images/arrow-right.svg" alt=""/></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="jet_container">

                                <div class="jet_image">
                                    <img src="/assets/images/citationx.jpg" alt="jet"/>
                                </div>
                                <div class="jet_name">
                                    Citation X
                                </div>
                                <div class="jet_data">
                                    <div class="range">
                                        Дальность полета <span>10 848 км</span>
                                    </div>
                                    <div class="seat">
                                        Количество мест <span>8-19</span>
                                    </div>
                                    <div class="cabin_height">
                                        Высота салона <span>1.88 м</span>
                                    </div>
                                </div>
                                <a href="">Подробнее <img src="/assets/images/arrow-right.svg" alt=""/></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>





    <div class="fourth_position">
        <div class="container">
            <div class="small_info">
                <div class="leftside">
                    <img src="/assets/images/illuminator.jpg" alt="illuminator"/>
                </div>
                <div class="rightside">
                    <h2 class="just">
                        Во что мы верим
                    </h2>
                    <div class="small_heading">
                        Индивидуальный Подход
                    </div>
                    <div class="description">
                        Ваш личный менеджер уделит особое внимание Вашим потребностям и пожеланиям. Каждая деталь Вашего
                        путешествия будет продумана до мелочей, чтобы Вы могли полностью насладиться полетом
                    </div>
                    <div class="small_heading">
                        Качество
                    </div>
                    <div class="description">
                        Исключительное качество сервиса – высшая ценность нашей работы. Мы не просто следуем самым высоким
                        мировым стандартам качества. Мы подняли планку еще выше, что позволяет нам превосходить ожидания
                        самых взыскательных клиентов
                    </div>
                    <a href="">
                        Подробнее о нас
                        <img src="/assets/images/arrow-right.svg" alt=""/>
                    </a>
                </div>
            </div>
        </div>
    </div>

@stop