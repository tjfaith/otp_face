<template>
  <div class="grid place-items-center h-screen  ">
      <snackbar baseSize="5rem" ref="snackbar" :holdTime="5000" position="top-center"/>
    <div id="app" class="web-camera-container">
      <div class="camera-button">
        <button
          v-if="!isCameraOpen"
          type="button"
          class="bg-tfa_primary text-white button is-rounded rounded-full h-24 w-24 flex items-center"
          :class="{ 'is-primary': !isCameraOpen, 'is-danger': isCameraOpen }"
          @click="toggleCamera"
        >
          Open Camera
          <!-- <span v-else>Close Camera</span> -->
        </button>
      </div>

      <div v-show="isCameraOpen && isLoading" class="camera-loading">
        <ul class="loader-circle">
          <li></li>
          <li></li>
          <li></li>
        </ul>
      </div>

      <div
        v-if="isCameraOpen"
        v-show="!isLoading"
        class="camera-box"
        :class="{ flash: isShotPhoto }"
      >
        <div class="camera-shutter" :class="{ flash: isShotPhoto }"></div>

        <div v-show="!isPhotoTaken" class="camera-container">
          <video
            id="video"
            v-show="!isPhotoTaken"
            ref="camera"
            :width="450"
            :height="337.5"
            autoplay
          ></video>
        </div>
        <canvas
          v-show="isPhotoTaken"
          class="camera-container"
          id="photoTaken"
          ref="canvas"
          :width="450"
          :height="337.5"
        ></canvas>
      </div>

      <div v-if="!isCameraOpen && errorMessage != ''">
        <h2 :class="message_text_color" class="errorMessage">
          {{ errorMessage }}
        </h2>
      </div>

      <div v-if="isCameraOpen && !isLoading" class="camera-shoot">
        <button
          :disabled="scaningImage"
          type="button"
          class="button"
          @click="takePhoto"
        >
          <img
            src="https://img.icons8.com/material-outlined/50/000000/camera--v2.png"
          />
        </button>
        <loader
          v-if="scaningImage"
          object="#7A60DB"
          color1="#2E1C88"
          color2="#5034BD"
          size="5"
          speed="2"
          bg="#343a40"
          objectbg="#999793"
          opacity="0"
          name="circular"
        ></loader>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Camera",
  components: {},
  data() {
    return {
      canvas: "",
      errorMessage: "",
      scaningImage: false,
      isCameraOpen: false,
      message_text_color: "text-red-500",
      isPhotoTaken: false,
      isShotPhoto: false,
      isLoading: false,
      link: "#",
    };
  },
  methods: {
    restCamera(){
      this.isCameraOpen = false;
        this.isPhotoTaken = false;
        this.isShotPhoto = false;
        this.stopCameraStream();
         this.errorMessage = "";
         this.message_text_color= "text-red-500"
         this.scaningImage = false;
    },
    toggleCamera() {
      if (this.isCameraOpen) {
        this.isCameraOpen = false;
        this.isPhotoTaken = false;
        this.isShotPhoto = false;
        this.stopCameraStream();
      } else {
        this.isCameraOpen = true;
        this.createCameraElement();
      }
    },

    createCameraElement() {
      this.isLoading = true;

      const constraints = (window.constraints = {
        audio: false,
        video: true,
      });

      navigator.mediaDevices
        .getUserMedia(constraints)
        .then((stream) => {
          this.isLoading = false;
          this.$refs.camera.srcObject = stream;
        })
        .catch((error) => {
          console.log(error);
          this.isLoading = false;
          alert("May the browser didn't support or there is some errors.");
        });
    },

    stopCameraStream() {
      let tracks = this.$refs.camera.srcObject.getTracks();

      tracks.forEach((track) => {
        track.stop();
      });
    },

    takePhoto() {
      if (!this.isPhotoTaken) {
        this.isShotPhoto = true;

        const FLASH_TIMEOUT = 50;

        setTimeout(() => {
          this.isShotPhoto = false;
        }, FLASH_TIMEOUT);
      }

      this.isPhotoTaken = !this.isPhotoTaken;

      const context = this.$refs.canvas.getContext("2d");
      context.drawImage(this.$refs.camera, 0, 0, 450, 337.5);
      this.downloadImage();
    },

    downloadImage() {
      this.scaningImage = true;
      //   const download = document.getElementById("downloadPhoto");
      this.canvas = document
        .getElementById("photoTaken")
        .toDataURL("image/jpeg")
        .replace("image/jpeg", "image/octet-stream");
      //   download.setAttribute("href", canvas);
      //   console.log(canvas)
      this.axios
        .post(this.$hostname + "api.php?action=detect_image", {
          image: this.canvas,
        })
        .then((response) => {
          this.scaningImage = false;
          if (response.data.Errors) {
            this.toggleCamera();
            this.errorMessage = response.data.Errors[0].Message;
          } else if (response.data.images) {
            if (Object.keys(response.data.images).length == 1) {
              // Enroll Image
              let userData = {
                email: this.$session.get("user_email"),
                webcamImage: this.canvas,
              };

              // CHECK IF IMAGE ALREADY EXIST
              this.axios
                .post(this.$hostname + "api.php?action=check_image", userData)
                .then((response) => {
                  this.scaningImage = false;
                  this.toggleCamera();
                  if (
                    response.data.images[0].transaction.message ==
                    "no match found"
                  ) {
                    // ENROLL IMAGE
                    this.axios
                      .post(
                        this.$hostname + "api.php?action=enroll_image",
                        userData
                      )
                      .then((response) => {
                        console.log(response)
                        if (response.data.images[0].transaction.status == "success") {
                          // SAVE IMAGE DATA TO MY DB
                          userData.face_id = response.data.face_id
                        this.axios.post(this.$hostname + "api.php?action=save_image", userData)
                .then((response) => {
                  if(response.data.response == 'saved'){
                          this.message_text_color = "text-green-500";
                          this.$refs.snackbar.info('successful');
                          this.errorMessage =
                            "Image Enrollment was successful. You would be redirected to Login";
                          this.scaningImage = false;
                          // this.restCamera();
                          this.isCameraOpen= false
                          this.$session.remove('user_email')
                          setTimeout(() => {
                            this.$router.push("/login");
                          }, 3500);
                  }
                          })
                      .catch((error) => {
                        this.scaningImage = false;
                        this.toggleCamera();
                        alert(error);
                      });

                        }
                      })
                      .catch((error) => {
                        this.scaningImage = false;
                        this.toggleCamera();
                        alert(error);
                      });
                  } else if (
                    response.data.images[0].transaction.status == "success"
                  ) {
                    this.scaningImage = false;
                    // this.toggleCamera()
                    this.errorMessage =
                      "Ops! user Image found, Login instead, or Open Camera to re scan image";
                  }
                })
                .catch((error) => {
                  this.scaningImage = false;
                  this.toggleCamera();
                  alert(error);
                });
            } else if (Object.keys(response.data.images).length > 1) {
              this.toggleCamera();
              this.errorMessage = "More than one face found, please re-cature";
            }
          } else {
            //   this.isCameraOpen =false
            this.toggleCamera();
            this.errorMessage = "An error occured, re-capture";
          }
        })
        .catch((error) => {
          this.scaningImage = false;
          this.toggleCamera();
          alert(error);
        });
    },
  },
  mounted() {
    this.isCameraOpen = true;
    this.createCameraElement();
  },
};
</script>

