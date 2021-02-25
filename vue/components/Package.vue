<template>
    <div>
        <el-table
                border
                :data="packageData"
                style="width: 100%"
        >
            <el-table-column
                    v-for="col in columns"
                    :key="col.id"
                    :prop="col.id"
                    :label="col.label"
                    :width="col.width"
            >
            </el-table-column>
            <!--            #表示插槽-->
            <el-table-column width="200" align="center" label="操作" v-slot:default="{row:p}">
                <slot :package="p"/>
            </el-table-column>
        </el-table>
    </div>
</template>

<script>
    const columns = [
        {id: "id", label: "编号", width: 100},
        {id: "title", label: "套餐名称"}
    ];
    export default {
        props: ["packages"],
        data() {
            return {
                columns,
                packageData: this.packages,
            }
        },
        watch: {
            packages(n) {
                this.packageData = n;
            }

        }
    }
</script>

<style scoped>

</style>