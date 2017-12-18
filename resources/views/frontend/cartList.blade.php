@extends('master.index')
@push('pageStyle')
<style type="text/css">
	div.alert {
		margin-top: 30px;
	}
	div.alert a {
		font-size: 30px;
	}
	.disabled {
		color: #ddd;
		cursor: auto !important;
	}
</style>
@endpush
@section('content')
<section id="cart-list">
	<div class="container">
		@if (session('message'))
			<div class="alert alert-danger alert-dismissable fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<span><strong>Success!</strong> {{ session('message') }}</span>
			</div>
		@endif
		@if(session('error'))
			<div class="alert alert-warning alert-dismissable fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<span><strong>Warning!</strong> {{ session('error') }}</span>
			</div>
		@endif
		<h1>Your Cart</h1>
		<hr />
		<div class="table-responsive">
			@if(count($carts))
				<table class="table">
					<thead>
						<tr>
							<td>Item</td>
							<td></td>
							<td>Price</td>
							<td>Quantity</td>
							<td>Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody id="tbody">
						@foreach($carts as $key => $cart)
						<tr>
							<td class="image">
								<img src="{{ $cart->options->cover }}" alt="No Image" class="img-responsive" />
							</td>
							<td class="product">
								<div>{{ $cart->name }}</div>
							</td>
							<td>Rp.{{ number_format($cart->price, 2, ",", ".") }}</td>
							<td class="qty">
								<span class="plus" data-rowId="{{ $cart->rowId }}" id="plus{{$cart->id}}" onclick="addQty({{ $cart->id }})"><i class="fa fa-plus" aria-hidden="true"></i></span>
								<input type="text" readonly="" value="{{ $cart->qty }}"/>
								<span class="minus {{ $cart->qty == 1 ? 'disabled' : '' }}" data-rowId="{{ $cart->rowId }}" id="minus{{$cart->id}}" onclick="subtractQty({{$cart->id}}, {{$cart->qty}})"><i class="fa fa-minus" aria-hidden="true"></i></span>
							</td>
							<td class="subtotal">
								<div>Rp.{{ number_format($cart->subtotal, 2, ",", ".") }}</div>
							</td>
							<td class="delete text-right">
								<a href="#" id="remove" onclick="removeCart('{{ $cart->rowId }}')">
									{{-- <span style="display: none;">{{ route('frontend.remove_cart', ['rowId' => $cart->rowId]) }}</span> --}}
									<i class="fa fa-times" aria-hidden="true"></i>
								</a>
							</td>
						</tr>
						@endforeach
						<tr class="row-total">
							<td colspan="4" class="text-right">Your Total : </td>
							<td colspan="2" class="text-right">{{ Cart::total() }}</td>
						</tr>
					</tbody>
				</table>
			@else
				<div class="well well-lg text-center">
					<h2>Your cart is empty</h2>
				</div>
			@endif
		</div>
		<div class="checkout text-right">
			<a href="{{ route('frontend.checkout') }}" class="btn btn-success no-border-radius">Checkout</a>
		</div>
		<br />
		<br />
	</div>
</section>
@endsection
@push('pageModal')
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Confirmation</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this?</p>
      </div>
      <div class="modal-footer">
      	<a href="#" class="btn btn-danger" id="confirm">Yes</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endpush
@push('pageScript')
<script type="text/javascript">
	var test = {!! json_encode($carts) !!};
	console.log(test);

	function addQty(id) {
    	var rowId = $('#plus'+id).attr('data-rowId');
    	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    	$.ajax({
    		url: '{{ route('frontend.update') }}',
    		type: 'POST',
    		data: {
    			_token: CSRF_TOKEN,
    			rowId: rowId,
    			qty: 1
    		},
    		success: function (data) {
    			renderTbody(data);
    		},
    		error: function (data) {
    			console.log('error');
    		}
    	});
    }

    function subtractQty(id, qty) {
    	if (qty == 1) return;
    	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    	var rowId = $('#minus'+id).attr('data-rowId');
    	$.ajax({
    		url: '{{ route('frontend.update') }}',
    		type: 'POST',
    		data: {
    			_token: CSRF_TOKEN,
    			rowId: rowId,
    			qty: -1
    		},
    		success: function (data) {
    			renderTbody(data);
    		},
    		error: function (data) {
    			console.log('error');
    		}
    	});
    }

    function removeCart(rowId) {
    	var url = '{{ route('frontend.remove_cart', ['rowId' => 'REMOVEROWID']) }}';
    	url = url.replace('REMOVEROWID', rowId);
    	$('#confirm').attr('href', url);
    	$('#myModal').modal();
    }

	$(document).ready(function() {
		$('.mpsi-loading-page').css('display', 'none');
        $('.mpsi-page').css('display', 'block');
        $('.mpsi-page').addClass('mpsi-page-animation');
	});

	function renderTbody(data) {
    	$('#tbody').empty();
		var tbody = [];
		$.each(data.carts, function(key, item) {
			var price = parseInt(item.price);
			var subtotal = parseInt(item.subtotal);
			var route = '{{ route('frontend.remove_cart', ['rowId' => 'ROWID']) }}';
			var url = route.replace("ROWID", item.rowId);
			var clsMinus = 'minus';
			if (item.qty == 1) clsMinus += ' disabled';
			tbody.push('\
				<tr>\
					<td class="image">\
						<img src="'+ item.options.cover +'" class="img-responsive" />\
					</td>\
					<td class="product">\
						<div>'+ item.name +'</div>\
					</td>\
					<td>Rp.'+ (price).formatMoney(2, ".", ",") +'</td>\
					<td class="qty">\
						<span class="plus" data-rowId="'+ item.rowId +'" id="plus'+ item.id +'" onclick="addQty('+ item.id +')"><i class="fa fa-plus" aria-hidden="true"></i></span>\
						<input type="text" readonly value="'+ item.qty +'" />\
						<span class="' + clsMinus + '" data-rowId="'+ item.rowId +'" id="minus'+ item.id +'" onclick="subtractQty('+ item.id +', '+ item.qty +')"><i class="fa fa-minus" aria-hidden="true"></i></span>\
					</td>\
					<td class="subtotal">\
						<div>Rp.'+ (subtotal).formatMoney(2, ".", ",") +'</div>\
					</td>\
					<td class="delete text-right">\
						<a href="#" id="remove" onclick="removeCart(\''+ item.rowId +'\')">\
							<span style="display: none;">'+ url +'</span>\
							<i class="fa fa-times" aria-hidden="true"></i>\
						</a>\
					</td>\
				</tr>\
			')
		});
		tbody.push('\
			<tr class="row-total">\
				<td colspan="4" class="text-right">Your Total : </td>\
				<td colspan="2" class="text-right">'+ data.total +'</td>\
			</tr>\
		');
		$('#tbody').append(tbody);
    }
</script>
@endpush