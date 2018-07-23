@extends('layouts.app')

@section('content')

	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
						</ol>
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>Happy</span>-Pets</h1>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('assets/frontend/images/home/pets-1.png') }}" class="girl img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Happy</span>-Pets</h1>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('assets/frontend/images/home/pets-1.png') }}" class="girl img-responsive" alt="" />
								</div>
							</div>
						</div>
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">	
				<div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Products</h2>
						@foreach($products as $product)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="data:image/png;base64, {{ $product->image }}" width="150px" height="250px" alt="" />
											<h2>Rp. {{ number_format($product->price,0, ',' , '.') }}</h2>
											<p>{{ $product->name }}</p>
											<form action="/salon-hewan/public/addToCart" method="POST">
											<!-- <form action="/addToCart" method="POST"> -->
												{!! csrf_field() !!}
												<input type="hidden" name="id" value="{{ $product->id }}">
												<input type="hidden" name="name" value="{{ $product->name }}">
												<input type="hidden" name="description" value="{{ $product->description }}">
												<input type="hidden" name="price" value="{{ $product->price }}">
												<input type="hidden" name="image" value="{{ $product->image }}">
												<button type="submit" class="btn btn-default add-to-cart">
												<i class="fa fa-shopping-cart"></i>Add to cart
												</button>
											</form>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>Rp. {{ number_format($product->price,0, ',' , '.') }}</h2>
												<p>{{ $product->name }}</p>
												<form action="/salon-hewan/public/addToCart" method="POST">
												<!-- <form action="/addToCart" method="POST"> -->
													{!! csrf_field() !!}
													<input type="hidden" name="id" value="{{ $product->id }}">
													<input type="hidden" name="name" value="{{ $product->name }}">
													<input type="hidden" name="description" value="{{ $product->description }}">
													<input type="hidden" name="price" value="{{ $product->price }}">
													<input type="hidden" name="image" value="{{ $product->image }}">
													<button type="submit" class="btn btn-default add-to-cart">
													<i class="fa fa-shopping-cart"></i>Add to cart
													</button>
												</form>
											</div>
										</div>
								</div>
							</div>
						</div>
						@endforeach
					</div><!--features_items-->

					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Testimoni</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
							@foreach($testimonis as $testimoni)
								<div class="item {{ $loop->first ? 'active' : '' }}">	
									<div class="col-sm-12" style="padding-left:100px;padding-right:100px;">
										<div class="media commnets" style="padding-left:100px;padding-right:100px;">
										<a class="pull-left" href="#">
											<img class="media-object" src="{{ asset('assets/frontend/images/blog/man-one.jpg') }}" alt="">
										</a>
										<div class="media-body">
											<h4 class="media-heading">{{ $testimoni->user->name }}</h4>
											<p>{{ $testimoni->description }}</p>
										</div>
										</div><!--Comments-->
									</div>
								</div>
							@endforeach
							{{-- <div class="item active">	
								<div class="col-sm-12" style="padding-left:100px;padding-right:100px;">
									<div class="media commnets" style="padding-left:100px;padding-right:100px;">
									<a class="pull-left" href="#">
										<img class="media-object" src="{{ asset('assets/frontend/images/blog/man-one.jpg') }}" alt="">
									</a>
									<div class="media-body">
										<h4 class="media-heading">oio</h4>
										<p>ooi</p>
									</div>
									</div><!--Comments-->
								</div>
							</div>
							<div class="item">	
								<div class="col-sm-12" style="padding-left:100px;padding-right:100px;">
									<div class="media commnets" style="padding-left:100px;padding-right:100px;">
									<a class="pull-left" href="#">
										<img class="media-object" src="{{ asset('assets/frontend/images/blog/man-one.jpg') }}" alt="">
									</a>
									<div class="media-body">
										<h4 class="media-heading">ppp</h4>
										<p>ooi</p>
									</div>
									</div><!--Comments-->
								</div>
							</div> --}}
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			 
						</div>
					</div><!--/recommended_items-->

			
				</div>
			</div>
		</div>
	</section>
@endsection