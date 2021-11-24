<template>
  <div class="grid place-items-center h-screen">
    <form v-if="signUpSuccess == null" form @submit.prevent="userData" class="bg-white shadow-md rounded px-8 md:w-50 mx-4 mt-24 pt-6 pb-8">
      <div class="m-auto text-muted w-100 pb-2 " >Sign Up</div>
      <div class="mb-4">
        <label
          class="block text-gray-700 text-sm font-bold mb-2"
          for="username"
        >
          Username
        </label>
        <input
        v-model="registrationData.username"
        required
        @keyup="confirmUsername"
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
        <p class="mt-3 text-red-500 text-xs italic">{{checkUsername}}</p>

      </div>

      <div class="mb-6">
        <div class="flex flex-wrap justify-between">
        <div class="w-64">
          <label
            class="block text-gray-700 text-sm font-bold mb-2"
            for="password"
          >
             
            <span  :class="error_color">Password {{password_message}}</span> 
          </label>
          <input
        v-model="registrationData.password"
        required
        @keyup="confirm_password()"
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
        <div class="w-64">
          <label
            class="block text-gray-700 text-sm font-bold mb-2"
            for="password"
          >
            Confirm Password
          </label>
          <input
        v-model="registrationData.confirm_password"
        required
        @keyup="confirm_password()"
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
            id="c_password"
            type="password"
            placeholder="******************"
          />
        </div>
        </div>
        <p class="text-red-500 text-xs italic">Please choose a password. Your password should be at least SIX character long</p>
      </div>
      <div class="mb-6">
        <label
          class="block text-gray-700 text-sm font-bold mb-2"
          for="password"
        >
          Email
        </label>
        <input
        v-model="registrationData.email"
        required
        @keyup="confirmEmail"
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
          id="email"
          type="email"
          placeholder="example@host.com"
        />
        <p class="text-red-500 text-xs italic">{{checkEmail}}</p>

      </div>
      <div class="flex items-center justify-between">
        <input
        :disabled = disabledBTN
        type="submit"
        value="Sign Up"
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
     <div v-else-if="signUpSuccess == true" class="text-center">
      <span><b>Sign Up successful, Check your email for verification link</b> <br> 
      <br><b  class="text-red-500">Due to some reasons messages might enter SPAM folder, check there if you can't find link in mmain inbox</b>
      </span>
    </div>
  </div>
</template>
<script>
export default {
  name: "Register",
  data() {
    return {
      signUpSuccess:null,
      disabledBTN:true,
      checkUsername:null,
      checkEmail:null,
      error_color:"",
      password_message:'',
      showLoading: false,
      registrationData: {
        username: "",
        password: "",
        confirm_password: "",
        email: "",
      }, 
    };
  },
  methods: {
      validateForm(){
     if(this.checkUsername != null || this.checkEmail != null)
    {
      this.disabledBTN = true
    }else{
      this.disabledBTN = false

    }
  },

    userData() {
      this.showLoading = true;
      this.axios
        .post(this.$hostname + "api.php?action=register", this.registrationData)
        .then((response) => {
          console.log(response)
          this.showLoading = false;
          if (response.data.returnMsg == 1){
            this.signUpSuccess = true
          }else if(response.data.returnMsg == 0){
            this.signUpSuccess = false
          }
        })
        .catch((error) => {
          alert(error);
          this.showLoading = false;
        });
    },

    confirmUsername() {
      
      this.axios
        .post(this.$hostname + "api.php?action=checkUsername", {'username':this.registrationData.username})
        .then((response) => {
          if (response.data.response >= 1){
            this.checkUsername ="Username is taken, please use a diffrent username"
          }else if(response.data.response <= 0 ){
             this.checkUsername = null 

          } 
              this.validateForm()

        })
        .catch((error) => {
          alert(error);
        });
    },

    confirmEmail() {
      this.axios
        .post(this.$hostname + "api.php?action=checkEmail", {'email':this.registrationData.email})
        .then((response) => {
           if (response.data.response >= 1){
            this.checkEmail ="Email already exist, please use a diffrent email or login"
          }else if(response.data.response <= 0 ){
             this.checkEmail = null

          }
          this.validateForm()

        })
        .catch((error) => {
          alert(error);
        });
    },

    confirm_password(){
      if(this.registrationData.password != this.registrationData.confirm_password && this.registrationData.password != '' && this.registrationData.confirm_password != ''){
        this.password_message ='missmatch'
        this.error_color= 'text-red-500';
      }else if(this.registrationData.password == this.registrationData.confirm_password && this.registrationData.password != '' && this.registrationData.confirm_password != '')
      {
        this.password_message ='matched!'
        this.error_color= 'text-green-500';
      }
      if(this.registrationData.password == '' && this.registrationData.confirm_password == ''){
         this.password_message =''
        this.error_color= '';
      }
    }
  },

  created() {
    this.userData;
  },
};
</script>

<style scoped></style>
