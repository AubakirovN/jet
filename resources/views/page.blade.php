@extends('master')

@section('title', $page->getTitle())
@section('description', 'Частные самолеты на прокат')

@section('content')

	<div class="second_position">
        <div class="container page">
            <div class="service_block">
                <div class="leftside">
                    <h2 class="just">{{$page->getTitle()}}</h2>
                    {!! $page->getContent() !!}
                   
                </div>

                <div class="rightside">
                    <img src="/assets/images/salon.jpg" alt="salon"/>
                </div>
            </div>
        </div>
    </div>
	
@stop