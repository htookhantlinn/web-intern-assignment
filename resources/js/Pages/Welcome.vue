<template>
  <div>
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
    </TabsWrapper>
  </div>
</template>

<script setup>
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
const props = defineProps(["filters", "students"]);
let form = ref({
  tab: props.filters.tab ? props.filters.tab : "welcome",
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
</script>

<style>
</style>