@extends('master.index')
@push('pageStyle')
<style type="text/css">
    .panel-heading.cursor-pointer.hvr-buzz-out {
        display: block;
    }
    .top8{
    	width: 250px;
    	height: 250px;
    }
    .sosial{
    	padding: 20px; 
    	width: 70px;
    	font-size: 30px;
    	text-align: center;
    	text-decoration: none;
    	margin : 5px 2px;
    	border-radius:50%;
    }
    .fa:hover {
    opacity: 0.7;
	}

	.fa-facebook {
  	background: #3B5998;
  	color: white;
	}

	.fa-twitter {
  	background: #55ACEE;
  	color: white;
	}

	.fa-google {
  	background: #dd4b39;
  	color: white;
	}

	.fa-youtube {
  	background: #bb0000;
  	color: white;
	}

	.fa-instagram {
  	background: #125688;
  	color: white;
	}
</style>
@endpush
@section('content')
<section id="menu">
	<div class="container-fluid">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-6 col-sm-12 col-xs-12">
				<h1>Contact</h1>
				<h3>Phone Number :</h3>
				<h5>m1. +62811 2233 4455</h5>
				<h5>m2. +62866 7788 9900</h5>
				<h3>Email :</h3>
				<h5>e1. sutibun@NasiPadang.com</h5>
				<h5>e2. abun@PadangPeng.com</h5>
				<h3>Address :</h3>
				<h5>Jalan Gajah Mada, Sei Ladi, Tiban Indah, Sekupang, Kota Batam, Kepulauan Riau 29442</h5>
			</div>
			<div class="col-md-6 col-sm-12 col-xs-12">
				<h1>Opening Hours</h1>
				<h5>Everyday</h5>
				<h5>10:00 AM - 11:00 PM</h5>
				<h1>Let's Get Social </h1>
				<a href="#" class="fa fa-facebook sosial"></a>
				<a href="#" class="fa fa-twitter sosial"></a>
				<a href="#" class="fa fa-google sosial"></a>
				<a href="#" class="fa fa-youtube sosial"></a>
				<a href="#" class="fa fa-instagram sosial"></a>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<h1></h1>
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