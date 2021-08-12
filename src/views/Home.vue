<template>
  <div class="agile-login">
		<h1>Winter Login Form</h1>
		<div class="wrapper">
			<h2>Sign In</h2>
			<div class="w3ls-form">
				<form action="" method="POST">
					<label>Username</label>
					<input type="text" name="name" placeholder="Username" required/>
					<label>Password</label>
					<input type="password" name="password" placeholder="Password" required />
					<a href="/register" class="pass"><b>Register Here</b></a>
					<input type="submit" name="button" value="Log In" />
				</form>
			</div>
			
			<div class="agile-icons">
				<a href="#"><span class="fa fa-twitter" aria-hidden="true"></span></a>
				<a href="#"><span class="fa fa-facebook"></span></a>
				<a href="#"><span class="fa fa-pinterest-p"></span></a>
			</div>
		</div>
		<br>
		<div class="copyright">
		<!-- <p>© 2017 Winter Login. All rights reserved | Design by <a> Springlight Technology</a></p>  -->
	</div>
	</div>
</template>

<script>

export default {
  name: 'Home',
  
}
</script>
