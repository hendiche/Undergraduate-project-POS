@extends('master.index')
@push('pageStyle')
<style type="text/css">
	.d-flex {
		display: flex;
	}
	.d-flex > div {
		flex: 1
	}
	#cart-list {
		margin-top: 25px;
	}
	#cart-list table {
		border: 1px solid #eee;
	}
	#cart-list th {
		color: #fff;
	}
	#cart-list .image {
		padding-left: 5px !important;
	}
</style>
@endpush
@section('content')
<section>
	<div class="container">
		<h1 class="text-center">HISTORY DETAILS</h1>
		<hr />
		<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
			<div class="d-flex">
				<div><h3>Receipt Number</h3></div>
				<div><h3>: {{ $detail->number }}</h3></div>
			</div>
			<div class="d-flex">
				<div><h3>Name</h3></div>
				<div><h3>: {{ ucfirst($detail->user->name) }}</h3></div>
			</div>
			<div class="d-flex">
				<div><h3>Date Order</h3></div>
				<div><h3>: {{ Carbon\Carbon::parse($detail->date)->format('d - M - Y') }}</h3></div>
			</div>
			<div class="d-flex">
				<div><h3>Total Price</h3></div>
				<div><h3>: Rp {{ number_format($detail->total, 2, ',', '.') }}</h3></div>
			</div>
			<div class="d-flex">
				<div><h3>Status Order</h3></div>
				<div><h3>: {{ ucfirst($detail->status) }}</h3></div>
			</div>
		</div>
		<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12" id="cart-list">
			<table class="table">
				<thead>
					<tr>
						<th>Item</th>
						<th></th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					@foreach($detail->menus as $index => $menu)
						<tr>
							<td class="image">
								<img src="{{ $menu->cover }}">
							</td>
							<td><h4><a href="{{ route('frontend.product', ['id' => $menu->id]) }}"> {{ $menu->name }}</a></h4></td>
							<td>Rp {{ number_format($menu->price, 2, ',', '.') }}</td>
							<td>{{ $menu->pivot->quantity }}</td>
							<td>Rp {{ number_format($menu->pivot->subtotal, 2, ',', '.') }}</td>
						</tr>
					@endforeach
					@foreach($detail->customs as $index => $custom)
						<tr>
							<td class="image">
								<img src="{{ $custom->cover }}">
							</td>
							<td><h4>{{ $custom->name }}</h4></td>
							<td>Rp {{ number_format($custom->total, 2, ',', '.') }}</td>
							<td>{{ $custom->pivot->quantity }}</td>
							<td>Rp {{ number_format($custom->pivot->subtotal, 2, ',', '.') }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>
@endsection
@push('pageScript')
<script type="text/javascript">
	$(document).ready(function() {
        $('.mpsi-loading-page').css('display', 'none');
        $('.mpsi-page').css('display', 'block');
        $('.mpsi-page').addClass('mpsi-page-animation');
	});
</script>
@endpush