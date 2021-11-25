<template>
 <div> 
  <b-navbar toggleable="lg" type="dark"  class="z-10 fixed w-100  bg-transparent  px-10">
    <b-navbar-brand ><router-link to="/">
    <img class="w-14 h-14" src="@/assets/images/logo.png">
    </router-link>
    </b-navbar-brand>

    <b-navbar-toggle class="bg-tfa_primary" target="nav-collapse"></b-navbar-toggle>

    <b-collapse  id="nav-collapse" is-nav>
      <b-navbar-nav>
     
      </b-navbar-nav>

      <!-- Right aligned nav items -->
      <b-navbar-nav class="ml-auto lg:bg-opacity-0 bg-white p-3">
        <b-nav-item style="color:#2E1C88!important; " href="#">About</b-nav-item>
        <b-nav-item class="text-tfa_primary" href="#">Credit</b-nav-item>
        <b-nav-item class="text-tfa_primary" ><router-link to="/login">Login</router-link></b-nav-item>
        <b-nav-item class="text-white border-1 w-24 lg:w-full border-tfa_primary px-3 rounded-full"><router-link to="/register">Sign Up</router-link></b-nav-item>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</div>
</template>

<script>
export default {
  
}
</script>

<style scoped>
 .navbar-dark .navbar-nav .nav-link{
      color:#2E1C88!important;
      font-weight:bold
    }
</style>
