<template>
  <el-form
    :model="form"
    ref="form"
    label-width="80px"
    :inline="false"
    size="normal"
    v-loading="loading"
  >
    <hd-tab :tabs="tabs" />
    <el-form-item label="站点名称">
      <el-input v-model="form.title"></el-input>
      <hd-error name="title" />
    </el-form-item>
    <el-form-item label="站点域名">
      <el-input v-model="form.domain"></el-input>
      <hd-error name="domain" />
    </el-form-item>
    <el-form-item>
      <el-button type="primary" @click="onSubmit">保存提交</el-button>
    </el-form-item>
  </el-form>
</template>

<script>
const form = { title: "", domain: "" };
import tabs from "./tabs";
export default {};
</script>

<style></style>