<style scoped>
.camera-container {
  display: block;
  position: relative;
  width: 350px;
  height: 350px;
  border-radius: 50%;
  -webkit-mask-image: -webkit-radial-gradient(circle, white 100%, black 100%);
}
#video,
#captureCanvas {
  width: 350px;
  height: 350px;
  object-fit: initial;
}

body {
  display: flex;
  justify-content: center;
}
.errorMessage {
  text-transform: uppercase;
  font-weight: bolder;
  text-align: center;
}
.web-camera-container {
  margin-top: 2rem;
  margin-bottom: 2rem;
  padding: 2rem;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  border-radius: 4px;
  width: 500px;
}
.web-camera-container .camera-button {
  margin-bottom: 2rem;
}
.web-camera-container .camera-box .camera-shutter {
  opacity: 0;
  width: 450px;
  height: 337.5px;
  background-color: #fff;
  position: absolute;
}
.web-camera-container .camera-box .camera-shutter.flash {
  opacity: 1;
}
.web-camera-container .camera-shoot {
  margin: 1rem 0;
}
.web-camera-container .camera-shoot button {
  height: 60px;
  width: 60px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 100%;
}
.web-camera-container .camera-shoot button img {
  height: 35px;
  object-fit: cover;
}
.web-camera-container .camera-loading {
  overflow: hidden;
  height: 100%;
  position: absolute;
  width: 100%;
  min-height: 150px;
  margin: 3rem 0 0 -1.2rem;
}
.web-camera-container .camera-loading ul {
  height: 100%;
  position: absolute;
  width: 100%;
  z-index: 999999;
  margin: 0;
}
.web-camera-container .camera-loading .loader-circle {
  display: block;
  height: 14px;
  margin: 0 auto;
  top: 50%;
  left: 100%;
  transform: translateY(-50%);
  transform: translateX(-50%);
  position: absolute;
  width: 100%;
  padding: 0;
}
.web-camera-container .camera-loading .loader-circle li {
  display: block;
  float: left;
  width: 10px;
  height: 10px;
  line-height: 10px;
  padding: 0;
  position: relative;
  margin: 0 0 0 4px;
  background: #999;
  animation: preload 1s infinite;
  top: -50%;
  border-radius: 100%;
}
.web-camera-container .camera-loading .loader-circle li:nth-child(2) {
  animation-delay: 0.2s;
}
.web-camera-container .camera-loading .loader-circle li:nth-child(3) {
  animation-delay: 0.4s;
}
@keyframes preload {
  0% {
    opacity: 1;
  }
  50% {
    opacity: 0.4;
  }
  100% {
    opacity: 1;
  }
}
</style>
