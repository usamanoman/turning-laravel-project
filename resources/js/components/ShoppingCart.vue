<template>
	<div>
		<modal @before-open="fetchCartItems()" width="1035" height="494" name="shoppingcart">
			<div class="checkout p-2">
				<div class="col-md-12 cart">
					<table class="table cart-table">
					  <thead>
					    <tr>
					      <th scope="col">Item</th>
					      <th scope="col">Attrs</th>
					      <th scope="col">Qty</th>
					      <th scope="col">Price</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr v-for="item in items">
					      <td>
					      	<div class="product__display d-flex align-items-center">
					      		<img class="img-fluid w-25 mr-3 border" :src=" '/images/products/' + item.image">
					      		<div class="product__info">
					      			<h5>{{ item.name }}</h5>
					      			<p>Men BK3569</p>
					      			<a @click="removeCartItem(item.item_id)" href="#">Remove</a>
					      		</div>
					      	</div>
					      </td>
					      <td>
					      	<p>{{ item.attributes }}</p>
					      </td>
					      <td class="">
					      	<div class="d-flex justify-content-center">
					      		<a href="#" @click="cartItemUpdate(item, 'sub')" class=" btn btn-pink btn-xsmall remove-qty mr-1"><i class="fas fa-minus"></i></a>
						      	<input @change="cartItemUpdate(item)" type="text" name="qty" v-model="item.quantity" class="form-control rounded-input w-25">
						      	<a href="#" @click="cartItemUpdate(item, 'add')" class="btn btn-pink btn-xsmall add-qty ml-1"><i class="fas fa-plus"></i></a>
					      	</div>
					      </td>
					      <td>${{ item.price }}</td>
					    </tr>
					  </tbody>
					</table>
				</div>
			</div>
			<div class="checkout__footer d-flex align-items-center justify-content-between p-3">
				<button @click="closeCart()" class="btn btn-light btn-small">Back to Shop</button>
				<router-link v-if="this.$store.getters.loggedIn" class="btn btn-pink btn-small" :to="{ name: 'checkout' }">Checkout</router-link>
			</div>
		</modal>
	</div>
</template>

<script>
export default {
	data() {
		return {
			items: []
		}
	},

	methods: {
		closeCart() {
			this.$modal.hide('shoppingcart');
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
			this.items = data;
		},

		async removeCartItem(id) {
			let { data } = await axios.delete(`/shoppingcart/removeProduct/${id}`, {
				headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                }
			});
			console.log(data.message);
			this.fetchCartItems();
		},

		async cartItemUpdate(item, action = null) {

			if( action == 'add') {
				item.quantity += 1;
			}

			if( action == 'sub') {
				item.quantity -= 1;
			}

			let { data } = await axios.put(`/shoppingcart/update/${item.item_id}`, {
				'quantity': item.quantity
			}, {
				headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                }
			});
		}

	}
}
</script>