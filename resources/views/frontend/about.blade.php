@extends('master.index')
@push('pageStyle')
<style type="text/css">
	.parallax {
	    /* The image used */
	    background-image: url({{ asset('images/About_Banner_Img.jpg')  }});

	    /* Full height */
	    height: 550px;

	    /* Create the parallax scrolling effect */
	    background-attachment: fixed;
	    background-position: center;
	    background-repeat: no-repeat;
	    background-size: cover;
	}
	.overlay {
		background: rgba(0, 0, 0, 0.5);
		width: 100%;
		height: 550px;
		padding: 200px 0;
	}
	.overlay h1, .overlay h4, .overlay .mpsi-hr {
		position: relative;
		top: 45%;
	}
	.mpsi-hr i {
		font-size: larger;
	}
	.mpsi-hr::before , .mpsi-hr::after {
		margin-right: 30px;
		margin-left: 30px;
	}
	/* Turn off parallax scrolling for tablets and phones. Increase the pixels if needed */
	@media only screen and (max-device-width: 1024px) {
	    .parallax {
	        background-attachment: scroll;
	    }
	}

    .panel-heading.cursor-pointer.hvr-buzz-out {
        display: block;
    }
    .top8{
    	width: 250px;
    	height: 250px;
    	object-fit: cover;
    }
    .profil{
    	width: 100px;
    	height: 100px;
    	border-radius: 50%;
    	background-color: #17A827;
    }
    .facility{
    	padding: 20px; 
    	width: 70px;
    	font-size: 30px;
    	text-align: center;
    	text-decoration: none;
    	margin : 5px 2px;
    	border-radius:50%;
    }
    #score {
    	padding: 50px 0;
    }
    #score .fa {
    	background-color: #17A827;
    	color: #ffffff;
    }
    #score .fa:hover {
    	color: #ffffff;
    	text-decoration: none;
    }
</style>
@endpush
@section('content')
<div class="parallax">
	<div class="overlay">
		<h1 class="fc-white text-center fs-45">ABOUT US</h1>
		<div class="mpsi-hr text-center">
	        <i class="fa fa-star" aria-hidden="true"></i>
	        <i class="fa fa-star" aria-hidden="true"></i>
	        <i class="fa fa-star" aria-hidden="true"></i>
	        <i class="fa fa-star" aria-hidden="true"></i>
	        <i class="fa fa-star" aria-hidden="true"></i>
	    </div>
		<h4 class="fc-white text-center">Sutibun is a VERY FINE dining restaurant</h4>
	</div>
</div>
<section id="menu">
	<div class="container-fluid">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-6 col-sm-12 col-xs-12">
				<h3>ABOUT MASAKAN PADANG</h3>
				<P style="border-right-style: solid; border-right-color: #ffffff; ">
					Nasi Padang is a Padang steamed rice served with various choices of pre-cooked dishes originated from West Sumatra, Indonesia. It is known across Indonesia as Nasi Padang, after the city of Padang the capital of West Sumatra province. Nasi Padang (Padang-style rice) is a miniature banquet of meats, fish, vegetables, and spicy sambals eaten with plain white rice, it is Sumatra's most famous export and the Minangkabau's great contribution to Indonesian cuisine.
					<br>
					A Padang restaurant is usually easily distinguishable with their Rumah Gadang style facade and their typical window display. Nasi Padang window display in front of restaurant usually consists of stages and rows of carefully arranged stacked bowls and plates, constructed and filled with various dishes. A Padang restaurant, especially small-to-medium ones, will also usually bear names in Minang language.
				</P>
			</div>
			<div class="col-md-6 col-sm-12 col-xs-12">
				<h3>Vision</h3>
				<p style="border-right-style: solid; border-right-color: #17A827; text-align: justify;">
					Life is all about enjoying delicious food <br>
					WHY NOT ENJOY NASI PADANG FROM SUTIBUN NASI PADANG ?!
				</p>
				<h3>Mission</h3>
				<p style="border-right-style: solid; border-right-color: #17A827; text-align: justify;">
					To show the world of SUTIBUN NASI PADANG <br>
					To bring the world together underneath of the name SUTIBUN NASI PADANG<br>
					To carry title of best among the best nasi padang and that is SUTIBUN NASI PADANG<br>
				</p>
			</div>
		</div>
