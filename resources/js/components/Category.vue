<template>
	<div>
		<!-- Header Bar -->
		<div class="header">
		    
		    <!-- Top Bar -->
			<TopBar></TopBar>

			<!-- <ShoppingCart></ShoppingCart> -->

		    <nav class="p-3 d-flex align-items-center justify-content-around">
		        <h4 class="p-0 m-0">HomeShopping</h4>
		        <ul class="p-0 m-0 no-list">
		            <li v-for="department in departments"><a @click="fetchCategories(department.name,department.department_id)" href="#">{{ department.name }}</a></li>
		        </ul>
		        <input @input="searchProducts()" v-model="searchTerm" class="form-control header-search col-md-2" type="text" placeholder="Search Anything">
		        <!-- <span class="fa-layers fa-fw mr-2" style="font-size:25px;">
		            <i class="fas fa-shopping-cart"></i>
		            <span class="fa-layers-counter" style="font-size: 35px;background:#fff;color:#F62F5E;">25</span>
		        </span> -->
		    </nav>
		</div>

		<div class="container-fluid mt-2">
			<div class="row">
				<div class="col-md-12">
					<div class="category__header m-3 shadow">
						<h1 class="m-0 pb-4">{{ headerName }}</h1>
						<div class="row">
							<div class="col-md-2">
								<ul>
									<li v-for="category in categories">
										<a href="#" @click="fetchProducts(category.category_id)">{{ category.name }}</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid">
			<div class="row m-1">
				<div class="col-md-3">
					<div class="filter">
						<div class="filter__header shadow">
							<h4>Filter 486 Items</h4>
							<ul class="p-0 pl-2">
								<li>
									<a href="#" class="mr-1"><i class="fas fa-times"></i></a> <span>Gender:</span> Woman
								</li>
								<li>
									<a href="#" class="mr-1"><i class="fas fa-times"></i></a> <span>Category:</span> Dresses
								</li>
							</ul>
						</div>
						<div class="filter__body shadow">
							<div class="filter__body__widget">
								<h4>Color</h4>
								<div class="">
									<label class="custom-radiobtn">
									  <input type="radio" checked="checked" name="radio">
									  <span class="checkmark" style="background:#6EB2FB;"></span>
									</label>
									<label class="custom-radiobtn">
									  <input type="radio" name="radio">
									  <span class="checkmark" style="background:#00D3CA;"></span>
									</label>
									<label class="custom-radiobtn">
									  <input type="radio" name="radio">
									  <span class="checkmark" style="background:#F62F5E;"></span>
									</label>
									<label class="custom-radiobtn">
									  <input type="radio" name="radio">
									  <span class="checkmark" style="background:#FE5C07;"></span>
									</label>
									<label class="custom-radiobtn">
									  <input type="radio" name="radio">
									  <span class="checkmark" style="background:#F8E71C;"></span>
									</label>
									<label class="custom-radiobtn">
									  <input type="radio" name="radio">
									  <span class="checkmark" style="background:#7ED321;"></span>
									</label>
								</div>
							</div>
							<div class="filter__body__widget">
								<h4>Size</h4>
								<div class="d-flex flex-wrap">
									<div class="checkbox-btn">
									   <label>
									      <input type="checkbox" value="1"><span>XS</span>
									   </label>
									</div>
									<div class="checkbox-btn">
									   <label>
									      <input type="checkbox" value="1"><span>S</span>
									   </label>
									</div>
									<div class="checkbox-btn">
									   <label>
									      <input type="checkbox" value="1"><span>M</span>
									   </label>
									</div>
									<div class="checkbox-btn">
									   <label>
									      <input type="checkbox" value="1"><span>L</span>
									   </label>
									</div>
									<div class="checkbox-btn">
									   <label>
									      <input type="checkbox" value="1"><span>XL</span>
									   </label>
									</div>
								</div>
							</div>

							<div class="filter__body__widget">
								<h4>Price Range</h4>
								<div id="slider-range"></div>
								<div class="d-flex justify-content-between">
									<span class="llimit">$1</span>
									<span class="ulimit">$100</span>
								</div>
							</div>

							<div class="filter__body__widget">
								<h4>Brands</h4>
								<div class="filter__brands">
									<label class="checkbox" for="checkbox1">
							            <input type="checkbox" value="" name="8" id="checkbox1" data-toggle="checkbox" class="custom-checkbox">
							            <span class="icons">
							            	<span class="icon-unchecked"></span>
							            	<span class="icon-checked"></span>
							            </span>
							            Adidas
							        </label>
							        <label class="checkbox" for="checkbox2">
							            <input type="checkbox" value="" name="1" id="checkbox2" data-toggle="checkbox" class="custom-checkbox">
							            <span class="icons">
							            	<span class="icon-unchecked"></span>
							            	<span class="icon-checked"></span>
							            </span>
							            Speedx
							        </label>
							        <label class="checkbox" for="checkbox3">
							            <input type="checkbox" value="" name="2" id="checkbox3" data-toggle="checkbox" class="custom-checkbox">
							            <span class="icons">
							            	<span class="icon-unchecked"></span>
							            	<span class="icon-checked"></span>
							            </span>
							            Zelbury
							        </label>
							        <label class="checkbox" for="checkbox4">
							            <input type="checkbox" value="" name="3" id="checkbox4" data-toggle="checkbox" class="custom-checkbox">
							            <span class="icons">
							            	<span class="icon-unchecked"></span>
							            	<span class="icon-checked"></span>
							            </span>
							            Gul Ahmed
							        </label>
							        <label class="checkbox" for="checkbox5">
							            <input type="checkbox" value="" name="4" id="checkbox5" data-toggle="checkbox" class="custom-checkbox">
							            <span class="icons">
							            	<span class="icon-unchecked"></span>
							            	<span class="icon-checked"></span>
							            </span>
							            Cheetah
							        </label>
								</div>
							</div>

						</div>
						<div class="filter__header shadow">
							<div class="d-flex justify-content-between align-items-center">
								<button class="btn btn-small btn-pink">Filter</button>
								<a @click="resetProducts()" href="#">
									<span><i class="fas fa-times"></i> Clear All</span>
								</a> 
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-9 results">
					<div class="row">

						<div v-for="product in products" class="col-md-4">
							<div class="product shadow mb-4">
								<img class="img-fluid w-75 mt-4" :src=" '/images/products/' + product.thumbnail">
								<div class="product__body mt-4 mb-4">
									<h4 class="product__title">{{ product.name }}</h4>
									<h5 class="product__price">${{ product.price }}</h5>
								</div>
								<div class="product__overlay">
									<a href="#"><i class="far fa-heart"></i></a>
									<router-link class="btn btn-small btn-pink mt-2" :to="{ name: 'product', params: { 'id' : product.product_id } }">View</router-link>
									<!-- <button class="btn btn-small btn-pink mt-2">Buy Now</button> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row mt-1">
				<div class="col-md-12">
					<div class="filter__pagination p-4 text-center">
						<button v-if="loadMore" @click="loadMoreProducts()" class="btn btn-pink btn-small w-25">Load More</button>
					</div>
				</div>
			</div>

			<!-- Big Banner -->
			<div class="row m-1 mb-3">
				<div class="col-md-12">
					<div class="big-banner">
						<div class="big-banner__content">
							<h1>Converse</h1>
							<p>Explore styles tough enough to handle all your workouts</p>
							<a href="#" class="btn btn-light btn-big">Shop Brand</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="footer">
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
	</div>
