<template>
	<div>
		<!-- Header -->
		<div class="header">

			<!-- Top Bar -->
			<TopBar></TopBar>

			<ShoppingCart></ShoppingCart>

		    <nav class="navbar navbar-light p-3" style="background-color: #fff;">
			  <a class="navbar-brand" href="#">HOMESHOPPING</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			    <!-- <span class="navbar-toggler-icon"></span> -->
			  </button>

			  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
			  	<div class="">
				    <ul class="navbar-nav">
				      <li class="nav-item" v-for="department in departments">
				      	<router-link class="nav-link" :to="{ name: 'category', query: { 'search' : true, 'department' : department.department_id } }">{{ department.name }}</router-link>
				      </li>
				      <<!-- li class="nav-item">
				      	 <form class="form-inline my-2 my-lg-0">
					      <input class="form-control mr-sm-2" type="search" placeholder="Search">
					      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
					    </form>
				      </li> -->
				    </ul>
			  	</div>
			  </div>
			</nav>
		</div>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<!-- Product Details -->
					<div class="product__view d-flex justify-content-center p-5 shadow">
						<img class="img-fluid w-50 mr-5" :src=" '/images/products/' + productDetails.thumbnail">
						<div class="product__view__details">
							<nav aria-label="breadcrumb">
							  <ol class="breadcrumb p-0">
							    <li class="breadcrumb-item"><a href="#">Home</a></li>
							    <li class="breadcrumb-item"><a href="#">All Categories</a></li>
							    <li class="breadcrumb-item active" aria-current="page">{{ productCategory.name }}</li>
							  </ol>
							</nav>
							<!-- <div class="product__rating">
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star checked"></span>
								<span class="fas fa-star"></span>
								<span class="fas fa-star"></span>
							</div> -->
							<h1 class="pt-2 pb-3">{{ productDetails.name }}</h1>
							<h5 class="pb-2">${{ productDetails.price }}</h5>

							<!-- Color -->
							<div class="filter__body__widget pb-2">
								<h4>Color</h4>
								<div class="ml-2">
									<label class="custom-radiobtn" v-for="attribute in productAttributes" v-if="attribute.attribute_name == 'Color'">
									  <input type="radio" name="color" v-model="order.color" :value="attribute.attribute_value">
									  <span class="checkmark" :style=" 'background:' + attribute.attribute_value "></span>
									</label>
								</div>
							</div>

							<!-- Size -->
							<div class="filter__body__widget pb-2">
								<h4>Size</h4>
								<div class="d-flex flex-wrap">
									<div class="checkbox-btn" v-for="attribute in productAttributes" v-if="attribute.attribute_name == 'Size'">
									   <label>
									      <input type="radio" name="size" :value="attribute.attribute_value" v-model="order.size"><span>{{ attribute.attribute_value }}</span>
									   </label>
									</div>
								</div>
							</div>

							<!-- Quantity -->
							<div class="filter__body__widget pb-5">
								<h4>Quantity</h4>
								<div class="d-flex">
							      	<button @click="removeQuantity()" class=" btn btn-pink btn-xsmall remove-qty mr-1"><i class="fas fa-minus"></i></button>
								    <input type="text" name="qty" value= "1" v-model="order.quantity" class="form-control rounded-input w-25">
								    <button @click="addQuantity()" class="btn btn-pink btn-xsmall add-qty ml-1"><i class="fas fa-plus"></i></button>
							    </div>
							</div>
							<div class="d-flex align-items-center justify-content-around">
								<button @click="addToShoppingCart()" class="btn btn-pink btn-big">Add to Cart</button>
								<span><a href="#"><i class="far fa-heart"></i></a> Add to Wish List</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="product__reviews p-5 shadow">
						<h4 v-if="productReviews.length">Product Reviews</h4>
						<div v-if="productReviews.length" v-for="review in productReviews" class="review p-4 d-flex align-items-center justify-content-between">
							<div class="review__details">
								<div class="product__rating pb-4">
									<star-rating :read-only="true" :rating="review.rating" :star-size="30" :show-rating="false"></star-rating>
								</div>
								<h5>{{ review.name }}</h5>
								<span>{{ reviewDuration(review.created_on) }}</span>
							</div>
							<div class="review__content w-75">
								<p>{{ review.review }}</p>
								<!-- <div class="review__actions">
									<span><a href="#"><i class="far fa-heart"></i></a> 113</span>
									<span><a href="#"><i class="far fa-comment"></i></a> 13</span>
								</div> -->
							</div>
						</div>
						<hr class="mb-5">
						<div class="review__add">
							<h4>Add a Review</h4>
							<div class="review__form p-5">
								  <div class="form-group row">
								    <label for="inputPassword" class="col-sm-3 col-form-label">Your Review</label>
								    <div class="col-sm-9">
								      <textarea v-model="review.review" rows="7" class="form-control" id="inputPassword" placeholder="Your Review"></textarea>
								      <small class="text-muted">Your review must be greater than 50 Characters.</small>
								    </div>
								  </div>
								  <div class="form-group row">
								    <label for="inputPassword" class="col-sm-3 col-form-label">Overall Rating</label>
								    <div class="col-sm-9">
								     	<div class="product__rating p-2">
											<star-rating v-model="review.rating"></star-rating>
										</div>
								    </div>
								  </div>
								  <button @click="submitProductReview()" class="btn btn-pink btn-small">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="similar__products p-5">
						<h4>You may also like</h4>

						<div class="similar__products__list">
							<div class="row flex-nowrap">
								<div class="col-md-3">
									<div class="product shadow mb-4">
										<img class="img-fluid w-75 mt-4" src="/images/hoodie.jpg">
										<div class="product__body mt-3 mb-4">
											<h4 class="product__title">Men's Knitwear Offers</h4>
											<h5 class="product__price">$46.66</h5>
										</div>
										<div class="product__overlay">
											<a href="#"><i class="far fa-heart"></i></a>
											<button class="btn btn-small btn-pink mt-2">Quick View</button>
											<button class="btn btn-small btn-pink mt-2">Buy Now</button>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="product shadow mb-4">
										<img class="img-fluid w-75 mt-4" src="/images/hoodie.jpg">
										<div class="product__body mt-3 mb-4">
											<h4 class="product__title">Men's Knitwear Offers</h4>
											<h5 class="product__price">$46.66</h5>
										</div>
										<div class="product__overlay">
											<a href="#"><i class="far fa-heart"></i></a>
											<button class="btn btn-small btn-pink mt-2">Quick View</button>
											<button class="btn btn-small btn-pink mt-2">Buy Now</button>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="product shadow mb-4">
										<img class="img-fluid w-75 mt-4" src="/images/hoodie.jpg">
										<div class="product__body mt-3 mb-4">
											<h4 class="product__title">Men's Knitwear Offers</h4>
											<h5 class="product__price">$46.66</h5>
										</div>
										<div class="product__overlay">
											<a href="#"><i class="far fa-heart"></i></a>
											<button class="btn btn-small btn-pink mt-2">Quick View</button>
											<button class="btn btn-small btn-pink mt-2">Buy Now</button>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="product shadow mb-4">
										<img class="img-fluid w-75 mt-4" src="/images/hoodie.jpg">
										<div class="product__body mt-3 mb-4">
											<h4 class="product__title">Men's Knitwear Offers</h4>
											<h5 class="product__price">$46.66</h5>
										</div>
										<div class="product__overlay">
											<a href="#"><i class="far fa-heart"></i></a>
											<button class="btn btn-small btn-pink mt-2">Quick View</button>
											<button class="btn btn-small btn-pink mt-2">Buy Now</button>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="product shadow mb-4">
										<img class="img-fluid w-75 mt-4" src="/images/hoodie.jpg">
										<div class="product__body mt-3 mb-4">
											<h4 class="product__title">Men's Knitwear Offers</h4>
											<h5 class="product__price">$46.66</h5>
										</div>
										<div class="product__overlay">
											<a href="#"><i class="far fa-heart"></i></a>
											<button class="btn btn-small btn-pink mt-2">Quick View</button>
											<button class="btn btn-small btn-pink mt-2">Buy Now</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</template>

