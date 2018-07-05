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
				  <li><a href="/salon-hewan/public/">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table id="customers">
					<thead>
						<tr>
							<th>Name</th>
							<th>Price</th>
							<th></th>
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
								<a href="/salon-hewan/public/cart-remove/{{$row->rowId}}">Delete</a>
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
			</div>
			<div class="row">
				<form role="form" method="POST" action="/salon-hewan/public/save-order">
				{{ csrf_field() }}
				<?php foreach(Cart::content() as $row) :?>
				<input type="hidden" name="user_id[]" value="{{ Auth::user()->id }}">
				<input type="hidden" name="product_id[]" value="{{ $row->id }}">
				<input type="hidden" name="total[]" value="{{ Cart::total() }}">
				<?php endforeach; ?>
					<div class="col-sm-12">
						<div class="total_area">
							<ul>
							<p style="font-size: 16px;">Transfer pembayaran sebesar <b>Rp. <?php echo Cart::total(); ?></b> ke rekening BCA dengan nomor rekening 11 2222 344 a/n Happy Pets,<br> setelah selesai melakukan pembayaran silahkan lakukan konfirmasi pembayaran</p>
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