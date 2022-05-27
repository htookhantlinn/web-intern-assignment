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
        <div class="search relative">
          <div
            class="
              flex
              absolute
              inset-y-0
              left-0
              items-center
              pl-7
              pointer-events-none
            "
          >
            <svg
              class="w-5 h-5 text-gray-500 dark:text-gray-400"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
              ></path>
            </svg>
          </div>
          <input
            type="search"
            class="
              w-full
              my-3
              border
              py-3
              max-w-3xl
              ml-3
              mr-3
              pl-10
              rounded-md
              px-3
              focus:outline-none focus:ring-1 focus:ring-blue-600
              text-md
              font-semibold
              text-lg
            "
            v-model="form.search"
            placeholder="Search With Name..."
          />
        </div>
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
                  <label for="">Gender</label>
                  <div class="mt-2 px-3">
                    <input
                      type="radio"
                      name="gender"
                      value="Male"
                      class="mr-2 mt-3 my-radio"
                      v-model="studentForm.gender"
                    />
                    Male
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
                <div class="mt-4 col-span-2">
                  <label for="">NRC</label>
                  <div class="flex">
                    <select
                      @change="changeDistrict"
                      class="
                        mr-1
                        block
                        mt-3
                        border
                        px-4
                        py-1
                        rounded-sm
                        focus:outline-none focus:ring-1 focus:ring-blue-600
                      "
                      v-model="nrc.district"
                    >
                      <option value=""></option>
                      <option v-for="n in 14" :key="n">{{ n }}</option>
                    </select>
                    <select
                      class="
                        mr-1
                        block
                        mt-3
                        border
                        px-4
                        py-1
                        rounded-sm
                        focus:outline-none focus:ring-1 focus:ring-blue-600
                      "
                      v-model="nrc.township"
                    >
                      <option value=""></option>
                      <option
                        :value="township.name_en"
                        v-for="township in townships"
                        :key="township"
                      >
                        {{ township.name_en }} ({{ township.name_mm }})
                      </option>
                    </select>
                    <select
                      class="
                        mr-1
                        block
                        mt-3
                        border
                        px-4
                        py-1
                        rounded-sm
                        focus:outline-none focus:ring-1 focus:ring-blue-600
                      "
                      v-model="nrc.type"
                    >
                      <option value="">select</option>
                      <option value="(N)">(N)</option>
                      <option value="(E)">(E)</option>
                      <option value="(P)">(P)</option>
                    </select>
                    <input
                      type="text"
                      class="my-input-text"
                      min="0"
                      minlength="6"
                      maxlength="6"
                      v-model="nrc.number"
                    />
                  </div>
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
import axios from "axios";

const props = defineProps(["filters", "students", "courses"]);
let form = ref({
  tab: props.filters.tab ? props.filters.tab : "welcome",
  search: props.filters.search,
});
let getTabProps = computed(() => {
  return props.filters.tab;
});
let nrc = ref({
  district: null,
  township: null,
  type: null,
  number: null,
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
let nrcs = ref(null);
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
let townships = ref();
let changeDistrict = (e) => {
  townships.value = nrcs.value.filter((n) => {
    return n.nrc_code === e.target.value ? n.name_en : "";
  });
  console.log(townships.value);
};
let store = () => {
  if (
    nrc.value.district !== null &&
    nrc.value.township !== null &&
    nrc.value.type !== null &&
    nrc.value.number !== null
  ) {
    studentForm.nrc = `${nrc.value.district}/${nrc.value.township}${nrc.value.type}${nrc.value.number}`;
  } else {
    studentForm.nrc = null;
  }
  console.log(studentForm.nrc);
  studentForm.post("/students", {
    preserveScroll: true,
    onSuccess: () =>
      studentForm.reset("name", "email", "gender", "nrc", "dob", "courses"),
  });
};

axios
  .get(
    "https://raw.githubusercontent.com/htetoozin/Myanmar-NRC/master/nrc.json"
  )
  .then(({ data }) => {
    nrcs.value = data.data;
  });
</script>

<style>
</style>