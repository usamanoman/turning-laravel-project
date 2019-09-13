<template>
	<modal width="400" height="350" name="login">
		<div class="col-md-12 text-center">
		  	<h3 class="pb-2">Log In</h3>
		  	<div @click="dismiss()" v-if="errors.error" class="alert alert-danger" role="alert">
			  {{ errors.message }}
			</div>
		  	<label for="inputEmail" class="sr-only">Email address</label>
		  	<input type="email" id="inputEmail" v-model="login.email" class="form-control mb-3" placeholder="Email address" required="" autofocus="">
		  	<label for="inputPassword" class="sr-only">Password</label>
		  	<input type="password" id="inputPassword" v-model="login.password" class="form-control mb-4" placeholder="Password" required="">
		  	<button @click="submitForm()" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		</div>
	</modal>
</template>

<script>
export default {
	data() {
		return {
			login: {
				email: '',
				password: ''
			},

			errors: {
				error: false,
				message: ''
			}
		}
	},

	methods: {
		submitForm() {
			axios.post('/customers/login', this.login)
			.then( (response) => {
				let { accessToken, customer } = response.data;
				// console.log("SUCCESS", accessToken, customer);
				this.$store.commit('loginUser');
				this.$store.commit('setUserName', customer.name);
				localStorage.setItem('username', customer.name);
				localStorage.setItem('token', accessToken);
				this.$modal.hide('login');
			})
			.catch( (error) => {
				let payload = error.response.data.error;
				this.errors.error = true;
				this.errors.message = payload.message;
			});
		},

		dismiss() {
			this.errors = {
				error: false,
				message: ''
			};
		}
	}
}
</script>