<script>
import StarRating from 'vue-star-rating'
import TopBar from './partials/TopBar.vue'
import ShoppingCart from './ShoppingCart.vue'
export default {

	components: {
	  StarRating,
	  TopBar,
	  ShoppingCart
	},

	data() {
		return {
			product_id: this.$route.params.id,

			departments: [],
			productDetails: [],
			productCategory: [],
			productAttributes: [],
			productReviews: [],

			// Unique Cart ID
			cartId: '',

			order: {
				color: '',
				size: '',
				quantity: 1
			},

			review: {
				review: '',
				rating: 0,
				product_id: this.$route.params.id
			}
		}
	},

	mounted() {
		this.fetchDepartments();
		this.fetchProductDetails(this.product_id);
	},

	methods: {
		reviewDuration(dt) {
			return moment(dt).fromNow();
		},

		async fetchDepartments() {
			await axios.get('/departments')
			.then( (response) => {
				let { data } = response;
				this.departments = data;
			});
		},

		async fetchProductDetails(id) {
			let { data } = await axios.get(`/products/${id}`);
			this.productDetails = data;
			await this.fetchProductAttributes(id);
			await this.fetchProductCategory(id);
			await this.fetchProductReviews(id);
		},

		async fetchProductCategory(id) {
			await axios.get(`/categories/inProduct/${id}`)
			.then( (response) => {
				let { data } = response;
				this.productCategory = data;
			});
		},

		async fetchProductAttributes(id) {
			await axios.get(`/attributes/inProduct/${id}`)
			.then( (response) => {
				let { data } = response;
				this.productAttributes = data;
			});
		},

		async fetchProductReviews(id) {
			await axios.get(`/products/${id}/reviews`)
			.then( (response) => {
				let { data } = response;
				this.productReviews = data;
			});
		},

		async submitProductReview() {

			if( !this.$store.getters.loggedIn ) {
				this.$modal.show('login');
				return;
			}

			await axios.post(`/products/${this.product_id}/reviews`, this.review, {
				headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                }
			})
			.then( (response) => {
				this.productReviews.push(response.data);
				this.clearReviewForm();
			})
			.catch( (error) => {
				console.log("ERROR", error.response.data);
			})
		},

		async addToShoppingCart() {

			if( !this.$store.getters.loggedIn ) {
				this.$modal.show('login');
				return;
			}

			this.cartId = await this.fetchCartID();

			// Validation
			if( this.order.color.length == 0 ) {
				alert("Please choose product Color");
				return;
			}

			if( this.order.size.length == 0 ) {
				alert("Please choose product Size");
				return;
			}

			let { data } = await axios.post(`/shoppingcart/add`, {
				'cart_id'   : this.cartId,
				'product_id': this.product_id,
				'product_attributes': `Color: ${this.order.color} Size: ${this.order.size}`,
				'quantity'  : this.order.quantity
			}, {
				headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                }
			});

			this.$modal.show('shoppingcart');
		},

		async fetchCartID() {
			let { data } = await axios.get('/shoppingcart/generateUniqueId', {
				headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                }
			});
			
			return data.cart_id;
		},

		addQuantity() {
			this.order.quantity += 1;
		},

		removeQuantity() {
			this.order.quantity -= 1;
		},

		clearReviewForm() {
			this.review.review = '';
			this.review.rating = 0;
		}
	}
}
</script>