<template>
  <transition name="slide-fade">
    <div class="tab-content" v-show="slug === selectedTabTitleSlug">
      <slot />
    </div>
  </transition>
</template>

<script>
import Spinner from "./Spinner";
import { inject } from "@vue/runtime-core";
export default {
  components: { Spinner },
  props: ["title", "slug"],
  setup() {
    const selectedTabTitleSlug = inject("selectedTabTitleSlug");
    return {
      selectedTabTitleSlug,
    };
  },
};
</script>

<style>
.slide-fade-enter-active {
  transition: all 0.2s ease-out;
}

.slide-fade-leave-active {
  transition: all 0.2s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
  transform: translateX(20px);
  opacity: 0;
}
</style>