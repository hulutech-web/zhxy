<template>
  <div>
    <hd-tab :tabs="tabs" />
    <el-card>
      <div slot="header">部门列表</div>
      <div>
        <el-form label-width="80px">
          <el-table :data="form" style="width: 100%" border>
            <el-table-column prop="form.name" label="部门名称" width="width">
            </el-table-column>
            <el-table-column label="管理员" width="width"> </el-table-column>
          </el-table>
        </el-form>
      </div>
    </el-card>
  </div>
</template>

<script>
import tabs from './tabs'
export default {
  route: { path: ':scid/department/index' },
  data() {
    return {
      tabs,
      form: [],
    }
  },
  async created() {
    const user = await this.axios.get('user/info')
    this.form = await this.axios.get(`school/${this.school.id}/department`)
    console.log(user)
  },
  methods: {},
}
</script>

<style>
</style>
