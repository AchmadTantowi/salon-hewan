@extends('layouts.app')

@section('content')

	<div id="contact-page" class="container">
    	<div class="bg">
    		<div class="row">  	
	    		<div class="col-sm-12" style="padding-left: 100px;padding-right: 100px;">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Payment Confirmation</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" enctype="multipart/form-data" name="contact-form" method="post" action="/sendPaymentConfirmation">
						{{ csrf_field() }}
				            <div class="form-group col-md-12">
				                <input type="text" name="bank_account" class="form-control" required="required" placeholder="Bank Account">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="account_number" class="form-control" required="required" placeholder="Account Number">
                            </div>
                            <div class="form-group col-md-12">
				                <input type="number" name="amount" class="form-control" required="required" placeholder="Amount">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Proof of payment</label>
				                <input type="file" name="file" class="form-control" required="required" placeholder="Proof of payment">
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