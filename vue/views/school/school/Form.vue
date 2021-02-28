<template>
    <div>
        <hd-tab :tabs="tabs"/>
        <el-card class="box-card">
            <el-form
                    v-model="form"
                    ref="form"
                    label-width="80px"
                    :inline="false"
                    size="normal"
                    class="w-full"
            >

                <el-form-item label="学校名称">
                    <el-input v-model="form.name"></el-input>
                    <hd-error name="name"/>
                </el-form-item>
                <el-form-item label="学校域名">
                    <el-input v-model="form.domain"></el-input>
                    <hd-error name="domain"/>
                </el-form-item>
                <el-form-item label="基础配置">
                    <el-input type="textarea" v-model="form.config"></el-input>
                    <hd-error name="config"/>
                </el-form-item>
                <el-form-item label="简单描述">
                    <el-input v-model="form.description"></el-input>
                    <hd-error name="description"/>
                </el-form-item>
                <el-form-item label="对公电话">
                    <el-input v-model="form.tel"></el-input>
                    <hd-error name="tel"/>
                </el-form-item>
                <el-form-item label="对公邮箱">
                    <el-input v-model="form.email"></el-input>
                    <hd-error name="email"/>
                </el-form-item>
                <el-form-item label="备案号">
                    <el-input v-model="form.icp"></el-input>
                    <hd-error name="icp"/>
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="onSubmit">保存提交</el-button>
                </el-form-item>
            </el-form>

        </el-card>
    </div>
</template>

<script>
    const form = {title: '', domain: ''}
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
            if (this.id) this.form = await this.axios.get(`school/${this.id}`);
        },
        methods: {
            async onSubmit() {
                const url = this.id ? `school/${this.id}` : `school`;
                await this.axios[this.id ? "put" : "post"](url, this.form)
                this.route('school.school.index')
            },
        },
    }
</script>

<style></style>
