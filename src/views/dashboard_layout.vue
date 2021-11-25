<template>
  <div class="container-fluid">
    <div class="row">
      <!-- Side bar -->
      <div class="col-md-4 col-lg-2 bg-white" >
        <div
          :class="{ toggleSideBar: defaultStyle, toggleSideBar2: closeBar }"
          class="text-center sidebar bg-white px-3"
        >
          <div class="mb-4 ">
            <img class="d-none d-md-block w-14 h-14" src="@/assets/images/logo.png" />
              <div
              class="profile mx-3 d-block d-md-none"
              :style="{ backgroundImage: `url('${userData[0].userImage}')` }"
            ></div>
          </div>

          <ul class="d-flex flex-column list-unstyled" style="height: 84vh">
            <li @click="closeSidebarOnClick">
              <router-link
                to="/dashboard"
                active-class="active"
                class="d-flex text-decoration-none"
              >
                <div class="w-25">
                  <svg
                    width="21"
                    height="21"
                    viewBox="0 0 21 21"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M3.03988 0.5H6.41988C7.82988 0.5 8.95988 1.65 8.95988 3.061V6.47C8.95988 7.89 7.82988 9.03 6.41988 9.03H3.03988C1.63988 9.03 0.499878 7.89 0.499878 6.47V3.061C0.499878 1.65 1.63988 0.5 3.03988 0.5ZM3.03988 11.9697H6.41988C7.82988 11.9697 8.95988 13.1107 8.95988 14.5307V17.9397C8.95988 19.3497 7.82988 20.4997 6.41988 20.4997H3.03988C1.63988 20.4997 0.499878 19.3497 0.499878 17.9397V14.5307C0.499878 13.1107 1.63988 11.9697 3.03988 11.9697ZM17.96 0.5H14.58C13.17 0.5 12.04 1.65 12.04 3.061V6.47C12.04 7.89 13.17 9.03 14.58 9.03H17.96C19.36 9.03 20.5 7.89 20.5 6.47V3.061C20.5 1.65 19.36 0.5 17.96 0.5ZM14.58 11.9697H17.96C19.36 11.9697 20.5 13.1107 20.5 14.5307V17.9397C20.5 19.3497 19.36 20.4997 17.96 20.4997H14.58C13.17 20.4997 12.04 19.3497 12.04 17.9397V14.5307C12.04 13.1107 13.17 11.9697 14.58 11.9697Z"
                      class="fill"
                    />
                  </svg>
                </div>
                <div>Overview</div>
              </router-link>
            </li>

          
            <li @click="logOut()">
              <router-link
                to="/"
                class="d-flex text-decoration-none"
              >
               
                <div>LOG OUT</div>
              </router-link>
            </li>


           

          
            <li class="mt-auto" @click="closeSidebarOnClick">
              <router-link
                to="/admin/settings"
                class="d-flex text-decoration-none"
              >
                <div class="w-25">
                  <svg
                    width="24"
                    height="25"
                    viewBox="0 0 24 25"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M10.325 4.817C10.751 3.061 13.249 3.061 13.675 4.817C13.7389 5.0808 13.8642 5.32578 14.0407 5.532C14.2172 5.73822 14.4399 5.89985 14.6907 6.00375C14.9414 6.10764 15.2132 6.15085 15.4838 6.12987C15.7544 6.10889 16.0162 6.0243 16.248 5.883C17.791 4.943 19.558 6.709 18.618 8.253C18.4769 8.48466 18.3924 8.74634 18.3715 9.01677C18.3506 9.28721 18.3938 9.55877 18.4975 9.80938C18.6013 10.06 18.7627 10.2826 18.9687 10.4591C19.1747 10.6355 19.4194 10.7609 19.683 10.825C21.439 11.251 21.439 13.749 19.683 14.175C19.4192 14.2389 19.1742 14.3642 18.968 14.5407C18.7618 14.7172 18.6001 14.9399 18.4963 15.1907C18.3924 15.4414 18.3491 15.7132 18.3701 15.9838C18.3911 16.2544 18.4757 16.5162 18.617 16.748C19.557 18.291 17.791 20.058 16.247 19.118C16.0153 18.9769 15.7537 18.8924 15.4832 18.8715C15.2128 18.8506 14.9412 18.8938 14.6906 18.9975C14.44 19.1013 14.2174 19.2627 14.0409 19.4687C13.8645 19.6747 13.7391 19.9194 13.675 20.183C13.249 21.939 10.751 21.939 10.325 20.183C10.2611 19.9192 10.1358 19.6742 9.95929 19.468C9.7828 19.2618 9.56011 19.1001 9.30935 18.9963C9.05859 18.8924 8.78683 18.8491 8.51621 18.8701C8.24559 18.8911 7.98375 18.9757 7.752 19.117C6.209 20.057 4.442 18.291 5.382 16.747C5.5231 16.5153 5.60755 16.2537 5.62848 15.9832C5.64942 15.7128 5.60624 15.4412 5.50247 15.1906C5.3987 14.94 5.23726 14.7174 5.03127 14.5409C4.82529 14.3645 4.58056 14.2391 4.317 14.175C2.561 13.749 2.561 11.251 4.317 10.825C4.5808 10.7611 4.82578 10.6358 5.032 10.4593C5.23822 10.2828 5.39985 10.0601 5.50375 9.80935C5.60764 9.55859 5.65085 9.28683 5.62987 9.01621C5.60889 8.74559 5.5243 8.48375 5.383 8.252C4.443 6.709 6.209 4.942 7.753 5.882C8.753 6.49 10.049 5.952 10.325 4.817Z"
                      class="icon"
                      stroke-width="2.75"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M12 15.5C13.6569 15.5 15 14.1569 15 12.5C15 10.8431 13.6569 9.5 12 9.5C10.3431 9.5 9 10.8431 9 12.5C9 14.1569 10.3431 15.5 12 15.5Z"
                      class="icon"
                      stroke-width="2.75"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                </div>
                <div>Settings</div>
              </router-link>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-md-8 col-lg-10 p-4 float-right">
        <!-- header -->

        <!-- DESKTOP VIEW -->
        <div
          class="d-md-flex d-none justify-content-between align-items-center"
        >
          <div class="input-group search_bar w-50">
            <input
              type="search"
              id="form1"
              class="search_form form-control"
              placeholder="Search"
            />
            <button type="button" class="btn search_btn">
              <img src="@/assets/images/icon/search.png" />
            </button>
          </div>
          <div class="user_profile d-flex align-items-center">
            <img src="@/assets/images/icon/Notification.png" />
            <div
              class="profile mx-3"
              :style="{ backgroundImage: `url('${userData[0].userImage}')` }"
            ></div>
          </div>
        </div>

        <!-- MOBILE VIEW -->
        <div
          class="d-md-none d-flex justify-content-between align-items-center"
        >
          <img class="w-14 h-14" src="@/assets/images/logo.png" />

          <div
            @click="toggleSideBar"
            class="menuBtn d-flex flex-column align-items-end"
            style="z-index: 100"
          >
            <div
              :class="{ closeBar1: closeBar, defaultStyle1: defaultStyle }"
              style="
                border-bottom: 1px solid black;
                width: 12px;
                margin-bottom: 5px;
              "
            ></div>
            <div
              :class="{ closeBar2: closeBar, defaultStyle2: defaultStyle }"
              style="
                border-bottom: 1px solid black;
                width: 24px;
                margin-bottom: 5px;
              "
            ></div>
            <div
              :class="{ closeBar3: closeBar, defaultStyle3: defaultStyle }"
              style="border-bottom: 1px solid black; width: 16px"
            ></div>
          </div>
          <!-- <i :class="{closeBar: closeBar}" class="fa fa-times"></i> -->
        </div>
        <div class="input-group w-100 mt-3 d-md-none">
          <button type="button" class="btn search_btn_mobile">
            <i class="fa fa-search"></i>
          </button>
          <input
            type="search"
            id="form1"
            class="search_form_mobile form-control"
            placeholder="Search"
          />
        </div>
        <!-- main content -->
        <div class="main_content">
          <router-view :userData=userData />
        </div>
      </div>
    </div>
  </div>
        <!-- // icon: require("@/assets/images/user/user_icon.jpeg"), -->

