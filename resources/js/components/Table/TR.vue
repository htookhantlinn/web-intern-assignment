<template>
  <tr
    v-for="d in data"
    :key="d"
    class="
      dark:border-0
      hover:bg-slate-400
      hover:dark:bg-slate-300
      hover:dark:text-slate-800
      hover:text-white
      dark:text-white
      hover:cursor-pointer
      group
      dark:bg-slate-700
    "
  >
    <TD
      :data="d"
      :dataTarget="dataTarget"
      :link="link"
      v-for="dataTarget in dataTargets"
      :key="dataTarget"
      :showDetailId="showDetailId"
    />
    <ArrowTD :data="d" :link="link" />
  </tr>
</template>

<script>
import ArrowTD from "./ArrowTD.vue";
import TD from "./TD.vue";
export default {
  components: {
    TD,
    ArrowTD,
  },
  props: ["data", "link", "dataTargets", "showDetailId"],
};
</script>

<style>
</style>