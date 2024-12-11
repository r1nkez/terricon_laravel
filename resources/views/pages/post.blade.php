@extends('layouts.app-pages')
@section('title', 'Блог')

@section('content')

<div id="content">
	<div class="ic">More Website Templates @ TemplateMonster.com - April 15, 2013!</div>
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
				<div class="grid_12">
						<div class="wrapper">
							<div class="grid_8 alpha">
								<div class="grid-inner">
								<h2 class="h-pad h-indent">{{ $post->name }}</h2>

								
										<div class="block">
											<div class="post">
												<div class="wrapper">
													<div class="info">
														<div class="wrapper">
															<div class="date">
																<span>may</span><strong>15</strong>
															</div>
														Author: <strong>{{ $post->user_id }}</strong>
														</div>
														
													</div>
													<div class="comments">
														No comments<span></span>
													</div>
												</div>
												<figure><a href="#"><img src="{{ $post->preview }}" alt=""></a><figure>
													<p>{{ $post->description }}</p>
													<a href="#" class="button1">Подробнее</a>
											</div>
										</div>
								
							</div>
						</div>
							
					</div>
				</div>
			</div>
		</div>			
	</div>

@endsection	