</template>

<script>
export default {
  data() {
    return {
      userData: {},
      closeBar: false,
      defaultStyle: true,
    };
  },
  methods: {
    toggleSideBar() {
      this.closeBar = !this.closeBar;
      this.defaultStyle = !this.defaultStyle;
    },
    closeSidebarOnClick() {
      if (this.closeBar == true) {
        this.closeBar = false;
        this.defaultStyle = true;
      }
    },
    getUserInfo(){
      if (this.$session.has('user_email')){

       this.axios
                .post(this.$hostname + "api.php?action=get_user_info", {userEmail: this.$session.get('user_email')}).then((response) => {
                    console.log(response)
                    this.userData = response.data
         }).catch((error) => {
                  this.scaningImage = false;
                  this.toggleCamera();
                  alert(error);
                });
      }else{
        this.$router.push('/')
      }

    },
    logOut(){
      this.$session.remove('user_email')
      window.location('/')
    }
  },
  created(){
    this.getUserInfo()
  }
};
</script>

<style scoped>
/* SIDE BAR MOBILE TOGGLE BUTTON ANIMATION  */
.defaultStyle1 {
  transition: all 0.3s ease-in-out;
  transform: translate(0%, 0%) rotate(0deg);
  width: 12px !important;
}
.defaultStyle2 {
  transition: all 0.3s ease-in-out;
  width: 24px !important;
  display: block;
}
.defaultStyle3 {
  transition: all 0.3s ease-in-out;
  transform: translate(0%, 0%) rotate(0deg);
  width: 16px !important;
}
.closeBar1 {
  transition: all 0.3s ease-in-out;
  position: absolute;
  transform: translate(50%, 50%) rotate(30deg);
  width: 26px !important;
}
.closeBar2 {
  width: 0px !important;
  transition: all 0.3s ease-in-out;
}
.closeBar3 {
  transition: all 0.3s ease-in-out;
  transform-origin: left;
  transform: translate(50%, 50%) rotate(-30deg);
  width: 26px !important;
}
.menuBtn {
  cursor: pointer;
} 

