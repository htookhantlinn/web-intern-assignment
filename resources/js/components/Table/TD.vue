<template>
  <td class="border-t dark:border-t-0">
    <!-- route(link, data[`${showDetailId}`]) -->
    <Link :href="'#'">
      <span class="flex items-center px-6 py-4 focus:text-indigo-500">
        <span v-if="!showSkeleton" class="flex justify-center items-center">
          <span v-if="dataTarget === 'courses'">
            <span
              v-for="course in data[dataTarget]"
              :key="course"
              class="px-3 py-2 rounded-lg text-slate-800 mr-2"
              :class="getRandomClass(course.name)"
            >
              {{ course.name }}
            </span>
          </span>
          <span v-else>
            <span v-if="dataTarget === 'dob'">
              {{ getDate(data[dataTarget]) }}
            </span>
            <span v-else>
              {{ data[dataTarget] }}
            </span>
          </span>
        </span>
        <Skeletor width="75%" height="30" pill v-show="showSkeleton" />
      </span>
    </Link>
  </td>
</template>

<script>
import { ref } from "@vue/reactivity";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import icon from "@/Shared/Icon.vue";
import moment from "moment";
export default {
  props: ["data", "dataTarget", "link", "showDetailId"],
  components: {
    Link,
    icon,
  },
  setup() {
    let showSkeleton = ref(false);
    Inertia.on("start", () => (showSkeleton.value = true));

    Inertia.on("finish", () => (showSkeleton.value = false));

    let getDate = (date) => {
      return moment(String(date)).format("ll");
    };
    let getRandomClass = (course) => {
      switch (course) {
        case "Myanmar":
          return "bg-red-100";
        case "English":
          return "bg-sky-100";
        case "Math":
          return "bg-orange-100";
        case "Chemistry":
          return "bg-green-200";
        case "Physics":
          return "bg-violet-200";
        case "Bio":
          return "bg-lime-100";
        default:
          return "bg-Cyan-100";
      }
    };
    return { showSkeleton, getRandomClass, getDate };
  },
};
</script>

<style>
</style>