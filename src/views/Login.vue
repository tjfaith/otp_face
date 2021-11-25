<template>
  <div class="grid place-items-center h-screen">
    <snackbar baseSize="5rem" ref="snackbar" :holdTime="5000" position="top-center"/>
      <face-login :showing="showFaceModal" @close="showFaceModal=false"/>

    <form
      form
      @submit.prevent="login"
      class="bg-white shadow-md rounded mt-24 px-8 md:w-50 mx-4  pt-6 pb-8"
    >
      <div class="m-auto text-muted w-100 pb-2">Login</div>
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
          @keyup="resendEmail = false, login_response = ''"
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
        <span class="text-red-500">{{ login_response }}</span>
       <div class=" bg-red-500
            hover:bg-red-700
            text-white
            font-bold
            py-2
            px-4
            cursor-pointer
            rounded" @click="resendEmailLink()" v-if="resendEmail">Resend Verification</div>
      </div>

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
        />

        <loader
          v-if="showLoading"
          object="#ff9633"
          color1="#ffffff"
          color2="#17fd3d"
          size="5"
          speed="2"
          bg="#343a40"
          objectbg="#999793"
          opacity="80"
          name="dots"
        ></loader>
      </div>
      <div class="text-center w-full my-3"><b>OR</b></div>
      <div class="text-center  " @click="showFaceModal = true">
        <img class="m-auto cursor-pointer w-40 hover:shadow-lg  rounded" style="min-width:100px" src="@/assets/images/face.png" />
        <h3 class="text-muted"><b>USE FACE AUTHENTICATION</b></h3>
      </div>
    </form>
     
  </div>
</template>

<script>
export default {
  name: "Login",
  data() {
    return {
      userData:{},
      resendEmail:false,
      showFaceModal:false,
      login_response: "",
      showLoading: false,
      loginData: {
        username: "",
        password: "",
      },
    };
  },
  methods: {
    login() {
      this.showLoading = true;
      this.axios
        .post(this.$hostname + "api.php?action=login", this.loginData)
        .then((response) => {
          console.log(response);
          this.showLoading = false;
          if (response.data.response === 1) {
            this.$session.start()
                    this.$session.set('user_email', response.data.userData[0].email)
                    // this.$refs.snackbar.info('Login successful');
                        this.$router.push('/dashboard');
          } else if (response.data.response === 0) {
            this.login_response = "Record not found or incorrect username and password";
          }else if(response.data.response === 2){
            this.login_response = "Your email is not verified, check your mail for link ";
            this.userData = response.data.userData[0];
            this.resendEmail = true;
          }
        })
        .catch((error) => {
          alert(error);
          this.showLoading = false;
        });
    },
    resendEmailLink(){
      this.showLoading = true;
      console.log(this.userData)
      this.axios
        .post(this.$hostname + "api.php?action=resendOtp", this.userData)
        .then((response) => {
          this.showLoading = false;
          if (response.data.returnMsg == 1){
            this.resendEmail = false
            this.login_response =""
             this.$refs.snackbar.info('Email Sent!');
          }else if(response.data.returnMsg == 0){
            alert('Oops and error occured, please retry')
          }
        })
        .catch((error) => {
          alert(error);
          this.showLoading = false;
        });
    }
  },
  created(){
    this.$on('close', (data) => {
      console.log(data)
    })
  }
};
</script>

<style  scoped>
body {
  background: url("../assets/images/5copy.jpg") no-repeat;
}
</style>
