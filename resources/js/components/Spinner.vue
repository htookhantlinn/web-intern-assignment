<template>
  <div class="spin dark:border-t-white"></div>
</template>

<script>
export default {};
</script>

<style>
.spin {
  width: 40px;
  height: 40px;
  border: 3px solid transparent;
  border-radius: 50%;
  margin: 30px auto;
  border-top-color: #1e293b;
  animation: spin 1s infinite;
}

@keyframes spin {
  to {
    transform: rotate(360deg);
  }
}
</style>