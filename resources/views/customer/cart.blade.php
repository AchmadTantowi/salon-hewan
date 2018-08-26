@extends('layouts.app')
@section('css')
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #FE980F;
    color: white;
}
</style>
@stop
@section('content')

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{ url('/') }}">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table id="customers">
					<thead>
						<tr>
							<th>Name</th>
							<th>Price</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>	
					<?php 
					if (count(Cart::content()) > 0) {
						foreach(Cart::content() as $row) :
						?>
							<tr>
								<td>
									{{ $row->name }}
								</td>
								<td>
									Rp. {{ number_format($row->price,0, ',' , '.') }}
								</td>
								<td>
									<a href="{{ url('/cart-remove/') }}/{{$row->rowId}}">Delete</a>
								</td>
							</tr>
						<?php 
						endforeach;
					} else {
					?>
						<tr>
							<td colspan='3' align='center'>
								Cart is empty
							</td>
						</tr>
					<?php
					}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<?php if (count(Cart::content()) > 0) { ?>
	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Silahkan lakukan pembayaran</h3>
			</div><br>
			<div class="row">
				<form role="form" method="POST" action="{{ url('/save-order') }}">
				{{ csrf_field() }}
				
				<?php foreach(Cart::content() as $row) :?>
				<input type="hidden" name="user_id[]" value="{{ Auth::user()->id }}">
				<input type="hidden" name="product_id[]" value="{{ $row->id }}">
				<input type="hidden" name="total[]" value="{{ Cart::subtotal() }}">
				<?php endforeach; ?>
					<div class="col-sm-12">
						<label for="">Alamat Tujuan</label>
						<input type="text" class="form-control" id="address" name="alamat" value="{{ Auth::user()->address }}" disabled>
						<input type="checkbox" id="isEdit" /> Edit<br><br>
						<label for="">Notes</label>
						<textarea name="notes" class="form-control" rows="4" placeholder="Isi waktu dan jam pelaksanaan"></textarea>
						
						<br><br>
						<div class="total_area">
							<ul>
							<p style="font-size: 16px;">Transfer pembayaran sebesar <b>Rp. <?php echo Cart::subtotal(); ?></b><br> setelah selesai melakukan pembayaran silahkan lakukan konfirmasi pembayaran</p>
							<p style="font-size: 16px;">Pilih salah satu nomor rekening di bawah untuk melakukan pembayaran</p>
							<table id="customers">
								<thead>
									<tr>
										<th>Bank</th>
										<th>Account Number</th>
										<th>Account Name</th>
									</tr>
								</thead>
								<tbody>	
									@foreach($banks as $bank)
									<tr>
										<td>
											{{ $bank->bank_name }}
										</td>
										<td>
											{{ $bank->account_number }}
										</td>
										<td>
											{{ $bank->account_name }}
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							</ul>
							<button type="submit" class="btn btn-default update">Selesai</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
	<?php } ?>

@endsection
@section('script')
<script>
	$('#isEdit').change(function(){
		if ($('#isEdit').is(':checked') == true){
			$('#address').prop('disabled', false);
		} else {
			$('#address').prop('disabled', true);
		}
	});
</script>
@stop