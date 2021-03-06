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
				  <li class="active">Order</li>
				</ol>
            </div>
            <table id="customers">
                <thead>
                    <tr>
                        <th># Order</th>
                        <th>Date</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                foreach($orders as $order):
                ?>
                    <tr>
                        <td>{{ $order->order_id }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>Rp. {{ number_format($order->total,0, ',' , '.') }}</td>
                        <td>{{ $order->status }}</td>
                        <!-- <td><a href="/order/detail/{{ $order->order_id }}">Detail</a></td> -->
                        <td><a href="{{ url('/order/detail') }}/{{ $order->order_id }}">Detail</a></td>
                    </tr>
                <?php
                endforeach;
                ?>
                </tbody>
            </table>
		</div>
	</section> <!--/#cart_items-->
<br><br><br>
@endsection