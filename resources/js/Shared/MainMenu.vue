<template>
  <div>
    <div class="mb-4">
      <Link class="group flex items-center py-3" :href="route('admin.home')">
        <i
          class="fa-solid fa-gauge mr-2 group-hover:text-sky-500"
          :class="{
            'dark:text-slate-300 ':
              !this.$page.component.startsWith('Admin/Dashboard'),
            'text-sky-500 ': this.$page.component.startsWith('Admin/Dashboard'),
          }"
        ></i>
        <div
          class="group-hover:text-sky-500"
          :class="{
            'dark:text-slate-300 ':
              !this.$page.component.startsWith('Admin/Dashboard'),
            'text-sky-500  ':
              this.$page.component.startsWith('Admin/Dashboard'),
          }"
        >
          Dashboard
        </div>
      </Link>
    </div>
    <div class="mb-4">
      <Link
        class="group flex items-center py-3"
        :href="route('admin.teachers.index')"
      >
        <i
          class="fas fa-chalkboard-teacher mr-2 group-hover:text-sky-500"
          :class="{
            'dark:text-slate-300 ':
              !this.$page.component.startsWith('Admin/Teachers'),
            'text-sky-500 ': this.$page.component.startsWith('Admin/Teachers'),
          }"
        ></i>
        <div
          class="group-hover:text-sky-500"
          :class="{
            'dark:text-slate-300 ':
              !this.$page.component.startsWith('Admin/Teachers'),
            'text-sky-500 ': this.$page.component.startsWith('Admin/Teachers'),
          }"
        >
          Teachers
        </div>
      </Link>
    </div>

    <div class="mb-4">
      <Link
        class="group flex items-center py-3"
        :href="route('admin.students.index')"
      >
        <i
          class="fas fa-user-graduate mr-2 group-hover:text-sky-500"
          :class="{
            'dark:text-slate-300 ':
              !this.$page.component.startsWith('Admin/Students'),
            'text-sky-500 ': this.$page.component.startsWith('Admin/Students'),
          }"
        ></i>
        <div
          class="group-hover:text-sky-500"
          :class="{
            'dark:text-slate-300 ':
              !this.$page.component.startsWith('Admin/Students'),
            'text-sky-500 ': this.$page.component.startsWith('Admin/Students'),
          }"
        >
          Students
        </div>
      </Link>
    </div>
    <div class="mb-4">
      <Link
        class="group flex items-center py-3"
        :href="route('admin.courses.index')"
      >
        <i
          class="fas fa-book mr-2 group-hover:text-sky-500"
          :class="{
            'dark:text-slate-300 ':
              !this.$page.component.startsWith('Admin/Courses'),
            'text-sky-500 ': this.$page.component.startsWith('Admin/Courses'),
          }"
        ></i>
        <div
          class="group-hover:text-sky-500"
          :class="{
            'dark:text-slate-300 ':
              !this.$page.component.startsWith('Admin/Courses'),
            'text-sky-500 ': this.$page.component.startsWith('Admin/Courses'),
          }"
        >
          Courses
        </div>
      </Link>
    </div>
    <div class="mb-4">
      <Link
        class="group flex items-center py-3"
        :href="route('admin.departments.index')"
      >
        <i
          class="fas fa-building mr-2 group-hover:text-sky-500"
          :class="{
            'dark:text-slate-300 ':
              !this.$page.component.startsWith('Admin/Departments'),
            'text-sky-500 ':
              this.$page.component.startsWith('Admin/Departments'),
          }"
        ></i>
        <div
          class="group-hover:text-sky-500"
          :class="{
            'dark:text-slate-300 ':
              !this.$page.component.startsWith('Admin/Departments'),
            'text-sky-500 ':
              this.$page.component.startsWith('Admin/Departments'),
          }"
        >
          Departments
        </div>
      </Link>
    </div>
    <div class="mb-4">
      <Link
        class="group flex items-center py-3"
        :href="route('admin.classrooms.index')"
      >
        <i
          class="fa-solid fa-people-roof mr-2 group-hover:text-sky-500"
          :class="{
            'dark:text-slate-300 ':
              !this.$page.component.startsWith('Admin/Classrooms'),
            'text-sky-500 ':
              this.$page.component.startsWith('Admin/Classrooms'),
          }"
        ></i>
        <div
          class="group-hover:text-sky-500"
          :class="{
            'dark:text-slate-300 ':
              !this.$page.component.startsWith('Admin/Classrooms'),
            'text-sky-500 ':
              this.$page.component.startsWith('Admin/Classrooms'),
          }"
        >
          Classrooms
        </div>
      </Link>
    </div>
    <div class="mb-4">
      <Link
        class="group flex items-center py-3"
        :href="route('admin.semesters.index')"
      >
        <i
          class="fa-solid fa-calendar-days mr-2 group-hover:text-sky-500"
          :class="{
            'dark:text-slate-300 ':
              !this.$page.component.startsWith('Admin/Semesters'),
            'text-sky-500 ': this.$page.component.startsWith('Admin/Semesters'),
          }"
        ></i>

        <div
          class="group-hover:text-sky-500"
          :class="{
            'dark:text-slate-300 ':
              !this.$page.component.startsWith('Admin/Semesters'),
            'text-sky-500  ':
              this.$page.component.startsWith('Admin/Semesters'),
          }"
        >
          Semesters
        </div>
      </Link>
    </div>
  </div>
</template>

<script >
import { Link } from "@inertiajs/inertia-vue3";
import Icon from "@/Shared/Icon";

export default {
  components: {
    Icon,
    Link,
  },
  data() {
    return {
      teacherUrl: "admin/teachers",
      adminUrl: "admin",
    };
  },
  methods: {
    urlCheck(url) {
      let currentUrl = this.$page.url.substr(1);
      return url === currentUrl;
    },
    isUrl(...urls) {
      let currentUrl = this.$page.url.substr(1);
      console.log(currentUrl);
      console.log(urls[0]);
      if (urls[0] === "") {
        return currentUrl === "";
      }
      return urls.filter((url) => currentUrl.startsWith(url)).length;
    },
  },
};
</script>
