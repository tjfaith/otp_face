<template>
<div class="agile-login">
    <div class="wrapper">
      <h2>Sign Up</h2>
      <div class="w3ls-form">
        <form  @submit.prevent="userData" >
          <label>Username</label>
          <input
            type="text"
             v-model="registrationData.username"
            name="name"
            placeholder="Enter Username"
            required
          />
          <label>Password</label>
          <input
            type="password"
            name="password"
            v-model="registrationData.password"
            placeholder="Enter Password"
            required
          />
            <label>Reapeat Password</label>
          <input
            type="password2"
            name="password2"
            v-model="registrationData.password2"
            placeholder="Repeat Password"
            required
          />
          <!-- <label>Phone Number</label>
          <input
            type="text"
            name="phone"
            v-model="registrationData.telephone"
            maxlength="11"
            oninput="this.value=this.value.replace(/[^0-9]/g,''); "
            placeholder="Phone Number(11 digit only)"
            required
          /> -->
          <label>Email Address</label>
          <input
            type="email"
            name="email"
            v-model="registrationData.email"
            placeholder="Enter Email Address"
            required
          />

          <input type="submit"  name="register" value="Sign Up" />
          <loader v-if="showLoading" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="dots"></loader>
          <a href="/login" class="pass"><b>Login Here</b></a>
        </form>
      </div>

      <div class="agile-icons">
        <a href="#"><span class="fa fa-twitter" aria-hidden="true"></span></a>
        <a href="#"><span class="fa fa-facebook"></span></a>
        <a href="#"><span class="fa fa-pinterest-p"></span></a>
      </div>
    </div>
    <br />

  </div>    
</template>
<script>
export default {
  name: "reg1",
  data() {
    return {
      
    };
  },
  }
</script>
<style scoped>
</style>