<template>
    <div class="container">
		<h3 class="text-center">Edit product</h3>
		<div class="row">
			<div class="col-md-6">
				<form @submit.prevent="updateProduct">
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" v-model="product.name">
					</div>
					<div class="form-group">
						<label>Description</label>
						<input type="text" class="form-control" v-model="product.description">
					</div>
					<button type="submit" class="btn btn-primary">Update</button>
				</form>
			</div>
		</div>
    </div>
</template>

<script>
    export default {
		data(){
			return{
				product:{}
			}
		},
		
		created(){
			this.axios
			.get(`http://127.0.0.1:8000/api/products/${this.$route.params.id}`)
			.then(response =>{
				this.product = response.data
			})
		},
		
		methods:{
			updateProduct(){
				this.axios
					.patch(`http://127.0.0.1:8000/api/products/${this.$route.params.id}`, this.product)
					.then(response => {
						this.$router.push({name:'home'})
					})
			}
		}
    }
</script>
