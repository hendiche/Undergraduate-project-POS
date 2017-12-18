@extends('master.index')
@push('pageStyle')
<style type="text/css">
	input[type=number]::-webkit-outer-spin-button,
	input[type=number]::-webkit-inner-spin-button {
	    -webkit-appearance: none;
	    margin: 0;
	}

	input[type=number] {
	    -moz-appearance:textfield;
	}
	#checkout {
		margin: 20px 0px;
	}
	#cart-list {
		margin-bottom: 20px;
	}
	#cart-list td {
		border: 1px solid #eee;
		padding-left: 5px !important;
	}
	#cart-list thead tr {
		background-color: #ddd !important;
		border: 1px solid #ddd;
	}
	.txt-area {
		resize: none;
		height: 150px !important;
	}
</style>
@endpush
@section('content')
<section id="checkout">
	<div class="container">
		<h1 class="text-center">CHECKOUT</h1>
		<hr />
		<div id="cart-list">
			<h3>CONFIRM ORDER</h3>
			<table class="table">
				<thead>
					<tr>
						<th>ITEM</th>
						<th></th>
						<th>QUANTITY</th>
						<th>UNIT PRICE</th>
						<th>TOTAL</th>
					</tr>
				</thead>
				<tbody>
					@foreach(Cart::content() as $key => $item)
						<tr>
							<td class="image">
								<img src="{{ $item->options->cover }}">
							</td>
							<td class="product">{{ $item->name }}</td>
							<td>{{ $item->qty }}</td>
							<td>Rp {{ number_format($item->price, 2, ',', '.') }}</td>
							<td>Rp {{ number_format($item->subtotal, 2, ',', '.') }}</td>
						</tr>
					@endforeach
					<tr class="text-right">
						<td colspan="4"><h4>Total : </h4></td>
						<td>Rp {{ Cart::total() }}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div>
			<h3>USER DETAILS</h3>
			@auth
			<div>auth</div>
			@else
				<div>
					<hr/>
					{!! Form::open(['url' => route('frontend.store.checkout'), 'method' => 'POST']) !!}
					<div class="form-group">
						<label for="name">Name:</label>
						<input type="text" name="name" id="name" class="form-control" />
					</div>
					<div class="form-group">
						<label for="telp">Phone:</label>
						<input type="number" name="phone" id="telp" class="form-control" />
					</div>
					<div class="form-group">
						<label for="address">Address:</label>
						<textarea name="address" class="form-control txt-area" id="address"></textarea>
					</div>
					{{ Form::submit('CONFIRM', ['class' => 'btn btn-success btn-block no-border-radius']) }}
					{!! Form::close() !!}
				</div>
			@endauth
		</div>
	</div>	
</section>
@endsection
@push('pageScript')
<script type="text/javascript">
	var test = {!! json_encode(Cart::content()) !!}
	console.log(test);
	$(document).ready(function() {
        $('.mpsi-loading-page').css('display', 'none');
        $('.mpsi-page').css('display', 'block');
        $('.mpsi-page').addClass('mpsi-page-animation');
	});
</script>
@endpush