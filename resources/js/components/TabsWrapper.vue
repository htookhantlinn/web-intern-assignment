<template>
  <div class="tabs">
    <ul
      class="
        flex flex-wrap
        text-md
        font-semibold
        text-center text-gray-500
        border-none border-gray-200
        dark:border-gray-700 dark:text-gray-400
      "
    >
      <li
        v-for="tab in tabs"
        :key="tab"
        @click="changeSelectedTitleSlug(tab)"
        class="mr-3 inline-block py-4 px-10 hover:cursor-pointer"
        :class="{
          '   dark:text-white  border-b-2  border-b-slate-400    ':
            tab.props.slug === selectedTabTitleSlug,
        }"
      >
        {{ tab.props.title }}
      </li>
    </ul>
    <div
      class="flex justify-center items-center spinner-div"
      v-if="showSpinner"
    >
      <Spinner></Spinner>
    </div>
    <slot v-if="!showSpinner" />
  </div>
</template>

<script>
import Spinner from "./Spinner.vue";
import { ref } from "@vue/reactivity";
import { provide } from "@vue/runtime-core";
export default {
  components: { Spinner },
  props: ["selectedTabTitle", "selectedTabSlug"],
  emits: ["changeTab"],
  setup(props, { slots, emit }) {
    const tabs = ref(slots.default().map((tab) => tab));
    const selectedTabTitleSlug = ref();
    selectedTabTitleSlug.value = props.selectedTabSlug;
    let showSpinner = ref(false);

    provide("selectedTabTitleSlug", selectedTabTitleSlug);

    let changeSelectedTitleSlug = (tab) => {
      showSpinner.value = true;
      setTimeout(() => {
        showSpinner.value = false;
      }, 500);
      selectedTabTitleSlug.value = tab.props.slug;
      emit("changeTab", tab.props.slug);
    };
    return { selectedTabTitleSlug, changeSelectedTitleSlug, tabs, showSpinner };
  },
};
</script>

<style>
.spinner-div {
  height: 600px;
}
</style>