</template>

<script>
import ShoppingCart from './ShoppingCart.vue'
import TopBar from './partials/TopBar.vue'
export default {
	components: {
		TopBar,
		ShoppingCart
	},

	data() {
		return {
			headerName: '',

			departments: [],
			categories: [],
			products: [],

			// Query
			department_id: 0,
			category_id: 0,
			page: 1,

			filterByProducts: true,
			filterByDepartment: false,
			filterByCategory: false,

			searchTerm: '',

			// Load More Btn
			loadMore: true,
		}
	},

	mounted() {

		this.fetchDepartments();
		this.fetchCategories("Regional", 1);

		if( this.$route.query.search ) {

			// Fetch Products by Category
			if( this.$route.query.category ) {
				this.category_id = this.$route.query.category;
				this.fetchProducts(this.$route.query.category);
			}

			// Fetch Products by Department
			if( this.$route.query.department ) {
				this.department_id = this.$route.query.department;
				this.fetchDeptartmentProducts(this.$route.query.department);
			}

		} else {
			this.fetchAllProducts();
		}

	},

	watch: {
		searchTerm() {
			if( this.searchTerm.length == 0 ) {
				this.resetProducts();
			}
		}
	},

	methods: {

		async fetchDepartments() {
			await axios.get('/departments')
			.then( (response) => {
				let { data } = response;
				this.departments = data;
			});
		},

		async fetchCategories(name, id) {
			await axios.get(`/categories/inDepartment/${id}`)
			.then( (response) => {
				let { rows } = response.data;
				this.headerName = name;
				this.categories = rows;
			});
		},

		async fetchDeptartmentProducts() {
			await axios.get(`/products/inDepartment/${this.department_id}?limit=6`)
			.then( (response) => {
				let { rows } = response.data;
				this.products = rows;

				this.filterByDepartment = true;
				this.filterByProducts = false;
				this.filterByCategory = false;
			})
		},

		async fetchAllProducts() {
			await axios.get(`/products?limit=6`)
			.then( (response) => {
				console.log(response);
				let { rows } = response.data;
				this.products = rows;

				this.page = 1;
				this.loadMore = true;

				this.filterByDepartment = false;
				this.filterByProducts = true;
				this.filterByCategory = false;
			});
		},

		async fetchProducts(id) {
			await axios.get(`/products/inCategory/${id}?limit=6`)
			.then( (response) => {
				console.log(response);
				let { rows } = response.data;
				this.category_id = id;
				this.products = rows;

				this.page = 1;
				this.loadMore = true;

				this.filterByDepartment = false;
				this.filterByProducts = false;
				this.filterByCategory = true;
				
				this.goToResults();
			});
		},

		async searchProducts() {

			await axios.get(`/products/search?query_string=${this.searchTerm}`)
			.then( (response) => {
				let { rows } = response.data;
				this.products = rows;
			})
			.catch( (error) => {
				console.log(error.response.data);
			});
		},

		async loadMoreProducts() {
			
			this.page += 1;

			let url = '';

			if( this.filterByProducts ) {
				url = `/products?limit=6&page=${this.page}`;
			}

			if( this.filterByDepartment ) {
				url = `/products/inDepartment/${this.department_id}?limit=6&page=${this.page}`;
			}

			if( this.filterByCategory ) {
				url = `/products/inCategory/${this.category_id}?limit=6&page=${this.page}`
			}

			await axios.get(url)
			.then( (response) => {
				let { rows } = response.data;

				if(rows.length > 0) {
					for(var i = 0; i < rows.length; i++) {
						this.products.push(rows[i]);
					}
				} else {
					this.loadMore = false;
				}	
			});
		},

		// Helper
		goToResults() {
	       var el = this.$el.getElementsByClassName("results")[0];
	       el.scrollIntoView();
	    },

	    resetProducts() {
	    	this.fetchAllProducts();
	    }
	}
}
</script>