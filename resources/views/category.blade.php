@extends('layouts.app')

@section('content')
<category></category>

<div class="container-fluid p-0">
	<!-- Subscribe -->
	<div class="row no-gutters">
		<div class="col-md-12">
			<div class="homepage__subscribe p-5 text-center">
			    <div class="homepage__subscribe__content d-flex align-items-center justify-content-around">
			        <h6 class="m-0 text-dark">SUBSCRIBE FOR SHOP NEWS, UPDATES AND SPECIAL OFFERS</h6>
		            <input type="email" placeholder="Your email here" class="form-control w-25 mr-3"> <a href="#" class="btn btn-small btn-pink">Subscribe</a>
			    </div>
			</div>
		</div>
	</div>
</div>

<footer class="footer sticky">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-5 d-flex align-items-center justify-content-around"><a href="#">Women</a> <a href="#">Men</a> <a href="#">Kids</a> <a href="#">Shoes</a> <a href="#">Brands</a></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="footer-social mt-5 d-flex align-items-center justify-content-around"><a href="#"><span class="fui-instagram"></span></a> <a href="#"><span class="fui-facebook"></span></a> <a href="#"><span class="fui-pinterest"></span></a> <a href="#"><span class="fui-twitter"></span></a></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center"><span class="text-muted">© HomeShopping Ltd.</span></div>
        </div>
    </div>
</footer>
@endsection

@push('scripts')
<script>
	$( function() {
	    $( "#slider-range" ).slider({
	      range: true,
	      min: 0,
	      max: 500,
	      values: [ 75, 300 ],
	      slide: function( event, ui ) {
	        $( ".llimit" ).html( "$" + ui.values[ 0 ]);
	        $( ".ulimit" ).html( "$" + ui.values[ 1 ] );
	      }
	    });
	    $( ".llimit" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) )
	    $( ".ulimit" ).html( "$" + $( "#slider-range" ).slider( "values", 1 ) )
	});
</script>
@endpush