/* END OF SIDE BAR TOGGLE BOTTON */

.toggleSideBar {
  transition: all 0.3s ease-in-out;
  transform: translateX(-13rem);
}
.toggleSideBar2 {
  transition: all 0.3s ease-in-out;
  transform: translateX(0rem);
}

@media only screen and (min-width: 768px) {
  .sidebar {
    transform: translateX(0rem) !important;
  }
}
.sidebar {
  height: 100vh;
  padding: 3% 0% 0% 2%;
  position: fixed;
  width: 13rem;
  z-index: 99;
}
.sidebar .icon {
  margin-right: 20%;
  stroke: #0d41e1;
}
.sidebar .fill {
  margin-right: 20%;
  fill: #0d41e1;
}
.router-link-exact-active,
.router-link-active {
  background-color: #0d41e1;
  padding: 5%;
  border-radius: 10px;
  color: #fff;
}

/* This would change the fill or stroke of the sidebar icon for the current active page */
.router-link-exact-active .icon,
.router-link-active .icon {
  stroke: white;
}
.router-link-exact-active .fill,
.router-link-active .fill {
  fill: white;
}

.sidebar li {
  margin-bottom: 5%;
}
.sidebar a {
  padding: 5%;
  border-radius: 10px;
}
.sidebar a:hover {
  transition: all 1s;
  background-color: #d9d3f3;
  padding: 5%;
  border-radius: 10px;
  color: #fff;
}
.profile {
  width: 3rem;
  height: 3rem;
  border-radius: 100%;
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  box-shadow: 0px 5.36533px 10.7307px rgba(28, 37, 44, 0.08);
}
.search_btn,
.search_form {
  border: 0;
  background-color: #ebebf0;
  outline: none;
  box-shadow: none !important;
  color: #89898b;
}
.search_form:focus {
  background-color: #ebebf0;
}

.search_btn_mobile .fa {
  color: lightgray;
}
.search_btn_mobile,
.search_form_mobile {
  background-color: #fff;
  border-left: 1px solid lightgray;
  border-top: 1px solid lightgray;
  border-bottom: 1px solid lightgray;
  border-radius: 10px;
}
.search_form_mobile {
  border-right: 1px solid lightgray;
  border-top: 1px solid lightgray;
  border-bottom: 1px solid lightgray;
  background-color: #fff;
  box-shadow: none !important;
  color: lightgray;
  border-radius: 10px;
}
.search_form_mobile:focus {
  background-color: #fff;
  border-left: 0px;
  border-right: 1px solid lightgray;
  border-top: 1px solid lightgray;
  border-bottom: 1px solid lightgray;
}

.settings {
  position: relative;
  bottom: 0;
}
</style>