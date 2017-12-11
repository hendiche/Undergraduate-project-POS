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
    .fa{
    	background-color: #17A827;
    	color: #ffffff;
    }
    .fa:hover{
    	color: #ffffff;
    }
</style>
@endpush
@section('content')
<section id="menu">
	<div class="container-fluid">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-6 col-sm-12 col-xs-12">
				<h3>ABOUT MASAKAN PADANG</h3>
				<P style="border-right-style: solid; border-right-color: #ffffff;">
					Nasi Padang is a Padang steamed rice served with various choices of pre-cooked dishes originated from West Sumatra, Indonesia. It is known across Indonesia as Nasi Padang, after the city of Padang the capital of West Sumatra province. Nasi Padang (Padang-style rice) is a miniature banquet of meats, fish, vegetables, and spicy sambals eaten with plain white rice, it is Sumatra's most famous export and the Minangkabau's great contribution to Indonesian cuisine.

					A Padang restaurant is usually easily distinguishable with their Rumah Gadang style facade and their typical window display. Nasi Padang window display in front of restaurant usually consists of stages and rows of carefully arranged stacked bowls and plates, constructed and filled with various dishes. A Padang restaurant, especially small-to-medium ones, will also usually bear names in Minang language.
				</P>
			</div>
			<div class="col-md-6 col-sm-12 col-xs-12">
				<h3>Vision</h3>
				<p style="border-right-style: solid; border-right-color: #17A827;">
					Abun never give up, Abun never give up, Abun never give up, 
					Abun never give up, Abun never give up, Abun never give up, 
					Abun never give up, Abun never give up, Abun never give up, 
					Abun never give up, Abun never give up, Abun never give up, 
					Abun never give up, Abun never give up, Abun never give up, 
					Abun never give up, Abun never give up, Abun never give up, 
				</p>
				<h3>Mission</h3>
				<p>
					Abun never give up, Abun never give up, Abun never give up, 
					Abun never give up, Abun never give up, Abun never give up, 
					Abun never give up, Abun never give up, Abun never give up, 
					Abun never give up, Abun never give up, Abun never give up, 
					Abun never give up, Abun never give up, Abun never give up, 
					Abun never give up, Abun never give up, Abun never give up, 
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
				<h6>Name : Steven AT</h6>
				<h6>Job  : Report/Document</h6>
			</div>
			<div class="col-md-2 col-sm-12 col-xs-12">
				<img src="images/ab2.png" class="profil">
				<h6>Name : Antoni</h6>
				<h6>Job  : Design</h6>
			</div>
			<div class="col-md-2 col-sm-12 col-xs-12">
				<img src="images/ab5.png" class="profil">
				<h6>Name : Yannisto</h6>
				<h6>Job  : Project Manager</h6>
			</div>
			<div class="col-md-2 col-sm-12 col-xs-12">
				<img src="images/ab3.png" class="profil">
				<h6>Name : Harsanto</h6>
				<h6>Job  : Backend</h6>
			</div>
			<div class="col-md-2 col-sm-12 col-xs-12">
				<img src="images/ab4.png" class="profil">
				<h6>Name : Hendiche</h6>
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
	</div>
</section>
<section>
	<div class="container-fluid">
		<div class="col-md-12 col-sm-12 col-xs-12 text-center">
			<br>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<a href="#" class="fa fa-users facility"></a>
				<h5>10</h5>
				<h5>Employee</h5>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<a href="#" class="fa fa-trophy facility"></a>
				<h5>100</h5>
				<h5>Awards</h5>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<a href="#" class="fa fa-thumbs-o-up facility"></a>
				<h5>1.000.000</h5>
				<h5>Customers like</h5>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<a href="#" class="fa fa-sitemap facility"></a>
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
        
        $('#myCarousel')
        .mouseenter(function() {
            $('.mpsi-left-carousel').addClass('animated fadeInLeft').css('display', 'block');
            $('.mpsi-right-carousel').addClass('animated fadeInRight').css('display', 'block');
        })
        .mouseleave(function() {
            $('.mpsi-left-carousel').addClass('fadeOutLeft').removeClass('fadeInLeft');
            // $('.mpsi-left-carousel').removeClass('animated fadeInLeft mpsi-animation-duration').css('visibility', 'hidden');
            $('.mpsi-right-carousel').addClass('fadeOutRight').removeClass('fadeInRight');
            setTimeout(function() {
                $('.mpsi-left-carousel').removeClass('animated fadeOutLeft').css('display', 'none');
                $('.mpsi-right-carousel').removeClass('animated fadeOutRight').css('display', 'none');
            }, 350);
        });

        $('.carousel').carousel({
            interval: 2000
        });
        $('.carousel-control.right').trigger('click');
    });
</script>
@endpush