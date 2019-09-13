@extends('layouts.app')

@section('content')

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-5" id="exampleModalLabel">4 Items in your Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="checkout p-2">
				<div class="col-md-12 cart">
					<table class="table cart-table">
					  <thead>
					    <tr>
					      <th scope="col">Item</th>
					      <th scope="col">Size</th>
					      <th scope="col">Qty</th>
					      <th scope="col">Price</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <td>
					      	<div class="product__display d-flex align-items-center">
					      		<img class="img-fluid w-25 mr-3 border" src="/images/hoodie.jpg">
					      		<div class="product__info">
					      			<h5>Green T Shirts</h5>
					      			<p>Men BK3569</p>
					      			<a href="#">Remove</a>
					      		</div>
					      	</div>
					      </td>
					      <td>
					      	<p>XX</p>
					      	<p>L</p>
					      </td>
					      <td class="">
					      	<div class="d-flex justify-content-center">
					      		<a href="#" class=" btn btn-pink btn-xsmall remove-qty mr-1"><i class="fas fa-minus"></i></a>
						      	<input type="text" name="qty" value= "4" class="form-control rounded-input w-25">
						      	<a href="#" class="btn btn-pink btn-xsmall add-qty ml-1"><i class="fas fa-plus"></i></a>
					      	</div>
					      </td>
					      <td>$14</td>
					    </tr>
					    <tr>
					      <td>
					      	<div class="product__display d-flex align-items-center">
					      		<img class="img-fluid w-25 mr-3 border" src="/images/hoodie.jpg">
					      		<div class="product__info">
					      			<h5>Green T Shirts</h5>
					      			<p>Men BK3569</p>
					      			<a href="#">Remove</a>
					      		</div>
					      	</div>
					      </td>
					      <td>
					      	<p>XX</p>
					      	<p>L</p>
					      </td>
					      <td class="">
					      	<div class="d-flex justify-content-center">
					      		<a href="#" class=" btn btn-pink btn-xsmall remove-qty mr-1"><i class="fas fa-minus"></i></a>
						      	<input type="text" name="qty" value= "4" class="form-control rounded-input w-25">
						      	<a href="#" class="btn btn-pink btn-xsmall add-qty ml-1"><i class="fas fa-plus"></i></a>
					      	</div>
					      </td>
					      <td>$14</td>
					    </tr>
					    <tr>
					      <td>
					      	<div class="product__display d-flex align-items-center">
					      		<img class="img-fluid w-25 mr-3 border" src="/images/hoodie.jpg">
					      		<div class="product__info">
					      			<h5>Green T Shirts</h5>
					      			<p>Men BK3569</p>
					      			<a href="#">Remove</a>
					      		</div>
					      	</div>
					      </td>
					      <td>
					      	<p>XX</p>
					      	<p>L</p>
					      </td>
					      <td class="">
					      	<div class="d-flex justify-content-center">
					      		<a href="#" class=" btn btn-pink btn-xsmall remove-qty mr-1"><i class="fas fa-minus"></i></a>
						      	<input type="text" name="qty" value= "4" class="form-control rounded-input w-25">
						      	<a href="#" class="btn btn-pink btn-xsmall add-qty ml-1"><i class="fas fa-plus"></i></a>
					      	</div>
					      </td>
					      <td>$14</td>
					    </tr>
					    <tr>
					      <td>
					      	<div class="product__display d-flex align-items-center">
					      		<img class="img-fluid w-25 mr-3 border" src="/images/hoodie.jpg">
					      		<div class="product__info">
					      			<h5>Green T Shirts</h5>
					      			<p>Men BK3569</p>
					      			<a href="#">Remove</a>
					      		</div>
					      	</div>
					      </td>
					      <td>
					      	<p>XX</p>
					      	<p>L</p>
					      </td>
					      <td class="">
					      	<div class="d-flex justify-content-center">
					      		<a href="#" class=" btn btn-pink btn-xsmall remove-qty mr-1"><i class="fas fa-minus"></i></a>
						      	<input type="text" name="qty" value= "4" class="form-control rounded-input w-25">
						      	<a href="#" class="btn btn-pink btn-xsmall add-qty ml-1"><i class="fas fa-plus"></i></a>
					      	</div>
					      </td>
					      <td>$14</td>
					    </tr>
					  </tbody>
					</table>
				</div>
		</div>
		<div class="checkout__footer d-flex align-items-center justify-content-between p-3">
			<button class="btn btn-light btn-small">Back to Shop</button>
			<button class="btn btn-pink btn-small">Checkout</button>
		</div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>


