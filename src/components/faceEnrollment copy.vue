<template>
  <div>
    <div class="grid place-items-center h-screen">
      <p><strong></strong></p>
      <!-- Camera -->
      <div class="camera-container">
        <video id="video" autoplay="true"></video>
      </div>
      <!-- Take Photo Button -->
      <button
        @click="takeIage"
        id="capture"
        type="button"
        class="btn btn-outline-primary btn-lg"
      >
        Take Photo
      </button>

      <div class="camera-box">
        <div style="display: flex; justify-content: center">
          <img
            style="height: 25px"
            v-if="isCameraOpen"
            src="https://img.icons8.com/material-outlined/50/000000/camera--v2.png"
            class="button-img camera-shoot"
            @click="capture"
          />
          <div class="camera-button">
            <button
              type="button"
              class="button is-rounded cam-button"
              style="margin-left: 40%; background-color: white; border: 0px"
              @click="toggleCamera"
            >
              <span v-if="!isCameraOpen"
                ><img
                  style="height: 25px"
                  class="button-img"
                  src="https://img.icons8.com/material-outlined/50/000000/camera--v2.png"
              /></span>
              <span v-else
                ><img
                  style="height: 25px"
                  class="button-img"
                  src="https://img.icons8.com/material-outlined/50/000000/cancel.png"
              /></span>
            </button>
          </div>
        </div>
        <div style="height: 200px">
          <div v-if="isCameraOpen" class="camera-canvas">
            <video
              ref="camera"
              :width="canvasWidth"
              :height="canvasHeight"
              autoplay
            ></video>
            <canvas
              v-show="false"
              id="photoTaken"
              ref="canvas"
              :width="canvasWidth"
              :height="canvasHeight"
            ></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isCameraOpen: false,
      canvasHeight: 200,
      canvasWidth: 190,
      items: [],
    };
  },
  methods: {
    // Stream Camera To Video Element
    startCameraStream() {
      const constraints = (window.constraints = {
        audio: false,
        video: true,
      });
      navigator.mediaDevices
        .getUserMedia(constraints)
        .then((stream) => {
          this.$refs.camera.srcObject = stream;
        })
        .catch((error) => {
          alert("Browser doesn't support or there is some errors." + error);
        });
    },
    stopCameraStream() {
      let tracks = this.$refs.camera.srcObject.getTracks();
      tracks.forEach((track) => {
        track.stop();
      });
    },
    capture() {
      const FLASH_TIMEOUT = 50;
      let self = this;
      setTimeout(() => {
        const context = self.$refs.canvas.getContext("2d");
        context.drawImage(
          self.$refs.camera,
          0,
          0,
          self.canvasWidth,
          self.canvasHeight
        );
        const dataUrl = self.$refs.canvas
          .toDataURL("image/jpeg")
          .replace("image/jpeg", "image/octet-stream");
        self.addToPhotoGallery(dataUrl);
        self.uploadPhoto(dataUrl);
        self.isCameraOpen = false;
        self.stopCameraStream();
      }, FLASH_TIMEOUT);
    },
  },
  mounted() {
    this.startCameraStream();
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
.camera-box {
  border: 1px dashed #d6d6d6;
  border-radius: 4px;
  padding: 2px;
  width: 80%;
  min-height: 300px;
}
</style>
