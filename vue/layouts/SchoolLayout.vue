<template>
  <div>
    <top-menu />
    <router-view />
  </div>
</template>

<script>
import TopMenu from "./components/TopMenu";
export default {
  route: { meta: { auth: true } },
  components: { TopMenu },
};
</script>

<style></style>
