<template>
<div class="grid place-items-center h-screen  " >
      <snackbar baseSize="5rem" ref="snackbar" :holdTime="5000" position="top-center"/>
    <div v-if="otp_verification_fail == 1" class="text-center mt-32" >
      <span class="text-green-500"><b>EMAIL VERIFICATION SUCCESSFUL! PROCEED TO ENROLL YOUR FACE</b> <br> 
      
       <div class="text-center mt-8 ">
         <router-link to="/RegisterFace">
        <img class="m-auto w-25 cursor-pointer hover:shadow-lg  rounded" src="@/assets/images/face.png" />
        </router-link>
      </div>
      
      <!-- <router-link to="/login"><button class="mt-4 btn btn-success">Login</button></router-link> -->
      </span>
    </div>
    <div v-else class="text-center">
      <span class="text-red-500"><b>Sorry an error occured or invalid activation link</b> <br> <router-link to="/login"><button class="mt-4 btn btn-success">Login to get activation link</button></router-link></span>
    </div>
 <loader v-if="showLoading" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="dots"></loader>
      </div>
  
</template>
<script>
export default {
  name: "reg1",
  data() {
    return {
      otp_verification_fail:null,
      showLoading:false,
       registrationData: {
        telephone: "",
      },   
    };
  },
  methods: {
    otp_verification_mtd(){
      this.showLoading = true;
       this.axios
        .post(this.$hostname + "api.php?action=verify_email", {'otp':this.$route.params.id})
        .then((response) => {
          console.log(response)
          if (response.data.response === 1){
          console.log(response.data.response)
          this.$session.start()
          this.$session.set('user_email', response.data.userEmail[0].email)
          console.log(this.$session.get('user_email'))
            this.$refs.snackbar.info('Email Verification successful');
            this.otp_verification_fail = response.data.response
          }else{
            this.otp_verification_fail  = null
          }
          this.showLoading = false;  
        })
        .catch((error) => {
          alert(error);
          this.showLoading = false;
        });
    },
    userData() {
    }
  },
  mounted(){
    this.otp_verification_mtd();
  },
  }
</script>
<style scoped>
</style>