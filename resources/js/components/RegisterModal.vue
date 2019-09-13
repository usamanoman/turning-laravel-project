<template>
	<modal width="400" height="350" name="register">
		<div class="col-md-12 text-center">
		  	<h3 class="pb-2">Register</h3>
		  	<div @click="dismiss()" v-if="errors.error" class="alert alert-danger" role="alert">
			  {{ errors.message }}
			</div>
		  	<label for="inputEmail" class="sr-only">Name</label>
		  	<input type="text" id="inputEmail" v-model="register.name" class="form-control mb-3" placeholder="Your Name" required="" autofocus="">
		  	<label for="inputEmail" class="sr-only">Email address</label>
		  	<input type="email" id="inputEmail" v-model="register.email" class="form-control mb-3" placeholder="Email address" required="" autofocus="">
		  	<label for="inputPassword" class="sr-only">Password</label>
		  	<input type="password" id="inputPassword" v-model="register.password" class="form-control mb-4" placeholder="Password" required="">
		  	<button @click="submitForm()" class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
		</div>
	</modal>
</template>

<script>
export default {
	data() {
		return {
			register: {
				name: '',
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
		async submitForm() {

			let { data } = await axios.post('/customers', this.register);

			if( data.customer !== null ) {
				await axios.post('/customers/login', this.register)
				.then( (response) => {
					let { accessToken, customer } = response.data;
					// console.log("SUCCESS", accessToken, customer);
					this.$store.commit('loginUser');
					this.$store.commit('setUserName', customer.name);
					localStorage.setItem('username', customer.name);
					localStorage.setItem('token', accessToken);
					this.$modal.hide('register');
				})
				.catch( (error) => {
					let payload = error.response.data.error;
					this.errors.error = true;
					this.errors.message = payload.message;
				});
			} else {
				alert("Registration Failed!");
			}

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