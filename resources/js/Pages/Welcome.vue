<template>
  <div>
    <Head :title="'Welcome'" />
    <TabsWrapper @changeTab="tabChange" :selectedTabSlug="form.tab">
      <Tab :title="`Welcome`" :slug="'welcome'">
        <div class="flex h-96">
          <h1 class="text-5xl lg:text-9xl my-auto font-semibold mx-auto">
            Welcome
          </h1>
        </div>
      </Tab>
      <Tab :title="`Students`" :slug="'students'">
        <div class="rounded-md shadow overflow-x-auto mx-3">
          <table class="w-full whitespace-nowrap border-none">
            <THEAD :theads="theads" />
            <TBODY
              :data="getStudents"
              :link="'students'"
              :dataTargets="dataTargets"
              :showDetailId="'id'"
            />
          </table>
        </div>
        <Pagination class="mt-6 ml-6" :links="getStudentLinks"></Pagination>
      </Tab>
      <Tab :title="`Create Students`" :slug="'create-student'">
        <div class="flex items-center justify-center max-h-screen">
          <div
            class="px-8 py-6 mx-4 mt-4 text-left shadow-lg rounded-md max-w-3xl"
          >
            <FlashMessages></FlashMessages>
            <h3 class="text-2xl font-bold text-center">Student Form</h3>
            <form @submit.prevent="store">
              <Loading
                :active="studentForm.processing"
                :is-full-page="false"
                :color="'black'"
                :loader="'dots'"
              />
              <div class="grid grid-cols-2 gap-3">
                <div class="mt-4">
                  <label for="">Name</label>
                  <input
                    type="text"
                    class="my-input-text"
                    v-model="studentForm.name"
                    placeholder="Please Fill Name"
                  />
                  <span v-if="studentForm.errors.name" class="text-red-600 mt-6"
                    >*{{ studentForm.errors.name }}</span
                  >
                </div>
                <div class="mt-4">
                  <label for="">Email</label>
                  <input
                    type="email"
                    class="my-input-text"
                    v-model="studentForm.email"
                    placeholder="Please Fill Email"
                  />
                  <span
                    v-if="studentForm.errors.email"
                    class="text-red-600 mt-6"
                    >*{{ studentForm.errors.email }}</span
                  >
                </div>

                <div class="mt-4">
                  <label for="">Date of Birth</label>
                  <Datepicker
                    class="mt-3"
                    placeholder="Select Date of Birth"
                    autoApply
                    v-model="studentForm.dob"
                    :enableTimePicker="false"
                  ></Datepicker>
                  <span v-if="studentForm.errors.dob" class="text-red-600 mt-6"
                    >*{{ studentForm.errors.dob }}</span
                  >
                </div>
                <div class="mt-4">
                  <label for="">NRC</label>
                  <input
                    type="text"
                    class="my-input-text"
                    v-model="studentForm.nrc"
                    placeholder="Please Fill NRC"
                  />
                  <span v-if="studentForm.errors.nrc" class="text-red-600 mt-6"
                    >*{{ studentForm.errors.nrc }}</span
                  >
                </div>
                <div class="mt-4 col-span-2">
                  <label for="" class="block">Courses</label>
                  <div
                    class="
                      inline-block
                      px-3
                      py-1
                      rounded-full
                      m-2
                      my-2
                      cursor-pointer
                    "
                    :class="getClass(course)"
                    v-for="course in courses"
                    :key="course"
                    @click="chooseCourse(course.id)"
                  >
                    {{ course.name }}
                    <i :class="getIconClass(course)"></i>
                  </div>
                  <span
                    v-if="studentForm.errors.courses"
                    class="text-red-600 mt-6 block"
                    >*{{ studentForm.errors.courses }}</span
                  >
                </div>
                <div class="mt-4">
                  <label for="">Gender</label>
                  <div class="mt-2 px-3">
                    <input
                      type="radio"
                      name="gender"
                      value="Male"
                      class="mr-2 my-radio"
                      v-model="studentForm.gender"
                    />Male

                    <input
                      type="radio"
                      name="gender"
                      value="Female"
                      class="mr-2 ml-3 my-radio"
                      v-model="studentForm.gender"
                    />Female
                  </div>
                  <span
                    v-if="studentForm.errors.gender"
                    class="text-red-600 mt-6"
                    >*{{ studentForm.errors.gender }}</span
                  >
                </div>
              </div>
              <div class="mt-4">
                <button
                  class="px-3 py-2 bg-blue-600 text-white rounded-md w-full"
                >
                  Register
                </button>
              </div>
            </form>
          </div>
        </div>
      </Tab>
    </TabsWrapper>
  </div>
</template>

<script setup>
import FlashMessages from "../Shared/FlashMessages.vue";
import THEAD from "../components/Table/THEAD.vue";
import TBODY from "../components/Table/TBODY.vue";
import reset from "../composables/resetUrl";
import { Head } from "@inertiajs/inertia-vue3";
import { ref } from "@vue/reactivity";
import Tab from "../components/Tab.vue";
import TabsWrapper from "../components/TabsWrapper.vue";
import { computed, watch } from "@vue/runtime-core";
import { Inertia } from "@inertiajs/inertia";
import _ from "lodash";
import Pagination from "../components/Pagination.vue";
const props = defineProps(["filters", "students", "courses"]);
let form = ref({
  tab: props.filters.tab ? props.filters.tab : "welcome",
});
let getTabProps = computed(() => {
  return props.filters.tab;
});
let studentForm = Inertia.form({
  name: null,
  email: null,
  gender: null,
  nrc: null,
  dob: null,
  courses: [],
});
let theads = ref(["Name", "email", "DOB", "gender", "NRC", "courses"]);
let dataTargets = ref(["name", "email", "dob", "gender", "nrc", "courses"]);
watch(
  form,
  _.throttle(() => {
    Inertia.get(route("students"), _.pickBy(form.value), {
      preserveState: true,
      onSuccess: () => {},
    });
  }, 150),
  {
    deep: true,
  }
);
let getStudents = computed(() => {
  return props.students.data;
});
let getStudentLinks = computed(() => {
  return props.students.meta.links;
});
let tabChange = (title) => {
  form.value.tab = title;
  reset(form);
};
let chooseCourse = (courseId) => {
  if (!studentForm.courses.includes(+courseId)) {
    studentForm.courses.push(courseId);
  } else {
    const index = studentForm.courses.indexOf(courseId);
    studentForm.courses.splice(index, 1);
  }
};
let getClass = (course) => {
  if (studentForm.courses.includes(+course.id)) {
    return "bg-green-200 text-slate-800  ";
  } else {
    return "bg-slate-500 text-white";
  }
};
let getIconClass = (course) => {
  if (studentForm.courses.includes(+course.id)) {
    return "fa fa-check ";
  }
};
let store = () => {
  studentForm.post("/students", {
    preserveScroll: true,
    onSuccess: () =>
      studentForm.reset("name", "email", "gender", "nrc", "dob", "courses"),
  });
};
</script>

<style>
</style>