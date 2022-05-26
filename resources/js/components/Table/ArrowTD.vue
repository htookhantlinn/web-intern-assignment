<template>
  <td class="w-px border-t dark:border-t-0">
    <Link
      class="flex items-center px-4"
      tabindex="-1"
      :href="route(link, data.id)"
    >
      <icon
        name="cheveron-right"
        class="block w-6 h-6 fill-gray-400 group-hover:fill-white"
      />
    </Link>
  </td>
</template>

<script>
import Icon from "@/Shared/Icon";
import { Link } from "@inertiajs/inertia-vue3";
export default {
  components: { Icon, Link },
  props: ["data", "link"],
};
</script>

<style>
</style>