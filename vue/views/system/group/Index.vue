<template>
    <div>
        <hd-tab :tabs="tabs"/>
        <el-table
                border
                :data="groups"
                style="width: 100%"
                v-loading="loading"

        >
            <el-table-column
                    v-for="col in columns"
                    :key="col.id"
                    :prop="col.id"
                    :label="col.label"
                    :width="col.width"
            >
            </el-table-column>
            <!--            套餐字段-->
            <el-table-column
                    label="套餐"
                    v-slot:default="{row:g}"
                    width="300"
            >
                <el-popover trigger="hover" placement="right" v-for="p in g.packages" :key="p.id">
                    <p>ID:{{p.id}}</p>
                    <p>名称:{{p.title}}</p>
                    <p>创建时间:{{ p.created_at | fromNow }}</p>
                    <span slot="reference">
                        <el-tag
                                type="danger"
                                size="mini"
                                class="mt-2 mr-2 cursor-pointer"
                                @click="route(`system.package.edit`,{id:p.id})"
                        >
                            {{p.title}}
                        </el-tag>
                    </span>
                </el-popover>


            </el-table-column>
            <!--            #表示插槽-->
            <el-table-column width="200" align="center" label="操作" #default="{row:g}">
                <el-button-group>
                    <el-button size="mini" type="primary" @click="route('system.group.edit',{id:g.id})">编辑</el-button>
                    <el-button size="mini" :type="!g.permissions.delete ? 'info':'danger'" @click="del(g)"
                               :disabled="!g.permissions.delete">删除
                    </el-button>
                </el-button-group>
            </el-table-column>
        </el-table>
    </div>
</template>

<script>
    import tabs from './tabs';
    const columns = [
        {id: "id", label: "编号", width: 100},
        {id: "title", label: "会员组名称"},
        {id: "site_num", label: "站点数量"},
        {id: "days", label: "可用天数"},
    ];
    export default {
        data() {
            return {
                tabs,
                columns,
                groups: [],
                loading: true
            }
        },
        async created() {
            this.groups = await this.axios.get(`group`);
            this.loading = false
        },
        methods: {
            async del(g) {
                this.$confirm(`确定删除【${g.title}】吗？`, '温馨提示').then(async _ => {
                        await this.axios.delete(`group/${g.id}`);
                        this.groups.splice(this.groups.indexOf(g), 1)
                    }
                );
                route('system.group.index');
            }
        }
    }
</script>

<style scoped>

</style>