@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row m-2">
		<div class="col-md-12">
			<div class="checkout p-5">
				<h3 class="checkout__title m-0 pb-4">Checkout</h3>
				<!-- <div class="checkout__steps">
					<ul class="p-0 m-0 d-flex justify-content-center align-items-center">
						<li class="current">
							<a href="#">
								<div class="title">
									<span class="title__icon"></span>
									<span class="title__text">Delivery</span>
								</div>
							</a>
						</li>
						<li class="">
							<a href="#">
								<div class="title">
									<span class="title__icon"></span>
									<span class="title__text">Confirmation</span>
								</div>
							</a>
						</li>
						<li class="">
							<a href="#">
								<div class="title">
									<span class="title__icon"></span>
									<span class="title__text">Payment</span>
								</div>
							</a>
						</li>
						<li class="">
							<a href="#">
								<div class="title">
									<span class="title__icon"></span>
									<span class="title__text">Finish</span>
								</div>
							</a>
						</li>
					</ul>
				</div> -->
				<!-- Step 1 -->
				<!-- <div class="col-md-12 mt-3">
					 <div class="form-row">
					    <div class="col-md-5 offset-md-1 mb-3">
					      <label for="validationDefault01">First name</label>
					      <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
					    </div>
					    <div class="col-md-5 mb-3">
					      <label for="validationDefault02">Last name</label>
					      <input type="text" class="form-control" id="validationDefault02" placeholder="Last name" value="Otto" required>
					    </div>
					  </div>
					  <div class="form-row">
					    <div class="col-md-5 offset-md-1 mb-3">
					      <label for="validationDefault01">Address</label>
					      <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
					    </div>
					    <div class="col-md-5 mb-3">
					      <label for="validationDefault02">City</label>
					      <input type="text" class="form-control" id="validationDefault02" placeholder="Last name" value="Otto" required>
					    </div>
					  </div>
					  <div class="form-row">
					    <div class="col-md-5 offset-md-1 mb-3">
					      <label for="validationDefault01">State</label>
					      <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
					    </div>
					    <div class="col-md-5 mb-3">
					      <label for="validationDefault02">ZIP Code</label>
					      <input type="text" class="form-control" id="validationDefault02" placeholder="Last name" value="Otto" required>
					    </div>
					  </div>
					  <div class="form-row">
					    <div class="col-md-5 offset-md-1">
					      <p>Country: <b>Great Britain</b></p>
					    </div>
					  </div>
					  <div class="form-row">
					    <div class="col-md-12 offset-md-1">
					      <label class="checkbox" for="checkbox2">
				            <input type="checkbox" checked="checked" value="" id="checkbox2" data-toggle="checkbox" class="custom-checkbox"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
				            My billing information is the same as my delivery information.
				          </label>
					    </div>
					  </div>
					  <hr>
					  <div class="form-row pt-2">
					    <div class="col-md-5 offset-md-1">
					      <h4 class="m-0 text-dark">Delivery Options</h4>
					    </div>
					  </div>
					  <div class="form-row mt-3">
					    <div class="col-md-5 offset-md-1">
					      <label class="radio">
				            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option1" data-toggle="radio" checked="" class="custom-radio"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
				            <b>Standard Shipping</b> (Free, 2-3 Business Days)
				          </label>
					    </div>
					    <div class="col-md-6">
					      <label class="radio">
				            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option1" data-toggle="radio" checked="" class="custom-radio"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
				            <b>Express Shipping</b> ($28, 1-2 Business Days)
				          </label>
					    </div>
					  </div>
				</div> -->

				<!-- Step 2 -->
				<!-- <div class="col-md-12 mt-3">
					<div class="row">
						<div class="col-md-8">
							<h6 class="text-dark text-mid-header p-2">Order Summary</h6>
							<table class="table checkout-table">
							  <thead>
							    <tr>
							      <th scope="col">Item</th>
							      <th scope="col">Qty</th>
							      <th scope="col">Price</th>
							    </tr>
							  </thead>
							  <tbody>
							    <tr>
							      <td>Yellow pants Kids</td>
							      <td>2</td>
							      <td>$14</td>
							    </tr>
							    <tr>
							      <td>Green T Shirts</td>
							      <td>8</td>
							      <td>$24</td>
							    </tr>
							    <tr>
							      <td>Top Shoes Winter</td>
							      <td>1</td>
							      <td>$68</td>
							    </tr>
							  </tbody>
							</table>
						</div>
						<div class="col-md-4">
							<h6 class="text-dark text-mid-header p-2">Delivery</h6>

							<h6 class="text-grey text-small-header pb-2">Address</h6>
							<p>Office 64, 8 Colmore Row, Birmingham, England, 42000</p>

							<h6 class="text-grey text-small-header pb-2">Delivery Options</h6>
							<p>Standard Delivery, (Free, 2-3 Days)</p>
						</div>
					</div><hr>
					<div class="row">
						<div class="col-md-3">
							<input type="text" placeholder="Enter Discount Code" class="form-control rounded-input mr-3">
						</div>
						<div class="col-md-9 d-flex justify-content-around">
							<div>
								<h6 class="text-grey text-small-header font-weight-bold m-0">Subtotal</h6>
								<p class="font-weight-bold">$368</p>
							</div>
							<div>
								<h6 class="text-grey text-small-header font-weight-bold m-0">Shipping</h6>
								<p class="font-weight-bold">Free</p>
							</div>
							<div>
								<h6 class="text-grey text-small-header font-weight-bold m-0">Grand Total</h6>
								<p class="font-weight-bold">$340</p>
							</div>
						</div>
					</div>
				</div> -->

				<!-- Step 3 -->
				<!-- <div class="col-md-12 mt-3">
					<div class="row">
						<div class="col-md-6">
							<div class="checkout__payment payment__active">
								<i class="fab fa-4x fa-cc-visa pb-2"></i>
								<i class="fab fa-4x fa-cc-mastercard pb-2"></i>
								<label class="radio">
						            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option1" data-toggle="radio" checked="" class="custom-radio"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
						            Pay $100 with Credit Card
						          </label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="checkout__payment">
								<i class="fab fa-4x fa-cc-paypal pb-2"></i><br>
								<label class="radio">
						            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option1" data-toggle="radio" checked="" class="custom-radio"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
						            Pay $100 with PayPal
						          </label>
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<div class="form-row">
							    <div class="col-md-5 offset-md-1 mb-3">
							      <label for="validationDefault01">Cardholder's Name</label>
							      <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
							    </div>
							    <div class="col-md-5 mb-3">
							      <label for="validationDefault02">Card Number</label>
							      <input type="text" class="form-control" id="validationDefault02" placeholder="Last name" value="Otto" required>
							    </div>
							</div>
							<div class="form-row">
							    <div class="col-md-2 offset-md-1">
							      <label for="validationDefault01">Valid Thru</label>
							      <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
							    </div>
							    <div class="col-md-3">
							      <label for="validationDefault02">CVV / CVC *</label>
							      <input type="text" class="form-control" id="validationDefault02" placeholder="Last name" value="Otto" required>
							    </div>
							    <div class="col-md-3">
							      <p>Information</p>
							      <p>CCV</p>
							    </div>
							</div>
						</div>
					</div>
				</div> -->

				<!-- Step 4 -->
				<div class="col-md-12 mt-3">
					<div class="row">
						<div class="col-md-6 offset-md-3 checkout__success text-center">
							<i class="fas fa-9x fa-check-circle text-success"></i>
							<h1>Success</h1>
							<p>Your items will be shipped shortly, <br> You will recieve an email with details.</p>
							<button class="btn btn-pink btn-big">Back to Shop</button>
						</div>
					</div>
				</div>
			</div>
			<div class="checkout__footer d-flex align-items-center justify-content-between p-3">
				<button class="btn btn-light btn-small">Back</button>
				<button class="btn btn-pink btn-small">Next Step</button>
			</div>

			<!-- Cart -->
			<!-- <div class="shoppingcart p-5">
				<h3 class="checkout__title m-0 pb-4">Checkout</h3>
			</div> -->
		</div>
	</div>
</div>
@endsection