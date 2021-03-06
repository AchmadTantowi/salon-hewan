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
	    				<h2 class="title text-center">Testimoni</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
					<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="{{ url('/sendTestimoni') }}">
						{{ csrf_field() }}
							<div class="form-group col-md-12">
								<select class="form-control" name="order_id">
									<option disabled>-- Order ID --</option>
									@foreach($list_orders as $list_order)
										<option value="{{$list_order->order_id}}">{{$list_order->order_id}}</option>
									@endforeach
								</select>
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="title" class="form-control" required="required" placeholder="Title">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="description" class="form-control" required="required" placeholder="Description">
				            </div>            
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
	    		</div>		
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->

@endsection