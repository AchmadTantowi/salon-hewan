@extends('layouts.app')

@section('content')

	<div id="contact-page" class="container">
    	<div class="bg"> 
    		<div class="row">  	
                @if (session('error'))
                    <div class="alert alert-danger">
                    {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                    {{ session('success') }}
                    </div>
                @endif
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
	    				<h2 class="title text-center">Change Password</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="{{ URL('/update-password') }}">
						{{ csrf_field() }}
				            <div class="form-group col-md-12">
				                <input type="password" name="current-password" class="form-control" required="required" placeholder="Current Password">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="password" name="new-password" class="form-control" required="required" placeholder="New Password">
                            </div>  
                            <div class="form-group col-md-12">
                                <input type="password" name="new-password_confirmation" class="form-control" required="required" placeholder="Confirm password">
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