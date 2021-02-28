<template>
    <el-row>
        <el-col>
            <el-dropdown>
                  <span class="el-dropdown-link">
                      <slot name="head"></slot><i class="el-icon-arrow-down el-icon--right"></i>
                  </span>
                <el-dropdown-menu slot="dropdown">

                    <slot name="edit"></slot>

                    <slot name="default"></slot>

                    <slot name="delete"></slot>

                </el-dropdown-menu>
            </el-dropdown>
        </el-col>
    </el-row>
</template>

<script>
    export default {
        //得到当前操作的对象比如school
        props: ["drop"],
    };
</script>

<style>
    .el-dropdown-link {
        cursor: pointer;
        color: #6B7280;
    }

    .el-icon-arrow-down {
        font-size: 12px;
    }

    .demonstration {
        display: block;
        color: #8492a6;
        font-size: 14px;
        margin-bottom: 20px;
    }
</style>