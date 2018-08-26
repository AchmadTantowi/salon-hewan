@extends('layouts.app')

@section('content')

	<div id="contact-page" class="container">
    	<div class="bg">
    		<div class="row">  	
	    		<div class="col-sm-12" style="padding-left: 100px;padding-right: 100px;">
					@if (count($errors) > 0)
					<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
					</div>
					@endif  
	    			<div class="contact-form">
	    				<h2 class="title text-center">Edit Profile</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="{{ url('/update-profile') }}/{{ Auth::user()->id }}">
						{{ csrf_field() }}
				            <div class="form-group col-md-12">
				                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required="required" placeholder="Name">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required="required" placeholder="Email">
                            </div>  
                            <div class="form-group col-md-12">
                                <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}" required="required" placeholder="Phone">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="address" rows="5" placeholder="Address">{{ Auth::user()->address }}</textarea>
                            </div>              
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Update">
				            </div>
				        </form>
	    			</div>
	    		</div>		
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->

@endsection