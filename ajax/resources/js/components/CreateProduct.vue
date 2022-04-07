<template>
    <div class="container">
		<h3 class="text-center">Create product</h3>
		<div class="row">
			<div class="col-md-6">
				<form @submit.prevent="addProduct">
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" v-model="product.name">
					</div>
					<div class="form-group">
						<label>Description</label>
						<input type="text" class="form-control" v-model="product.description">
					</div>
					<button type="submit" class="btn btn-primary">Create</button>
				</form>
			</div>
		</div>
    </div>
</template>

<script>
    export default {
		data(){
			return{
				product: {}
			}
		},
		
		methods:{
			addProduct(){
				this.axios
					.post('http://127.0.0.1:8000/api/products', this.product)
					.then(response => {
						this.$router.push({name: 'home'})
					})
					.catch(err => console.log(err))
					.finally()
			}
		}
    }
</script>
