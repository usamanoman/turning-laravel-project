<template>
	<div class="top-bar p-3 d-flex justify-content-between align-items-center">
    	<b v-if="!this.$store.getters.loggedIn" class="ml-5">Hi! <a href="#" @click="showLogin()">Sign In</a> or <a @click="showRegister()" href="#">Register</a> </b>
        <b v-if="this.$store.getters.loggedIn" class="ml-5">Hi! <a href="#">{{ this.$store.getters.customerName }}</a> | <a href="#" @click="logout()">Logout</a></b>

        <ul class="p-0 m-0 no-list">
        	<li><router-link :to="{ name: 'index' }">Home</router-link></li>
        	<li><router-link :to="{ name: 'category' }">Category</router-link></li>
            <li><a href="#">Daily Deals</a></li>
            <li><a href="#">Sell</a></li>
            <li><a href="#">Help & Contacts</a></li>
        </ul>
        <!-- <div>
            <b>$ USD</b>
        </div> -->
        <div class="mr-5 d-flex align-items-center">
            <span @click="showCart()" class="fa-layers fa-fw mr-2" style="font-size:25px;">
                <i class="fas fa-shopping-cart"></i>
            </span>
            <!-- <b>Your Cart: $100</b> -->
        </div>
	    <!-- Login Modal -->
		<LoginModal></LoginModal>
        <!-- Register Modal -->
        <RegisterModal></RegisterModal>
        <!-- Shopping Cart -->
        <ShoppingCart></ShoppingCart>
    </div>


</template>

<script>
import ShoppingCart from '../../components/ShoppingCart.vue'
import LoginModal from '../../components/LoginModal'
import RegisterModal from '../../components/RegisterModal'
export default {
	components: {
		LoginModal,
        RegisterModal,
        ShoppingCart
	},

	methods: {

		showLogin() {
			this.$modal.show('login')
		},

        showRegister() {
            this.$modal.show('register')
        },

        showCart() {
            this.$modal.show('shoppingcart');
        },

        logout() {
            this.$store.dispatch('logout');
        }
	}
}
</script>