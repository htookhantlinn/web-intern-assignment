<template>
  <thead>
    <tr class="text-left font-bold dark:bg-slate-700">
      <TH
        :label="thead"
        v-for="(thead, key) in theads"
        :key="thead"
        :colspan="key === theads.length - 1 ? '2' : '1'"
      />
    </tr>
  </thead>
</template>

<script>
import TH from "../Table/TH";
export default {
  components: { TH },
  props: ["theads"],
};
</script>

<style>
</style>