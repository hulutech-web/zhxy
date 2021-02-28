<template>
    <div>
        <hd-tab :tabs="tabs"/>
        <el-card class="box-card">
            <el-table
                    :data="form"
                    border
                    style="width: 100%">
                <!--                数据源-->
                <el-table-column
                        prop="id"
                        label="ID"
                        width="180">
                </el-table-column>

                <el-table-column
                        prop="name"
                        label="姓名">
                </el-table-column>

                <el-table-column
                        prop="mobile"
                        sortable
                        label="手机号">
                </el-table-column>

                <el-table-column
                        prop="email"
                        sortable
                        label="邮箱">
                </el-table-column>

                <el-table-column
                        #default="{row:form}"
                        sortable
                        label="操作">
                    <el-button type="danger" size="mini" @click="del(form.id)">删除</el-button>
                    <el-button type="warning" size="mini" @click="edit(form.id)">编辑</el-button>
                </el-table-column>

            </el-table>
            <!--                分页-->
            <el-pagination
                    v-if="users.meta"
                    @current-change="load"
                    :page-size="users.meta.per_page"
                    :total="users.meta.total"
                    :hide-on-single-page="true">
            </el-pagination>
        </el-card>

    </div>
</template>

<script>
    import tabs from './tabs'
    import router from "@/router";

    export default {
        route: {path: 'user/index'},
        data() {
            return {
                tabs,
                users: [],
                form: [],
            };
        },
        async created() {
            this.load();
        },
        methods: {
            async load(page = 1) {
                this.users = await this.axios.get(`user?page=${page}`);
                this.form = this.users.data;
            },
            del(form) {
                this.$confirm('此操作将永久删除, 是否继续?', '提示', {
                    confirmButtonText: '确定',
                    cancelButtonText: '取消',
                    type: 'warning'
                }).then(async () => {
                    await this.axios.delete(`user/${form}`);
                    this.users.data.splice(this.users.data.indexOf(form), 1)
                }).catch(() => {
                });
            },
            edit(form) {
                router.push({ name: 'user.user.edit', params: {id: form }})
                // this.axios.delete(`user/${form}`);
            }
        }

    }
</script>

<style scoped>

</style>