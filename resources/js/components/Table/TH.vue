<template>
  <th class="pb-4 pt-6 px-6 dark:text-slate-100 capitalize">
    <slot />
    {{ label }}
  </th>
</template>

<script>
export default {
  props: ["label"],
};
</script>

<style>
</style>