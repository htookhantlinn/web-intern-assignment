<template>
  <div v-if="links.length > 3">
    <div class="flex flex-wrap -mb-1">
      <template v-for="(link, key) in links">
        <div
          v-if="link.url === null"
          :key="key"
          class="
            mb-1
            mr-1
            px-4
            py-3
            text-gray-400 text-sm
            leading-4
            border
            rounded
            dark:text-white
          "
          v-html="link.label"
        />
        <Link
          v-else
          :key="`link-${key}`"
          class="
            mb-1
            mr-1
            px-4
            py-3
            focus:text-indigo-500
            text-sm
            dark:text-white
            leading-4
            hover:bg-slate-700 hover:text-white
            dark:hover:bg-white dark:hover:text-black
            border
            focus:border-indigo-500
            rounded
          "
          :class="{
            'bg-slate-700 text-white font-semibold dark:bg-white dark:text-red-500':
              link.active,
          }"
          :href="link.url"
          v-html="link.label"
        />
      </template>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
  components: {
    Link,
  },
  props: {
    links: Array,
  },
};
</script>
