@extends('layouts.app-pages')

@section('title', 'Цой Константин')

@section('content')

    <div id="content">
        <div class="ic">More Website Templates @ TemplateMonster.com - April 15, 2013!</div>
        <div id="slider">
            <div class="container_12">
                <div class="grid_12">
                <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
            <div data-src="/images/slide1.jpg">
                <div class="camera_caption fadeIn">
                    <h2>Мои последние проекты</h2>
                        Изучите мои последние работы ниже
                        <p><a href="{{route('pages', 'works')}}" class="button">Изучить работы</a></p>
                </div>
            </div>
            <div data-src="/images/slide2.jpg">
                <div class="camera_caption fadeIn">
                    <h2>biz.Power</h2>
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat uis aute irure dolor reprehender.
                        <p><a href="#" class="button">More Info</a></p>
                </div>
            </div>
            <div data-src="/images/slide3.jpg">
                <div class="camera_caption fadeIn">
                    <h2>Development</h2>
                        Voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat roident, sunt in culpa qui officia.
                        <p><a href="#" class="button">More Info</a></p>
                </div>
            </div>
            </div>
            </div>
        </div>
        </div>
        <div class="inner">
            <div class="container_12">
                <div class="wrapper">
                    <div class="grid_12">
                        <div class="block">
                            <div class="info-block">
                                <a href="https://t.me/r1nkez" rel="nofollow" >Заказать</a> Разработку у меня по скидке
                            </div>
                            <a href="http://bayguzin.ru/assets/files/2014/08/biznes.zip" class="button" rel="nofollow">Заказать!</a>
                        </div>
                    </div>
                </div>
                <div class="wrapper">
                    <div class="block">
                        <div class="grid_8">
                            <div class="grid-inner">
                            <h2>Привет!</h2>
                                <div class="wrapper">
                                    <figure class="img-indent"><img src="/images/image1.jpg" alt=""></figure>
                                    Меня зовут Цой Константин и я новичок в web-разработке
                                </div>
                                <p class="pad">Мои скиллы: </p>
                                @if($skills)
                                    @foreach($skills as $skill)
                                        <span class="badge"><b>{{ $skill->name }}</b> ({{ $skill->lvl }}%)</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="grid_4">
                            <h2>Testimonials</h2>
                            <div class="testimonial-block">
                                <em>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minim veniam, quis nostrud.</em><p><strong>— Patrick Pool, Romonson</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrapper">
                    <div class="grid_12">
                        <h2 class="h-pad">Our Clients</h2>
                        <ul class="clients-list">
                            <li><a href="#"><img src="/images/client1.png" alt=""></a></li>
                            <li><a href="#"><img src="/images/client2.png" alt=""></a></li>
                            <li><a href="#"><img src="/images/client3.png" alt=""></a></li>
                            <li><a href="#"><img src="/images/client4.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>			
        </div>
    </div>

@endsection