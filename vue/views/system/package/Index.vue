<template>
    <div>
        <hd-tab :tabs="tabs"/>
        <hd-package :packages.sync="packages" #default="{package:p}">
            <el-button-group>
                <el-button size="mini" type="primary" @click="route('system.package.edit',{id:p.id})">编辑</el-button>
                <el-button size="mini" :type="!p.permissions.delete ? 'info':'danger'" @click="del(p)" :disabled="!p.permissions.delete">删除</el-button>
            </el-button-group>
        </hd-package>
    </div>
</template>

<script>
    import tabs from './tabs';

    const columns = [
        {id: "id", label: "编号", width: 100},
        {id: "title", label: "套餐名称"}
    ];
    export default {
        data() {
            return {
                tabs,
                columns,
                packages: [],
            }
        },
        async created() {
            this.packages = await this.axios.get(`package`);
            this.loading = false;
        },
        methods: {
            async del(p) {
                this.$confirm(`确定删除【${p.title}】吗？`, '温馨提示').then(async _ => {
                        await this.axios.delete(`package/${p.id}`);
                        this.packages.splice(this.packages.indexOf(p), 1)
                    }
                );
                // route('system.package.index');
            }
        }
    }
</script>

<style scoped>

</style>