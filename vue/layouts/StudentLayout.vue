<template>
  <div>
    <top-menu />
    <el-card>
      <router-view />
    </el-card>
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
