<template>
    <div>
        <el-form ref="form" :model="formBase" label-width="80px">
            <hd-tab :tabs="tabs"></hd-tab>
            <el-card class="box-card">
                <div slot="header" class="clearfix">
                    <span>基本资料</span>
                </div>
                <el-form-item label="昵称">
                    <el-input v-model="formBase.name"></el-input>
                    <hd-error name="name"></hd-error>
                </el-form-item>
                <el-form-item label="邮箱">
                    <el-input v-model="formBase.email"></el-input>
                </el-form-item>
                <el-form-item label="手机号">
                    <el-input v-model="formBase.mobile"></el-input>
                </el-form-item>
                <el-form-item label="微信号">
                    <el-input v-model="formBase.wechat"></el-input>
                </el-form-item>
                <el-form-item label="GITHUB">
                    <el-input v-model="formBase.github"></el-input>
                </el-form-item>
                <el-form-item label="QQ">
                    <el-input v-model="formBase.qq"></el-input>
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="onSubmit">保存提交</el-button>
                </el-form-item>
            </el-card>
        </el-form>

        <el-form class="mt-3" ref="formPassword" :model="formPassword" label-width="80px">
            <el-card class="box-card">
                <div slot="header">
                    <span>密码修改</span>
                </div>
                <el-form-item label="原密码">
                    <el-input
                            type="text"
                            v-model="formPassword.old_password"
                    ></el-input>
                    <hd-error name="old_password"/>
                </el-form-item>
                <el-form-item label="新密码">
                    <el-input
                            type="password"
                            v-model="formPassword.password"
                    ></el-input>
                    <hd-error name="password"/>
                </el-form-item>
                <el-form-item label="确认密码">
                    <el-input
                            type="password"
                            v-model="formPassword.password_confirmation"
                    ></el-input>
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="onSubmitPassword"
                    >修改密码
                    </el-button
                    >
                </el-form-item>
            </el-card>
        </el-form>
    </div>
</template>

<script>
    import tabs from "./tabs";
    import Auth from "@/utils/Auth";

    export default {
        data() {
            return {
                tabs: tabs,
                formBase: Auth.user(),
                formPassword: {old_password:this.$store.state.user.password},
            }
        },
        methods: {
            async onSubmit() {
                await this.axios.put(`user/${this.user.id}`, this.formBase);
                this.route(`system.home`);
            },
            onSubmitPassword() {
                this.axios.put(`user/password/${this.user.id}`, this.formPassword);
                this.route(`system.home`);
            }
        }
    }
</script>

<style scoped>

</style>