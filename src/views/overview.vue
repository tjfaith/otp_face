<template>
  <div class="mt-4">
    <!-- TOP ROW ============================================================== -->
    <div class="row my-3">
      <div class="col-12">
        <small><b>Admin</b></small>
      </div>
    </div>
    <div class="row connect m-2 d-flex flex-wrap">
      <div class="col-md-7 m-3">
        <h1 class="text-5xl">Hello {{userData[0].username.toUpperCase()}}!</h1>
        <p class="text-3xl">Welcome to your Two Factore Secured Administrative Portal</p>
        
      </div>
      <div class="col-md-3 d-none d-md-block m-0">
        <img src="@/assets/images/admin/manage.png" alt="" />
      </div>
    </div>

    <!-- BOTTOM ROW =========================================================== -->
    <div class="row mt-4" v-if="userData[0].userImage == ''">
      <!-- popular course -->
      <div class="col-lg-12 col-md-12 col-sm-12 my-2">
        <div class="p-4 popular_courses">
          <router-link to="/RegisterFace">
          <div
            
            class="sub_card mb-3 p-4 bg-white d-flex shadow-lg flex-row"
            
          >
          <h1 class="text-red-500">Oops! No face found, Enroll  by clicking here</h1>
            
            
          </div>
          </router-link>
        </div>
      </div>
    </div>

    <div class="row mt-4" v-else>
      <!-- popular course -->
      <div class="col-lg-12 col-md-12 col-sm-12 my-2">
        <div class="p-4 popular_courses">
          <div
            class="sub_card mb-3 p-4 bg-white d-flex flex-row"
            
          >
          <table class="table table-striped table-dark -w-full divide-y divide-gray-200">
  <thead class="" >
<tr>
      <th>ATTRIBUTE</th>
      <th>PROPERTY</th>
    </tr>
  </thead>
  <tbody  style="text-transform:UPPERCASE">
    <tr>
      <td>AGE</td>
      <td>{{userData[0].age}}</td>
    </tr>
     <tr>
      <td>ASIAN</td>
      <td>{{userData[0].asian}}</td>
    </tr>
    <tr>
      <td>black</td>
      <td>{{userData[0].black}}</td>
    </tr>
    <tr>
      <td>femaleConfidence</td>
      <td>{{userData[0].femaleConfidence}}</td>
    </tr>
    <tr>
      <td>maleConfidence</td>
      <td>{{userData[0].maleConfidence}}</td>
    </tr>
    <tr>
      <td>type</td>
      <td>{{userData[0].type}}</td>
    </tr>
     <tr>
      <td>glasses</td>
      <td>{{userData[0].glasses}}</td>
    </tr>
     <tr>
      <td>hispanic</td>
      <td>{{userData[0].hispanic}}</td>
    </tr>
     <tr>
      <td>lips</td>
      <td>{{userData[0].lips}}</td>
    </tr>
     <tr>
      <td>white</td>
      <td>{{userData[0].white}}</td>
    </tr>
    
  </tbody>
</table>
          <!-- <h1>Your information from your facial look</h1><br>
            {{userData[0]}} -->

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
   props: {
    userData: {
      type: Array,
    },
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