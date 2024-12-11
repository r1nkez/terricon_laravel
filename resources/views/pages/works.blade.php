@extends('layouts.app-pages')

@section('title', 'Портфолио')

@section('content')

	<div id="content">
		<div class="inner">
			<div class="container_12">
				<div class="wrapper">
					<div class="grid_12">
						<div class="block">
							<div class="info-block">
								<div class="info-block">
									<a href="https://t.me/r1nkez" rel="nofollow" >Заказать</a> Разработку у меня по скидке
								</div>
								<a href="http://bayguzin.ru/assets/files/2014/08/biznes.zip" class="button" rel="nofollow">Заказать!</a>
						</div>
					</div>
				</div>
				<div class="wrapper">
					<div class="grid_12">
						<h2 class="h-pad1">Портфолио</h2>
						<ul class="wrapper works">
							@foreach($portfolios as $p)
							<li class="grid_4 alpha">
								<figure><img src="/images/works{{ $p->id }}.jpg" alt=""></figure>
								<p>{{ $p->name }} | {{ $p->price }} {{ $p->val }} | {{ $p->category }} </p>
								<p><a href="#" class="button">Узнать больше</a></p>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>			
		</div>
	</div>

@endsection