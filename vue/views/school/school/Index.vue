<template>
  <div>
    <el-card>
      <div slot="header">用户</div>
      <div>{{ schools }}</div>
    </el-card>
  </div>
</template>

<script>
export default {
  route: { path: `/school` },
  data() {
    return {
      schools: [],
    };
  },
  async created() {
    this.schools = await this.axios.get("school");
  },
  methods: {},
};
</script>

<style></style>