<!-- Template -->
<!-- <div class="container">
	<div class="row m-2">
		<div class="col-md-12">
			<div class="checkout p-5">
				<h3 class="checkout__title m-0 pb-4">4 Items in your Cart</h3>
				<div class="col-md-12 cart">
					<table class="table cart-table">
					  <thead>
					    <tr>
					      <th scope="col">Item</th>
					      <th scope="col">Size</th>
					      <th scope="col">Qty</th>
					      <th scope="col">Price</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <td>
					      	<div class="product__display d-flex align-items-center">
					      		<img class="img-fluid w-25 mr-3 border" src="/images/hoodie.jpg">
					      		<div class="product__info">
					      			<h5>Green T Shirts</h5>
					      			<p>Men BK3569</p>
					      			<a href="#">Remove</a>
					      		</div>
					      	</div>
					      </td>
					      <td>
					      	<p>XX</p>
					      	<p>L</p>
					      </td>
					      <td class="">
					      	<div class="d-flex justify-content-center">
					      		<a href="#" class=" btn btn-pink btn-xsmall remove-qty mr-1"><i class="fas fa-minus"></i></a>
						      	<input type="text" name="qty" value= "4" class="form-control rounded-input w-25">
						      	<a href="#" class="btn btn-pink btn-xsmall add-qty ml-1"><i class="fas fa-plus"></i></a>
					      	</div>
					      </td>
					      <td>$14</td>
					    </tr>
					    <tr>
					      <td>
					      	<div class="product__display d-flex align-items-center">
					      		<img class="img-fluid w-25 mr-3 border" src="/images/hoodie.jpg">
					      		<div class="product__info">
					      			<h5>Green T Shirts</h5>
					      			<p>Men BK3569</p>
					      			<a href="#">Remove</a>
					      		</div>
					      	</div>
					      </td>
					      <td>
					      	<p>XX</p>
					      	<p>L</p>
					      </td>
					      <td class="">
					      	<div class="d-flex justify-content-center">
					      		<a href="#" class=" btn btn-pink btn-xsmall remove-qty mr-1"><i class="fas fa-minus"></i></a>
						      	<input type="text" name="qty" value= "4" class="form-control rounded-input w-25">
						      	<a href="#" class="btn btn-pink btn-xsmall add-qty ml-1"><i class="fas fa-plus"></i></a>
					      	</div>
					      </td>
					      <td>$14</td>
					    </tr>
					    <tr>
					      <td>
					      	<div class="product__display d-flex align-items-center">
					      		<img class="img-fluid w-25 mr-3 border" src="/images/hoodie.jpg">
					      		<div class="product__info">
					      			<h5>Green T Shirts</h5>
					      			<p>Men BK3569</p>
					      			<a href="#">Remove</a>
					      		</div>
					      	</div>
					      </td>
					      <td>
					      	<p>XX</p>
					      	<p>L</p>
					      </td>
					      <td class="">
					      	<div class="d-flex justify-content-center">
					      		<a href="#" class=" btn btn-pink btn-xsmall remove-qty mr-1"><i class="fas fa-minus"></i></a>
						      	<input type="text" name="qty" value= "4" class="form-control rounded-input w-25">
						      	<a href="#" class="btn btn-pink btn-xsmall add-qty ml-1"><i class="fas fa-plus"></i></a>
					      	</div>
					      </td>
					      <td>$14</td>
					    </tr>
					    <tr>
					      <td>
					      	<div class="product__display d-flex align-items-center">
					      		<img class="img-fluid w-25 mr-3 border" src="/images/hoodie.jpg">
					      		<div class="product__info">
					      			<h5>Green T Shirts</h5>
					      			<p>Men BK3569</p>
					      			<a href="#">Remove</a>
					      		</div>
					      	</div>
					      </td>
					      <td>
					      	<p>XX</p>
					      	<p>L</p>
					      </td>
					      <td class="">
					      	<div class="d-flex justify-content-center">
					      		<a href="#" class=" btn btn-pink btn-xsmall remove-qty mr-1"><i class="fas fa-minus"></i></a>
						      	<input type="text" name="qty" value= "4" class="form-control rounded-input w-25">
						      	<a href="#" class="btn btn-pink btn-xsmall add-qty ml-1"><i class="fas fa-plus"></i></a>
					      	</div>
					      </td>
					      <td>$14</td>
					    </tr>
					  </tbody>
					</table>
				</div>
			</div>
			<div class="checkout__footer d-flex align-items-center justify-content-between p-3">
				<button class="btn btn-light btn-small">Back to Shop</button>
				<button class="btn btn-pink btn-small">Checkout</button>
			</div>
		</div>
	</div>
</div> -->
@endsection