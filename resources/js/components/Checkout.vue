<template>
	<div class="container">
		<div class="row m-2">
			<div class="col-md-12">
				<div class="checkout p-5">
					<h3 class="checkout__title m-0 pb-4">Checkout</h3>
					<!-- Checkout Steps -->
					<div class="checkout__steps">
						<ul class="p-0 m-0 d-flex justify-content-center align-items-center">
							<li :class=" step == 1 || step > 1 ? 'current' : '' ">
								<a href="#">
									<div class="title">
										<span class="title__icon"></span>
										<span class="title__text">Delivery</span>
									</div>
								</a>
							</li>
							<li :class=" step == 2 || step > 2 ? 'current' : '' ">
								<a href="#">
									<div class="title">
										<span class="title__icon"></span>
										<span class="title__text">Confirmation</span>
									</div>
								</a>
							</li>
							<li :class=" step == 3 || step > 3 ? 'current' : '' ">
								<a href="#">
									<div class="title">
										<span class="title__icon"></span>
										<span class="title__text">Payment</span>
									</div>
								</a>
							</li>
							<li :class=" step == 4 ? 'current' : '' ">
								<a href="#">
									<div class="title">
										<span class="title__icon"></span>
										<span class="title__text">Finish</span>
									</div>
								</a>
							</li>
						</ul>
					</div>

					<!-- Step 1 -->
					<div v-if="step == 1" class="col-md-12 mt-3">
						 <div class="form-row">
						    <div :class=" errors.delivery.first_name == true ? 'col-md-5 offset-md-1 mb-3 has-error' : 'col-md-5 offset-md-1 mb-3' ">
						      <label for="validationDefault01">First name</label>
						      <input type="text" v-model="delivery.first_name" class="form-control" id="validationDefault01" placeholder="i.e John" required>
						    </div>
						    <div :class=" errors.delivery.last_name == true ? 'col-md-5 mb-3 has-error' : 'col-md-5 mb-3' ">
						      <label for="validationDefault02">Last name</label>
						      <input type="text" v-model="delivery.last_name" class="form-control" id="validationDefault02" placeholder="i.e Doe" required>
						    </div>
						  </div>
						  <div class="form-row">
						    <div :class=" errors.delivery.address == true ? 'col-md-5 offset-md-1 mb-3 has-error' : 'col-md-5 offset-md-1 mb-3' ">
						      <label for="validationDefault01">Address</label>
						      <input type="text" v-model="delivery.address" class="form-control" id="validationDefault01" placeholder="i.e Apartment 1A, 1st Floor, Cyber Villas"required>
						    </div>
						    <div :class=" errors.delivery.city == true ? 'col-md-5 mb-3 has-error' : 'col-md-5 mb-3' ">
						      <label for="validationDefault02">City</label>
						      <input type="text" v-model="delivery.city" class="form-control" id="validationDefault02" placeholder="i.e Karachi" required>
						    </div>
						  </div>
						  <div class="form-row">
						    <div :class=" errors.delivery.state == true ? 'col-md-5 offset-md-1 mb-3 has-error' : 'col-md-5 offset-md-1 mb-3' ">
						      <label for="validationDefault01">State</label>
						      <input type="text" v-model="delivery.state" class="form-control" id="validationDefault01" placeholder="i.e Sindh" required>
						    </div>
						    <div :class=" errors.delivery. zip_code == true ? 'col-md-5 mb-3 has-error' : 'col-md-5 mb-3' ">
						      <label for="validationDefault02">ZIP Code</label>
						      <input type="text" v-model="delivery.zip_code" class="form-control" id="validationDefault02" placeholder="i.e 776600" value="Otto" required>
						    </div>
						  </div>
						  <div class="form-row">
						  	<div :class=" errors.delivery.region == true ? 'col-md-5 offset-md-1 mb-3 has-error' : 'col-md-5 offset-md-1 mb-3' ">
						      <label for="validationDefault02">Shipping Region</label>
						      <select @change="fetchDeliveryOptions()" v-model="delivery.region" class="form-control">
						      	<option v-for="region in regions" :value="region.shipping_region_id">{{ region.shipping_region }}</option>
						      </select>
						    </div>
						  </div>
						  <!-- <div class="form-row">
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
						  </div> -->
						  <hr>
						  <div v-if="shippings.length" class="form-row pt-2">
						    <div class="col-md-5 offset-md-1">
						      <h4 class="m-0 text-dark">Delivery Options</h4>
						    </div>
						  </div>
						  <div v-if="shippings.length" class="form-row mt-3 ml-5">
						    <div v-for="shipping in shippings" class="col-md-6">
						      <label class="radio">
					            <input type="radio" v-model="delivery.option" name="optionsRadios" id="optionsRadios2" :value="shipping" data-toggle="radio" checked="" class="custom-radio"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
					            <b>{{ shipping.shipping_type }}</b>
					          </label>
						    </div>
						  </div>
					</div>

					<!-- Step 2 -->
					<div v-if="step == 2" class="col-md-12 mt-3">
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
								    <tr v-for="product in products">
								      <td>{{ product.name }}</td>
								      <td>{{ product.quantity }}</td>
								      <td>${{ product.price }}</td>
								    </tr>
								  </tbody>
								</table>
							</div>
							<div class="col-md-4">
								<h6 class="text-dark text-mid-header p-2">Delivery</h6>

								<h6 class="text-grey text-small-header pb-2">Address</h6>
								<p>{{ delivery.address }}</p>

								<h6 class="text-grey text-small-header pb-2">Delivery Options</h6>
								<p>{{ delivery.option.shipping_type }}</p>
							</div>
						</div><hr>
						<div class="row">
							<div class="col-md-3">
								<!-- <input type="text" placeholder="Enter Discount Code" class="form-control rounded-input mr-3"> -->
							</div>
							<div class="col-md-9 d-flex justify-content-around">
								<div>
									<h6 class="text-grey text-small-header font-weight-bold m-0">Subtotal</h6>
									<p class="font-weight-bold">${{ checkoutSubTotal }}</p>
								</div>
								<div>
									<h6 class="text-grey text-small-header font-weight-bold m-0">Shipping</h6>
									<p class="font-weight-bold">${{ delivery.option.shipping_cost }}</p>
								</div>
								<div>
									<h6 class="text-grey text-small-header font-weight-bold m-0">Grand Total</h6>
									<p class="font-weight-bold">${{ checkoutSubTotal + parseFloat(this.delivery.option.shipping_cost) }}</p>
								</div>
							</div>
						</div>
					</div>

					<!-- Step 3 -->
					<div v-if="step == 3" class="col-md-12 mt-3">
						<div class="row">
							<div class="col-md-6">
								<div :class="errors.payment.type == true ? 'checkout__payment has-error' : 'checkout__payment' ">
									<i class="fab fa-4x fa-cc-visa pb-2"></i>
									<i class="fab fa-4x fa-cc-mastercard pb-2"></i>
									<label class="radio">
							            <input type="radio" v-model="payment.type" name="paymentMethod" id="optionsRadios2" value="creditcard" data-toggle="radio" checked="" class="custom-radio"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
							            Pay $100 with Credit Card
							          </label>
								</div>
							</div>
							<div class="col-md-6">
								<div :class="errors.payment.type == true ? 'checkout__payment has-error' : 'checkout__payment' ">
									<i class="fab fa-4x fa-cc-paypal pb-2"></i><br>
									<label class="radio">
							            <input type="radio" v-model="payment.type" name="paymentMethod" id="optionsRadios2" value="paypal" data-toggle="radio" checked="" class="custom-radio"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
							            Pay $100 with PayPal
							          </label>
								</div>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-md-12">
								<div class="form-row">
								    <div :class=" errors.payment.card_name == true ? 'col-md-5 offset-md-1 mb-3 has-error' : 'col-md-5 offset-md-1 mb-3' ">
								      <label for="validationDefault01">Cardholder's Name</label>
								      <input type="text" v-model="payment.card_name" class="form-control" id="validationDefault01" placeholder="i.e M John" required>
								    </div>
								    <div  :class=" errors.payment.card_number == true ? 'col-md-5 mb-3 has-error' : 'col-md-5 mb-3' ">
								      <label for="validationDefault02">Card Number</label>
								      <input type="text" v-model="payment.card_number" class="form-control" id="validationDefault02" placeholder="i.e 3333333333333" value="Otto" required>
								    </div>
								</div>
								<div class="form-row">
								    <div :class=" errors.payment.valid == true ? 'col-md-2 offset-md-1 has-error' : 'col-md-2 offset-md-1' ">
								      <label for="validationDefault01">Valid Thru</label>
								      <input type="text" v-model="payment.valid" class="form-control" id="validationDefault01" placeholder="12/30" value="Mark" required>
								    </div>
								    <div :class=" errors.payment.ccv == true ? 'col-md-3 has-error' : 'col-md-3' ">
								      <label for="validationDefault02">CVV / CVC *</label>
								      <input type="text" v-model="payment.ccv" class="form-control" id="validationDefault02" placeholder="i.e 434" value="Otto" required>
								    </div>
								</div>
							</div>
						</div>
					</div>

					<!-- Step 4 -->
					<div v-if="step == 4" class="col-md-12 mt-3">
						<div class="row">
							<div class="col-md-6 offset-md-3 checkout__success text-center">
								<i class="fas fa-9x fa-check-circle text-success"></i>
								<h1>Success</h1>
								<p>Your items will be shipped shortly, <br> You will recieve an email with details.</p>
								<router-link class="btn btn-pink btn-big" :to="{ name: 'index' }">Back to Shop</router-link>
							</div>
						</div>
					</div>
				</div>
				<div v-if="step < 4" class="checkout__footer d-flex align-items-center justify-content-between p-3">
					<button v-if="step > 1" @click="previousStep()" class="btn btn-light btn-small">Back</button>
					<div></div>
					<button v-if="step < 4" @click="nextStep()" class="btn btn-pink btn-small">Next Step</button>
				</div>

				<!-- Cart -->
				<!-- <div class="shoppingcart p-5">
					<h3 class="checkout__title m-0 pb-4">Checkout</h3>
				</div> -->
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			step: 1,

			errors: {
				delivery: {
					first_name: false,
					last_name : false,
					address   : false,
					city      : false,
					state     : false,
					zip_code  : false,
					region    : false,
					option    : false
				},

				payment: {
					type       : false,
					card_name  : false,
					card_number: false,
					valid      : false,
					ccv        : false,
				},
			},

			delivery: {
				first_name: '',
				last_name : '',
				address   : '',
				city      : '',
				state     : '',
				zip_code  : '',
				region    : 1,
				option    : ''
			},

			payment: {
				type: '',
				card_name: '',
				card_number: '',
				valid: '',
				ccv: '',
			},

			// Form Populated
			regions: [],
			shippings: [],
			products: [],
			cartId: ''
		}
	},

	created() {
		this.fetchCartItems();
		this.fetchShippingRegions();
	},

	computed: {
		checkoutSubTotal() {
			return this.products.reduce((total, product) => {
				return total + product.subtotal;
			}, 0)
		}
	},

	methods: {
		nextStep() {
			if( this.validateStep(this.step) ) {
				this.step += 1;
			}

			// Finalize Order
			if( this.step == 4 ) {
				this.createCustomerOrder();
			}
		},

		previousStep() {
			this.step -= 1;
		},

		// Step Fields Validation
		validateStep(step) {
			let clear = true;
			switch(step) {
				case 1:
					$.each(this.delivery, (key, value) => {
						if( this.delivery[key].length == 0 || this.delivery[key] == 1) {
						 	this.errors.delivery[key] = true;
						 	clear = false;
						} else {
						 	this.errors.delivery[key] = false;
						}
					});
					return clear;
					break;
				case 3:
					$.each(this.payment, (key, value) => {
						if( this.payment[key].length == 0 || this.payment[key] == 1) {
						 	this.errors.payment[key] = true;
						 	clear = false;
						} else {
						 	this.errors.payment[key] = false;
						}
					});
					return clear;
					break;

				default:
					return true;
					break;
			}
		},

		async fetchShippingRegions() {
			let { data } = await axios.get('/shipping/regions');
			this.regions = data;
		},

		async fetchDeliveryOptions() {
			let { data } = await axios.get(`/shipping/regions/${this.delivery.region}`);
			this.shippings = data;
		},

		async fetchCartID() {
			let { data } = await axios.get('/shoppingcart/generateUniqueId', {
				headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                }
			});
			
			return data.cart_id;
		},

		async fetchCartItems() {

			let cartId = await this.fetchCartID();
			let { data } = await axios.get(`/shoppingcart/${cartId}`, {
				headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                }
			});
			this.cartId = cartId;
			this.products = data;

			if( this.products.length == 0 ) {
				this.$router.push('/');
			}
		},

		async createCustomerOrder() {
			let { data } = await axios.post('/orders', {
				"cart_id"    : this.cartId,
				"shipping_id": this.delivery.option.shipping_id,
				"tax_id"     : 1
			}, {
				headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                }
			});
		}

	}
}
</script>