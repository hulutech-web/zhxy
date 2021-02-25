<template>
  <div>
    <router-view />
  </div>
</template>

<script>
export default {
  route: { meta: { auth: true } },
};
</script>

<style></style>
