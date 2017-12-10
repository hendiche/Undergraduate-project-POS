@extends('master.index')
@section('content')
<section id="cart-list">
	<div class="container">
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
					<tbody>
						@foreach($carts as $index => $cart)
						<tr>
							<td class="image">
								<img src="http://sariratu.sg/wp-content/uploads/2015/04/Menu7.jpg" class="img-responsive" />
							</td>
							<td class="product">
								<div>{{ $cart->name }}</div>
							</td>
							<td>Rp.{{ number_format($cart->price, 2, ",", ".") }}</td>
							<td class="qty">
								<span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
								<input type="text" readonly="" value="{{ $cart->qty }}"/>
								<span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
							</td>
							<td class="subtotal">
								<div>Rp.{{ number_format($cart->subtotal, 2, ",", ".") }}</div>
							</td>
							<td class="delete text-right">
								<a href="#" id="remove">
									<span style="display: none;">{{ route('frontend.remove_cart', ['rowId' => $cart->rowId]) }}</span>
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
				<div class="checkout text-right">
					<a href="{{ route('frontend.checkout') }}" class="btn btn-success no-border-radius">Checkout</a>
				</div>
			@endif
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
	$(document).ready(function() {
		$('.mpsi-loading-page').css('display', 'none');
        $('.mpsi-page').css('display', 'block');
        $('.mpsi-page').addClass('mpsi-page-animation');
        

        $('#remove').on('click', function() {
        	var url = $(this).children('span').html();
        	$('#confirm').attr('href', url);
        	$('#myModal').modal();
        });
	});
</script>
@endpush