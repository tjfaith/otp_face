<template>
  <div class="mt-4">
    <!-- TOP ROW ============================================================== -->
    <div class="row my-3">
      <div class="col-12">
        <small><b>Analytic Overview</b></small>
      </div>
    </div>
    <div class="row connect m-2 d-flex flex-wrap">
      <div class="col-md-7 m-3">
        <h3>Connect and Manage Tutors and Students with Ease.</h3>
        <small>Manage group activities and courses all in one platform.</small>
        <div
          class="
            mt-4
            d-flex
            align-items-center
            justify-content-between
          "
        >
          <div class="d-flex align-items-center">
            <img style="width:30px" src="@/assets/images/icon/graduation.png" alt="" />
            <div class="mx-3">
              <p class="m-0 p-0"><b>Number of Students</b></p>
              <small>2343+</small>
            </div>
          </div>

          <div class="d-flex align-items-center">
            <img src="@/assets/images/icon/course_big.png" alt="" />
            <div class="mx-3">
              <p class="m-0 p-0"><b>Number of Courses</b></p>
              <small>123+</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 d-none d-md-block m-0">
        <img src="@/assets/images/admin/manage.png" alt="" />
      </div>
    </div>

    <!-- BOTTOM ROW =========================================================== -->
    <div class="row mt-4">
      <!-- popular course -->
      <div class="col-lg-4 col-md-12 col-sm-12 my-2">
        <div class="p-4 popular_courses">
          <div
            class="sub_card mb-3 p-4 bg-white d-flex flex-row"
            
          >
          <h1>Enroll New User</h1>
            
            
          </div>
        </div>
      </div>

      <!-- Mentors -->
      <div class="col-lg-4 col-md-12 col-sm-12 my-2 px-2">
        <div class="p-4 mentors">
          <h5>Mentors</h5>
          <div
            class="sub_card mb-3 p-4 bg-white d-flex"
            v-for="(mentor, index) in mentors"
            :key="index"
          >
            <div class="w-50 position-relative">
              <div
                class="iconImage position-absolute"
                :style="{ backgroundImage: `url('${mentor.mentor_icon}')` }"
              ></div>
            </div>
            <div class="w-100">
              <p class="m-0">
                <b>{{ mentor.mentor_name }}</b>
              </p>
              <small>{{ mentor.total_courses }} Course</small>
            </div>
          </div>
          <h6 class="see_more"><a href="#">See more</a></h6>
        </div>
      </div>

      <!-- Active Group -->
      <div class="col-lg-4 col-md-12 col-sm-12 my-2">
        <div class="p-4 active_group">
          <h5>Active Groups</h5>
          <div
            class="sub_card mb-3 bg-white d-flex"
            style="padding: 25px"
            v-for="(activeGroup, index) in activeGroups"
            :key="index"
          >
            <div class="d-flex position-relative w-50">
              <div
                v-for="(member_icon, index) in activeGroup.recent_icon"
                :key="index"
                class="iconImage position-absolute"
                :style="{
                  backgroundImage: `url('${member_icon.icon}')`,
                  left: index * 25 + 'px',
                }"
              ></div>
            </div>
            <div class="d-flex flex-column">
              <p class="m-0">
                <b>{{ activeGroup.group_title }}</b>
              </p>
              <small>{{ activeGroup.total_members }} Members</small>
            </div>
          </div>
          <h6 class="see_more"><a href="#">See more</a></h6>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      popularCourses: [
        {
          course_title: "Artificial Intelligence",
          total_student: "232",
          course_icon: require("@/assets/images/admin/ai.jpg"),
        },
        {
          course_title: "Programming",
          total_student: "322",
          course_icon: require("@/assets/images/admin/programming.jpg"),
        },
        {
          course_title: "Product Design",
          total_student: "503",
          course_icon: require("@/assets/images/admin/Product-Design.jpg"),
        },
      ],
      mentors: [
        {
          mentor_name: "Anita Johnson",
          total_courses: "2",
          mentor_icon: require("@/assets/images/admin/mentors/Anita.jpeg"),
        },
        {
          mentor_name: "Patricia Mason",
          total_courses: "4",
          mentor_icon: require("@/assets/images/admin/mentors/Patricia.jpeg"),
        },
        {
          mentor_name: "Angela Ighodaro",
          total_courses: "1",
          mentor_icon: require("@/assets/images/admin/mentors/Angela.jpeg"),
        },
      ],
      activeGroups: [
        {
          group_title: "Product Design",
          total_members: "2123",
          recent_icon: [
            {
              user_id: 1,
              icon: require("@/assets/images/admin/mentors/Anita.jpeg"),
            },
            {
              user_id: 1,
              icon: require("@/assets/images/admin/ai.jpg"),
            },
            {
              user_id: 1,
              icon: require("@/assets/images/admin/mentors/Angela.jpeg"),
            },
          ],
        },
        {
          group_title: "Programming",
          total_members: "2123",
          recent_icon: [
            {
              user_id: 1,
              icon: require("@/assets/images/admin/mentors/Anita.jpeg"),
            },
            {
              user_id: 1,
              icon: require("@/assets/images/admin/ai.jpg"),
            },
            {
              user_id: 1,
              icon: require("@/assets/images/admin/mentors/Angela.jpeg"),
            },
          ],
        },
        {
          group_title: "Marketing",
          total_members: "2123",
          recent_icon: [
            {
              user_id: 1,
              icon: require("@/assets/images/admin/mentors/Anita.jpeg"),
            },
            {
              user_id: 1,
              icon: require("@/assets/images/admin/ai.jpg"),
            },
            {
              user_id: 1,
              icon: require("@/assets/images/admin/mentors/Angela.jpeg"),
            },
          ],
        },
      ],
    };
  },
};
</script>

<style scoped>
.connect {
  box-shadow: -6px -6px 42px rgba(240, 240, 240, 0.9),
    4px 4px 10px rgba(240, 240, 240, 0.9);
  border-radius: 20px;
}
.connect h3 {
  color: #474964;
}

/* LOWER ROW */
.sub_card {
  border-radius: 16.0595px;
}
.popular_courses {
  background: #f4f2ff;
}
.popular_courses h5 {
  color: #7d69e9;
  text-align: center;
}

.iconImage {
  width: 50px;
  height: 50px;
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  border-radius: 81.9033px;
}

.popular_courses,
.mentors,
.active_group {
  border-radius: 16.0595px;
}
/* mentors */
.mentors {
  background-color: #ecfbff;
}
.mentors h5 {
  color: #0ba6d0;
  text-align: center;
}

.active_group {
  background-color: #feefd0;
}

.active_group h5 {
  color: #fa7a3f;
  text-align: center;
}

.see_more{
  padding: 0;
  margin: 0;
  text-align: right;
}
.see_more a{
  text-decoration: none;
}
</style>