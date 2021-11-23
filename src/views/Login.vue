<template>
<div class="grid place-items-center h-screen">
   <form  form @submit.prevent="login" class="bg-white shadow-md rounded px-8 w-50 pt-6 pb-8">
      <div class="m-auto text-muted w-100 pb-2 " >Login</div>
      <div class="mb-4">
        <label
          class="block text-gray-700 text-sm font-bold mb-2"
          for="username"
        >
          Username
        </label>
        <input
        v-model="loginData.username"
        required
          class="
            shadow-sm
            appearance-none
            border
            rounded
            w-full
            py-2
            px-3
            text-gray-700
            leading-tight
            focus:outline-none focus:shadow-outline
          "
          id="username"
          type="text"
          placeholder="Username"
        />
      </div>

      <div class="mb-6">
        <div class="w-100">
          <label
            class="block text-gray-700 text-sm font-bold mb-2"
            for="password"
          >
          </label>
          <input
        v-model="loginData.password"
        required
        minlength="6"
            class="
              shadow-sm
              appearance-none
              border border-red-500
              rounded
              w-full
              py-2
              px-3
              text-gray-700
              mb-3
              leading-tight
              focus:outline-none focus:shadow-outline
            "
            id="password"
            type="password"
            placeholder="******************"
          />
        </div>
            <span class="text-red-500">{{login_response}}</span> 

      </div>
	<div class="text-center w-full"><b>OR</b></div>

      <div class="flex items-center justify-between">
        <input
        type="submit"
        value="Login"
          class="
          disabled:opacity-50
            bg-blue-500
            hover:bg-blue-700
            text-white
            font-bold
            py-2
            px-4
            rounded
            
          "
        >
          
          <loader v-if="showLoading" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="dots"></loader>
     
      </div>
    </form>
	</div>
</template>

<script>

export default {
  name: 'Login',
  data() {
	return {
		login_response:'',
		showLoading:false,
		loginData:{
			username:'',
			password:'',
		}
	}
  },
  methods:{
	login(){
		this.showLoading = true;
      this.axios
        .post(this.$hostname + "api.php?action=login", this.loginData)
        .then((response) => {
          console.log(response)
          this.showLoading = false;
        if(response.data.response === 1){
			this.$router.push('/dashboard')
		}else if(response.data.response === 0){
			this.login_response ="Record not found or incorrect username and password"
		}
        })
        .catch((error) => {
          alert(error);
          this.showLoading = false;
        });
	}
  }
  
}
</script>

<style  scoped>
body{
    background: url("../assets/images/5copy.jpg") no-repeat;

}
</style>
