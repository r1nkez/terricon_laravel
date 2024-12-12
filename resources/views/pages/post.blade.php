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
														Автор: <strong>{{ $post->user_id }}</strong>
														</div>
														
													</div>
													<div class="comments">
														({{ $post->getComments()->count(); }}) комментариев<span></span>
													</div>
												</div>
												<figure><a href="#"><img src="{{ $post->preview }}" alt=""></a><figure>
													<p>{{ $post->description }}</p>
													<a href="#" class="button1">Подробнее</a>
											</div>
										</div>
										<hr>
										<h2>Комментарии</h2>
										<form action="{{ route('addComment') }}" method="POST">
											@csrf
											<input type="hidden" name="post_id" value="{{ $post->id }}" />

											@auth 
												<input type="text" readonly placeholder="Введите ваше имя" value="{{ auth()->user()->name }} (#{{ auth()->id() }})" name="author" />
											@else 
												<input type="text" placeholder="Введите ваше имя" name="author" />
											@endauth
											<textarea name="description" placeholder="Описание"></textarea>
											<button type="submit">Отправить</button>
										</form>
										@foreach($post->getComments() as $comment)

										@auth 
											@if(auth()->user()->role === 'admin')
												<p>
													(<small>{{ $comment->created_at }}</small>)
												</p>

												<form action="{{ route('editComment', $comment->id) }}" method="POST">
													@csrf
				
													<input type="hidden" name="id" value="{{ $comment->id }}" />
				
													<input type="text" placeholder="Введите ваше имя" value="{{ $comment->author }}" name="author" />

													<textarea name="description" placeholder="Описание">{{ $comment->description }}</textarea>
													<button type="submit">Сохранить</button>
													<a href="{{ route('deleteComment', $comment->id) }}" style="color: red;">Удалить</a>
												</form>
											@else 
												<p>
													<b>{{ $comment->author }}</b>: 
													{{ $comment->description }} (<small>{{ $comment->created_at }}</small>)
												</p>
											@endif
										@else 
											<p>
												<b>{{ $comment->author }}</b>: 
												{{ $comment->description }} (<small>{{ $comment->created_at }}</small>)
											</p>
										@endif

									
								@endforeach
								
							</div>
						</div>
							
					</div>
				</div>
			</div>
		</div>			
	</div>

@endsection	