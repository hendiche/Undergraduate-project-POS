@extends('master.index')
@push('pageStyle')
<style type="text/css">
	div.alert {
		margin-top: 30px;
	}
	div.alert a {
		font-size: 30px;
	}
	.upper-case {
		text-transform: uppercase;
	}
</style>
@endpush
@section('content')
<section>
	<div class="container">
		@if(session('message'))
			<div class="alert alert-success alert-dismissable fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<span><strong>Success!</strong> {{ session('message') }}</span>
			</div>
		@endif
		<h1 class="upper-case">{{ $menu->name }}</h1>
		<hr/>
		<div class="row" id="main-section">
			<div class="col-md-5 col-sm-12 col-xs-12">
				<img src="{{ $menu->cover }}" class="img-responsive mpsi-popup-img" onclick="showPopupImg(this)" />
			</div>
			<div class="col-md-7 col-sm-12 col-xs-12 description">
				{!! Form::open(['url' => route('frontend.add_to_cart'), 'method' => 'POST']) !!}
					<input type="hidden" name="product_id" value="{{ $menu->id }}">
					<h2 class="no-margin-top">Rp.{{ number_format($menu->price, 2, '.', ',') }}</h2>
					{{ Form::submit('Add to cart', ['class' => 'btn btn-success no-border-radius']) }}
					<p>{{ $menu->description }}</p>
				{!! Form::close() !!}
			</div>
		</div>
		<br />
		<br />
		<h4><strong>You may also like to eat...</strong></h4>
		<hr />
		<div class="row" id="suggest-section">
			@foreach($suggests as $index => $item)
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="container cursor-pointer" id="onclick" data-href="{{ route('frontend.product', ['id' => $item->id]) }}">
						<img src="{{ $item->cover }}" class="img-responsive" />
						<h3 class="text-center">{{ $item->name }}</h3>
						<h3 class="text-center">Rp.{{ number_format($item->price, 2, '.', ',') }}</h3>
					</div>
				</div>
			@endforeach
		</div>
		<br />
		<br />
	</div>
</section>
@endsection
@push('pageScript')
<script type="text/javascript">
	$(document).ready(function() {
		$('.mpsi-loading-page').css('display', 'none');
        $('.mpsi-page').css('display', 'block');
        $('.mpsi-page').addClass('mpsi-page-animation');

        $('.container.cursor-pointer').on('click', function() {
        	window.location.href = $(this).attr('data-href');
        });
	});
</script>
@endpush