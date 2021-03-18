<template>
    <div>
        <el-table
                :data="users"
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
                    #default="{row:user}"
                    sortable
                    label="操作">
                <el-button-group>
                    <el-button type="success" icon="el-icon-check" circle size="mini" class="center"
                               @click="add(user)">
                    </el-button>
                </el-button-group>
            </el-table-column>
        </el-table>
    </div>
</template>

<script>
    export default {
        props:["users"],
        methods: {
            add(user) {
                this.$emit('addUser',user)
            }
        }
    }
</script>

<style scoped>

</style>