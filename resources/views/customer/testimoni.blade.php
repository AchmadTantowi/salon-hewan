@extends('layouts.app')

@section('content')

	<div id="contact-page" class="container">
    	<div class="bg">
    		<div class="row">  	
	    		<div class="col-sm-12" style="padding-left: 100px;padding-right: 100px;">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Testimoni</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="/sendTestimoni">
                        {{ csrf_field() }}
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