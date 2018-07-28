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
	    				<h2 class="title text-center">Payment Confirmation</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" enctype="multipart/form-data" name="contact-form" method="post" action="{{ url('/sendPaymentConfirmation') }}">
						{{ csrf_field() }}
							<div class="form-group col-md-12">
								<select class="form-control" name="order_id">
									<option value="">-- Order ID --</option>
									@foreach($list_orders as $list_order)
										<option value="{{$list_order->order_id}}">{{$list_order->order_id}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-md-12">
								<input type="hidden" name="amount" id="amount" class="form-control" required="required" placeholder="Amount" readonly>
								<input type="number" name="rupiah" id="rupiah" class="form-control" required="required" readonly>							
							</div>
				            <div class="form-group col-md-12">
				                <input type="text" name="bank_account" class="form-control" required="required" placeholder="Bank Account">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="account_number" class="form-control" required="required" placeholder="Account Number">
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
@section('script')
<script type="text/javascript">
  $("select[name='order_id']").change(function(){
	
	  var order_id = $(this).val();
	  var token = $("input[name='_token']").val();
	  $.ajax({
		  url: "{{ route('select-amount') }}",
		  method: 'POST',
		  data: {order_id:order_id, _token:token},
		  success: function(data) {
			var	number_string = data.options.total.toString(),
			sisa 	= number_string.length % 3,
			rupiah 	= number_string.substr(0, sisa),
			ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
				
			if (ribuan) {
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
			
			$("#amount").val(data.options.total);
			$("#rupiah").val(rupiah);
		  }
	  });
  });
</script>
@stop