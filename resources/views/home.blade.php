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
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<p>Happy Pets Mobil Grooming adalah salon anjing dan kucing pertama di Indonesia yang menyediakan jasa grooming & hair spa di rumah pelanggan. Service kami sangat diminati oleh mereka yang menginginkan privasi & kenyamanan salon exclusive tanpa harus meninggalkan rumah. Kualitas kerja dan service kami terjamin dengan harga terjangkau.</p><br>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('assets/frontend/images/home/pets-1.png') }}" class="girl img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
			                  		<p>
				                    	Kami Menawarkan Jasa : 
					                    <ol>
					                      <li>Bathing Dog and Cat (Memandikan Anjing dan Kucing)</li>
					                      <li>Skin & Coat Conditioning (Perawatan Kulit dan Bulu)</li>
					                      <li>Hair Spa and Message</li>
					                      <li>Cukur Model</li>
					                      <li>Blow Dry</li>
					                      <li>Gunting Kuku</li>
					                      <li>Membersihkan Kuping</li>
					                      <li>Basmi Kutu</li>
					                    </ol>
				                  	</p>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('assets/frontend/images/home/pets-1.png') }}" class="girl img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
			                  		<p>
				                    	Keuntungan Menggunakan Jasa Kami: 
					                    <ol>
					                      	<li>
					                      		Anjing atau Kucing anda akan merasa lebih nyaman & tidak stress apabila dilakukan di rumah
					                      	</li>
				                     	 	<li>
					                      		Jauh dari resiko tertular penyakit dari anjing dan kucing lain apabila perawatan dilakukan di rumah 
					                      	</li>
					                      	<li>
					                      		Anda dapat melihat dan mengawasi cara kerja kami, sehingga anda tidak perlu merasa khawatir 
					                      	</li>
					                      	<li>
					                      		Anda tidak perlu ber macet - macetan mengantarkan hewan peliharaan anda ke salon. Cukup dengan menelpon dan membuat janji, kami akan datang sesuai schedule yang telah ditentukan
				                  			</li>
					                    </ol>
				                  	</p>
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
											<!-- <form action="/salon-hewan/public/addToCart" method="POST"> -->
											<form action="{{ url('/addToCart') }}" method="POST">
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
												<!-- <form action="/salon-hewan/public/addToCart" method="POST"> -->
												<form action="{{ url('/addToCart') }}" method="POST">
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