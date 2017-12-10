@extends('master.index')
@section('content')
<section>
	<div class="container">
		<h1>TITLE</h1>
		<hr/>
		<div class="row" id="main-section">
			<div class="col-md-5 col-sm-12 col-xs-12">
				<img src="http://sariratu.sg/wp-content/uploads/2015/04/Menu2.jpg" class="img-responsive" />
			</div>
			<div class="col-md-7 col-sm-12 col-xs-12 description">
				{!! Form::open(['url' => route('frontend.add_to_cart'), 'method' => 'POST']) !!}
					<input type="hidden" name="product_id" value="1">
					<h4>Price</h4>
					{{ Form::submit('Add to cart', ['class' => 'btn btn-success no-border-radius']) }}
					{{-- <a href="" class="btn btn-success no-border-radius">Add to cart</a> --}}
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce turpis nibh, mattis ac est quis, cursus ullamcorper felis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus egestas mi non metus tristique semper. Quisque fringilla magna sit amet fermentum ultrices. In gravida tincidunt lacus eget hendrerit. Praesent dapibus ligula quis nisi rhoncus convallis sed at velit.</p>
				{!! Form::close() !!}
			</div>
		</div>
		<br />
		<br />
		<h4><strong>You may also like to eat...</strong></h4>
		<hr />
		<div class="row" id="suggest-section">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<img src="http://sariratu.sg/wp-content/uploads/2015/04/Menu4.jpg" class="img-responsive" />
				<div>name</div>
				<div>price</div>
			</div>
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
	});
</script>
@endpush