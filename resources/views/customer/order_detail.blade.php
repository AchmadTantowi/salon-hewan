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
				  <li><a href="{{ url('/order') }}">Order</a></li>
				  <li class="active">Order detail</li>
				</ol>
			</div>
			<div class="step-one">
				<h2 class="heading">#{{ $orders->order_id }}</h2>
            </div>
            <table id="customers">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1;
                foreach($orderDetails as $orderDetail):
                ?>
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $orderDetail->product->name }}</td>
                        <td>{{ $orderDetail->qty }}</td>
                        <td>Rp. {{ number_format($orderDetail->subtotal,0, ',' , '.') }}</td>
                    </tr>
                <?php
                endforeach;
                ?>
                <tr>
                    <td colspan="3"><b>Total Price</b></td>
                    <td><b>Rp. {{ number_format($orders->total,0, ',' , '.') }}</b></td>
                </tr>
                </tbody>
            </table>
		</div>
	</section> <!--/#cart_items-->
<br><br><br>
@endsection