@extends('master.index')
@push('pageStyle')
<style type="text/css">
	.label {
		font-size: larger;
	}
	.custom-container {
		margin: 40px 20px;
	}
	.d-table {
		display: table;
	}
	.d-flex {
		display: flex;
	}
	.menu-container {
		margin: 10px 0;
	}
	.qty-container > input {
		margin: 0 10px;
		width: 50px;
		text-align: center;
	}
	.menu-label {
		display: table-cell;
		vertical-align: middle;
	}
	div.alert {
		margin-top: 30px;
	}
	div.alert a {
		font-size: 30px;
	}
</style>
@endpush
@section('content')
	<section>
		<div class="container">
			@if(session('error'))
				<div class="alert alert-warning alert-dismissable fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<span><strong>Warning!</strong> {{ session('error') }}</span>
				</div>
			@endif
			<h1>CUSTOM FOOD</h1>
			<div>
				@php
					$count = 0;
				@endphp
				{!! Form::open(['url' => route('frontend.store.custom'), 'method' => 'POST']) !!}
				@if(count($custom['rices']))
					<div class="custom-container">
						<div class="label label-default">Rice</div>
						@foreach($custom['rices'] as $index => $rice)
							@php $count += 1; @endphp
							<div class="d-table menu-container">
								<div class="d-flex qty-container">
									<div>
										<div><a class="btn btn-default" onclick="countAmount('plus', {{$rice->price}}, 'custom{{$count}}')"><i class="fa fa-plus" aria-hidden="true"></i></a></div>
										<div><a class="btn btn-default" onclick="countAmount('minus', {{$rice->price}}, 'custom{{$count}}')"><i class="fa fa-minus" aria-hidden="true"></i></a></div>
									</div>
									<input type="text" name="foods[{{$count}}][qty]" value="1" id="custom{{$count}}" readonly>
									<input type="hidden" name="foods[{{$count}}][value]" value="{{ $rice->id }}">
								</div>
								<label class="menu-label"><h4>{{ $rice->name }} - Rp{{ number_format($rice->price, 0, ',', '.') }}</h4></label>
							</div>
						@endforeach
					</div>
				@endif
				@if(count($custom['beefs']))
					<div class="custom-container">
						<div class="label label-default">Beef</div>
						@foreach($custom['beefs'] as $index => $beef)
							@php $count += 1; @endphp
							<div class="d-table menu-container">
								<div class="d-flex qty-container">
									<div>
										<div><a class="btn btn-default" onclick="countAmount('plus', {{$beef->price}}, 'custom{{$count}}')"><i class="fa fa-plus" aria-hidden="true"></i></a></div>
										<div><a class="btn btn-default" onclick="countAmount('minus', {{$beef->price}}, 'custom{{$count}}')"><i class="fa fa-minus" aria-hidden="true"></i></a></div>
									</div>
									<input type="text" name="foods[{{$count}}][qty]" value="0" id="custom{{$count}}" readonly>
									<input type="hidden" name="foods[{{$count}}][value]" value="{{ $beef->id }}">
								</div>
								<label class="menu-label"><h4>{{ $beef->name }} - Rp{{ number_format($beef->price, 0, ',', '.') }}</h4></label>
							</div>
						@endforeach
					</div>
				@endif
				@if(count($custom['chickens']))
					<div class="custom-container">
						<div class="label label-default">Chicken</div>
						@foreach($custom['chickens'] as $index => $chick)
							@php $count += 1; @endphp
							<div class="d-table menu-container">
								<div class="d-flex qty-container">
									<div>
										<div><a class="btn btn-default" onclick="countAmount('plus', {{$chick->price}}, 'custom{{$count}}')"><i class="fa fa-plus" aria-hidden="true"></i></a></div>
										<div><a class="btn btn-default" onclick="countAmount('minus', {{$chick->price}}, 'custom{{$count}}')"><i class="fa fa-minus" aria-hidden="true"></i></a></div>
									</div>
									<input type="text" name="foods[{{$count}}][qty]" value="0" id="custom{{$count}}" readonly>
									<input type="hidden" name="foods[{{$count}}][value]" value="{{ $chick->id }}">
								</div>
								<label class="menu-label"><h4>{{ $chick->name }} - Rp{{ number_format($chick->price, 0, ',', '.') }}</h4></label>
							</div>
						@endforeach
					</div>
				@endif
				@if(count($custom['seafoods']))
					<div class="custom-container">
						<div class="label label-default">Seafood</div>
						@foreach($custom['seafoods'] as $index => $seafood)
							@php $count += 1; @endphp
							<div class="d-table menu-container">
								<div class="d-flex qty-container">
									<div>
										<div><a class="btn btn-default" onclick="countAmount('plus', {{$seafood->price}}, 'custom{{$count}}')"><i class="fa fa-plus" aria-hidden="true"></i></a></div>
										<div><a class="btn btn-default" onclick="countAmount('minus', {{$seafood->price}}, 'custom{{$count}}')"><i class="fa fa-minus" aria-hidden="true"></i></a></div>
									</div>
									<input type="text" name="foods[{{$count}}][qty]" value="0" id="custom{{$count}}" readonly>
									<input type="hidden" name="foods[{{$count}}][value]" value="{{ $seafood->id }}">
								</div>
								<label class="menu-label"><h4>{{ $seafood->name }} - Rp{{ number_format($seafood->price, 0, ',', '.') }}</h4></label>
							</div>
						@endforeach
					</div>
				@endif
				@if(count($custom['vegetables']))
					<div class="custom-container">
						<div class="label label-default">Vegetable</div>
						@foreach($custom['vegetables'] as $index => $vege)
							@php $count += 1; @endphp
							<div class="d-table menu-container">
								<div class="d-flex qty-container">
									<div>
										<div><a class="btn btn-default" onclick="countAmount('plus', {{$vege->price}}, 'custom{{$count}}')"><i class="fa fa-plus" aria-hidden="true"></i></a></div>
										<div><a class="btn btn-default" onclick="countAmount('minus', {{$vege->price}}, 'custom{{$count}}')"><i class="fa fa-minus" aria-hidden="true"></i></a></div>
									</div>
									<input type="text" name="foods[{{$count}}][qty]" value="0" id="custom{{$count}}" readonly>
									<input type="hidden" name="foods[{{$count}}][value]" value="{{ $vege->id }}">
								</div>
								<label class="menu-label"><h4>{{ $vege->name }} - Rp{{ number_format($vege->price, 0, ',', '.') }}</h4></label>
							</div>
						@endforeach
					</div>
				@endif
				@if(count($custom['side_dishes']))
					<div class="custom-container">
						<div class="label label-default">Side Dishes</div>
						@foreach($custom['side_dishes'] as $index => $side)
							@php $count += 1; @endphp
							<div class="d-table menu-container">
								<div class="d-flex qty-container">
									<div>
										<div><a class="btn btn-default" onclick="countAmount('plus', {{$side->price}}, 'custom{{$count}}')"><i class="fa fa-plus" aria-hidden="true"></i></a></div>
										<div><a class="btn btn-default" onclick="countAmount('minus', {{$side->price}}, 'custom{{$count}}')"><i class="fa fa-minus" aria-hidden="true"></i></a></div>
									</div>
									<input type="text" name="foods[{{$count}}][qty]" value="0" id="custom{{$count}}" readonly>
									<input type="hidden" name="foods[{{$count}}][value]" value="{{ $side->id }}">
								</div>
								<label class="menu-label"><h4>{{ $side->name }} - Rp{{ number_format($side->price, 0, ',', '.') }}</h4></label>
							</div>
						@endforeach
					</div>
				@endif
				<div>
					<h3>TOTAL : Rp <span id="total">{{ number_format(3000, 2, ',', '.') }}</span></h3>
				</div>
				{{ Form::submit('CONFIRM', ['class' => 'btn btn-success no-border-radius']) }}
				{!! Form::close() !!}
			</div>
			<br />
			<br />
		</div>
	</section>
@endsection
@push('pageModal')
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">WARNING!!!</h4>
      </div>
      <div class="modal-body">
        <p>Please check your quantity...</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endpush
@push('pageScript')
<script type="text/javascript">
	var test = {!! json_encode($custom) !!}
	console.log(test);

	var total = 3000;
	function countAmount(type, price, idQty) {
		var qty = $('#'+idQty).val();
		qty = parseInt(qty);
		if (type == 'minus' && qty < 1) {
			return $('#myModal').modal();
		}
		if (type == 'plus') {
			total += price;
			qty += 1;
		} else if (type == 'minus') {
			total -= price;
			qty -= 1;
		}
		$('#'+idQty).val(qty);
		$('#total').html((total).formatMoney(2, ",", "."))
		
	}

	$(document).ready(function() {
		$('.mpsi-loading-page').css('display', 'none');
        $('.mpsi-page').css('display', 'block');
        $('.mpsi-page').addClass('mpsi-page-animation');


	});
</script>
@endpush