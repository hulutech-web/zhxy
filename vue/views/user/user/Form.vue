<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-card class="box-card">
            <el-form
                    v-model="form"
                    ref="form"
                    label-width="80px"
                    :inline="false"
                    size="normal"
                    class="w-full"
            >
                <el-form-item label="昵称">
                    <el-input v-model="form.name"></el-input>
                    <hd-error name="name" />
                </el-form-item>
                <el-form-item label="邮箱">
                    <el-input v-model="form.email"></el-input>
                    <hd-error name="email" />
                </el-form-item>
                <el-form-item label="手机号">
                    <el-input type="text" v-model="form.mobile"></el-input>
                    <el-tag  type="danger" size="small">手机号必须是11位</el-tag>
                    <hd-error name="mobile" />
                </el-form-item>

                <el-form-item label="登录密码">
                    <el-input type="text" v-model="form.password"></el-input>
                    <hd-error name="password" />
                </el-form-item>

                <el-form-item label="真实姓名">
                    <el-input v-model="form.real_name"></el-input>
                    <hd-error name="real_name" />
                </el-form-item>
                <el-form-item label="头像">
                    <el-input v-model="form.avatar"></el-input>
                    <hd-error name="avatar" />
                </el-form-item>
                <el-form-item label="身份证号">
                    <el-input v-model="form.CID"></el-input>
                    <hd-error name="CID" />
                </el-form-item>
                <el-form-item label="门禁卡号">
                    <el-input v-model="form.attendance_num"></el-input>
                    <hd-error name="attendance_num" />
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="onSubmit">保存提交</el-button>
                </el-form-item>
            </el-form>
        </el-card>
    </div>

</template>

<script>
    const form = { title: '', domain: '' }
    import tabs from './tabs'
    export default {
        route: false,
        props: ['id'],
        data() {
            return {
                tabs,
                form,
            }
        },
        async created() {
            if (this.id) this.form = await this.axios.get(`user/${this.id}`);
        },
        methods: {
            async onSubmit() {
                const url = this.id ? `user/${this.id}` : `user`;
                await this.axios[this.id ? "put" : "post"](url, this.form)
                this.route('user.user.index')
            },
        },
    }
</script>

<style></style>
