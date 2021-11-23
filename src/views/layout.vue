<template>
  <div style="height:100vh">
    <app-header/>
    <div>
      <img class="w-9/12 -z-10 h-auto -left-5 top-0 absolute" src="@/assets/images/2FA1.png">
     <router-view/>
      <img class="w-64 -z-10 h-auto  right-0 bottom-0 absolute" src="@/assets/images/2FA2.png">
    </div>
  </div> 
</template>

<script>
export default {
  name: "Home",
  data() {
    return {
      
    };
  },
  methods: {
     face_auth(){
      this.showLoading = true
      this.axios.get(this.$hostname+"api.php?action=face_auth").then((response)=>{
                console.log(response.data) 
      }).catch(error=>{
        alert(error);
  
       });
    }
  },
  created() {},
};
</script>

<style scoped>

</style>