</section>
<section>
	<div class="container-fluid">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<h1 class="text-center">About Team Developer</h1>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-1">
			<div class="col-md-2 col-sm-12 col-xs-12">
				<img src="images/ab1.png" class="profil">
				<h6>Name : Steven AT - 1431072</h6>
				<h6>Job  : Tester</h6>
			</div>
			<div class="col-md-2 col-sm-12 col-xs-12">
				<img src="images/ab2.png" class="profil">
				<h6>Name : Antoni - 1431017</h6>
				<h6>Job  : Designer</h6>
			</div>
			<div class="col-md-2 col-sm-12 col-xs-12">
				<img src="images/ab5.png" class="profil">
				<h6>Name : Yannisto - 1431086</h6>
				<h6>Job  : Project Manager</h6>
			</div>
			<div class="col-md-2 col-sm-12 col-xs-12">
				<img src="images/ab3.png" class="profil">
				<h6>Name : Harsanto - 1431083</h6>
				<h6>Job  : Backend</h6>
			</div>
			<div class="col-md-2 col-sm-12 col-xs-12">
				<img src="images/ab4.png" class="profil">
				<h6>Name : Hendiche - 1431055</h6>
				<h6>Job  : Frontend</h6>
			</div>
		</div>
	</div>
</section>
<section id="menu">
	<div class="container-fluid">
		<div class="col-md-12 col-sm-12 col-xs-12" style="border-bottom-style: solid;">
			<h1 class="text-center fs-45">TOP 8 SNP MENU</h1>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<br>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<img src="images/MENU2.jpg" class="mpsi-popup-img hvr-grow top8" onclick="showPopupImg(this)">
				<h3>Abun special 1</h3>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<img src="images/MENU3.png" class="mpsi-popup-img hvr-grow top8" onclick="showPopupImg(this)">
				<h3>Abun special 2</h3>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<img src="images/MENU4.jpg" class="mpsi-popup-img hvr-grow top8" onclick="showPopupImg(this)">
				<h3>Abun special 3</h3>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<img src="images/MENU5.jpg" class="mpsi-popup-img hvr-grow top8" onclick="showPopupImg(this)">
				<h3>Abun special 4</h3>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<br>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<img src="images/MENU6.jpg" class="mpsi-popup-img hvr-grow top8" onclick="showPopupImg(this)">
				<h3>Abun special 5</h3>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<img src="images/MENU7.jpg" class="mpsi-popup-img hvr-grow top8" onclick="showPopupImg(this)">
				<h3>Abun special 6</h3>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<img src="images/MENU8.jpg" class="mpsi-popup-img hvr-grow top8" onclick="showPopupImg(this)">
				<h3>Abun special 7</h3>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<img src="images/MENU1.jpg" class="mpsi-popup-img hvr-grow top8" onclick="showPopupImg(this)">
				<h3>Abun special 8</h3>
			</div>
		</div>
	</div>
</section>
<section id="score">
	<div class="container-fluid">
		<div class="col-md-12 col-sm-12 col-xs-12 text-center">
			<br>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<a class="fa fa-users facility"></a>
				<h5>10</h5>
				<h5>Employee</h5>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<a class="fa fa-trophy facility"></a>
				<h5>100</h5>
				<h5>Awards</h5>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<a class="fa fa-thumbs-o-up facility"></a>
				<h5>1.000.000</h5>
				<h5>Customers like</h5>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<a class="fa fa-sitemap facility"></a>
				<h5>2</h5>
				<h5>Different Locations</h5>
			</div>
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