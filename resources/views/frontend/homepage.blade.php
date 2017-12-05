@extends('master.index')
@section('content')
  <section>
    <div>
        <div>
            <div>
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="https://i.ytimg.com/vi/dGFSjKuJfrI/maxresdefault.jpg" alt="Los Angeles">
                  </div>

                  <div class="item">
                    <img src="https://i.ytimg.com/vi/prALrHUJ8Ns/hqdefault.jpg" alt="Chicago">
                  </div>
                
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQCADSWXh9jUjoQowEKSGjg-eynpDWl9dtBCQ6RIfF0O-DOazLEtQ" alt="New york">
                  </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control mpsi-left-carousel mpsi-animation-duration" href="#myCarousel" data-slide="prev" style="display: none;">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control mpsi-right-carousel mpsi-animation-duration" href="#myCarousel" data-slide="next" style="display: none">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('pageScript')
<script type="text/javascript">
    $(document).ready(function() {
        $('#myCarousel').mouseenter(function() {
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
