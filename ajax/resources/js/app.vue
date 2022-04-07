<template>
	<div class="container">
		<nav class="navbar navbar-expand-lg bg-light">
			<div class="collapse navbar-collapse">
				<div class="navbar-nav">
					<router-link to="/products/create">pirma nuoroda</router-link>
					<router-link to="/products">pirma nuoroda</router-link>
				</div>
			</div>
		</nav>
		<router-view>
		</router-view>
	</div>
</template>

<script>
	export default{}
</script>