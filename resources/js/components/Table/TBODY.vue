<template>
  <tbody>
    <TR
      :data="data"
      :link="link"
      :dataTargets="dataTargets"
      :showDetailId="showDetailId"
    />
    <tr v-if="data.length === 0">
      <td class="px-6 py-4 dark:text-white" colspan="4">No Data found.</td>
    </tr>
  </tbody>
</template>

<script>
import TR from "./TR.vue";

export default {
  components: { TR },
  props: ["data", "link", "dataTargets", "showDetailId"],
};
</script>

<style>
</style>