<template>
  <div class="container-fluid">
    <div class="row">
      <!-- Side bar -->
      <div class="col-md-4 col-lg-2 bg-white" >
        <div
          :class="{ toggleSideBar: defaultStyle, toggleSideBar2: closeBar }"
          class="text-center sidebar bg-white px-3"
        >
          <div class="mb-4 d-none d-block d-md-block">
            <img class="w-14 h-14" src="@/assets/images/logo.png" />
          </div>

          <ul class="d-flex flex-column list-unstyled" style="height: 84vh">
            <li @click="closeSidebarOnClick">
              <router-link
                to="/admin"
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

            <li @click="closeSidebarOnClick">
              <router-link
                to="/admin/student"
                class="d-flex text-decoration-none"
              >
                <div class="w-25 text-left">
                  <svg
                    width="24"
                    height="18"
                    viewBox="0 0 24 18"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M22 6L12 2L2 6L12 10L22 6ZM22 6V12"
                      class="icon"
                      stroke-width="2.75"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M6 7.59961V12.9996C6 13.7953 6.63214 14.5583 7.75736 15.1209C8.88258 15.6835 10.4087 15.9996 12 15.9996C13.5913 15.9996 15.1174 15.6835 16.2426 15.1209C17.3679 14.5583 18 13.7953 18 12.9996V7.59961"
                      class="icon"
                      stroke-width="2.75"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                </div>
                <div>Student</div>
              </router-link>
            </li>

            <li @click="closeSidebarOnClick">
              <router-link
                to="/admin/content"
                class="d-flex text-decoration-none"
              >
                <div class="w-25">
                  <svg
                    width="18"
                    height="21"
                    viewBox="0 0 18 21"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M4.81 0.5H13.191C16.28 0.5 18 2.28 18 5.33V15.66C18 18.76 16.28 20.5 13.191 20.5H4.81C1.77 20.5 0 18.76 0 15.66V5.33C0 2.28 1.77 0.5 4.81 0.5ZM5.08 5.16V5.15H8.069C8.5 5.15 8.85 5.5 8.85 5.929C8.85 6.37 8.5 6.72 8.069 6.72H5.08C4.649 6.72 4.3 6.37 4.3 5.94C4.3 5.51 4.649 5.16 5.08 5.16ZM5.08 11.24H12.92C13.35 11.24 13.7 10.89 13.7 10.46C13.7 10.03 13.35 9.679 12.92 9.679H5.08C4.649 9.679 4.3 10.03 4.3 10.46C4.3 10.89 4.649 11.24 5.08 11.24ZM5.08 15.81H12.92C13.319 15.77 13.62 15.429 13.62 15.03C13.62 14.62 13.319 14.28 12.92 14.24H5.08C4.78 14.21 4.49 14.35 4.33 14.61C4.17 14.86 4.17 15.19 4.33 15.45C4.49 15.7 4.78 15.85 5.08 15.81Z"
                      class="fill"
                    />
                  </svg>
                </div>
                <div>Contents</div>
              </router-link>
            </li>

            <li @click="closeSidebarOnClick">
              <router-link
                to="/admin/courses"
                class="d-flex text-decoration-none"
              >
                <div class="w-25">
                  <svg
                    width="20"
                    height="21"
                    viewBox="0 0 20 21"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M8.70435 2.01898C8.03402 2.01898 7.46373 2.4848 7.30365 3.11265H12.6863C12.5263 2.4848 11.956 2.01898 11.2856 2.01898H8.70435ZM14.2071 3.11264H16.1881C18.2891 3.11264 20 4.84428 20 6.97085C20 6.97085 19.94 7.8711 19.92 9.12477C19.918 9.22401 19.8699 9.32122 19.7909 9.37996C19.3097 9.7354 18.8694 10.0291 18.8294 10.0493C17.1686 11.1632 15.2386 11.947 13.1826 12.3369C13.0485 12.3632 12.9165 12.2934 12.8484 12.1739C12.2721 11.1754 11.1956 10.5253 9.995 10.5253C8.8024 10.5253 7.71586 11.1683 7.12256 12.1678C7.05353 12.2853 6.92346 12.3531 6.7904 12.3278C4.75138 11.9369 2.82141 11.1541 1.17059 10.0594L0.210105 9.39109C0.130065 9.34046 0.08004 9.24932 0.08004 9.14806C0.050025 8.63161 0 6.97085 0 6.97085C0 4.84428 1.71086 3.11264 3.81191 3.11264H5.78289C5.97299 1.6443 7.2036 0.5 8.70435 0.5H11.2856C12.7864 0.5 14.017 1.6443 14.2071 3.11264ZM19.6598 11.3152L19.6198 11.3355C17.5988 12.6924 15.1676 13.5937 12.6163 13.9684C12.2561 14.019 11.8959 13.7861 11.7959 13.4216C11.5758 12.5912 10.8654 12.0443 10.015 12.0443H10.005H9.98499C9.13457 12.0443 8.42421 12.5912 8.2041 13.4216C8.10405 13.7861 7.74387 14.019 7.38369 13.9684C4.83242 13.5937 2.4012 12.6924 0.38019 11.3355C0.370185 11.3254 0.270135 11.2646 0.190095 11.3152C0.10005 11.3659 0.10005 11.4874 0.10005 11.4874L0.170085 16.6519C0.170085 18.7785 1.87094 20.5 3.97199 20.5H16.018C18.1191 20.5 19.8199 18.7785 19.8199 16.6519L19.9 11.4874C19.9 11.4874 19.9 11.3659 19.8099 11.3152C19.7599 11.2849 19.6999 11.295 19.6598 11.3152ZM10.7454 15.5583C10.7454 15.9836 10.4152 16.3177 9.995 16.3177C9.58479 16.3177 9.24462 15.9836 9.24462 15.5583V14.2519C9.24462 13.8367 9.58479 13.4924 9.995 13.4924C10.4152 13.4924 10.7454 13.8367 10.7454 14.2519V15.5583Z"
                      class="fill"
                    />
                  </svg>
                </div>
                <div>Courses</div>
              </router-link>
            </li>

            <li @click="closeSidebarOnClick">
              <router-link
                to="/admin/groups"
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
                      d="M9 11.5C11.2091 11.5 13 9.70914 13 7.5C13 5.29086 11.2091 3.5 9 3.5C6.79086 3.5 5 5.29086 5 7.5C5 9.70914 6.79086 11.5 9 11.5Z"
                      class="icon"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M3 21.5V19.5C3 18.4391 3.42143 17.4217 4.17157 16.6716C4.92172 15.9214 5.93913 15.5 7 15.5H11C12.0609 15.5 13.0783 15.9214 13.8284 16.6716C14.5786 17.4217 15 18.4391 15 19.5V21.5"
                      class="icon"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M16 3.63086C16.8604 3.85116 17.623 4.35156 18.1676 5.05317C18.7122 5.75478 19.0078 6.61769 19.0078 7.50586C19.0078 8.39403 18.7122 9.25694 18.1676 9.95855C17.623 10.6602 16.8604 11.1606 16 11.3809"
                      class="icon"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M21 21.5004V19.5004C20.9949 18.6175 20.6979 17.7612 20.1553 17.0648C19.6126 16.3684 18.8548 15.8711 18 15.6504"
                      class="icon"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                </div>
                <div>Groups</div>
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
              :style="{ backgroundImage: `url('${userData.icon}')` }"
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
          <router-view />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      userData: {
        icon: require("@/assets/images/user/user_icon.jpeg"),
      },
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
  },
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