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
                <el-form-item label="学校评分">
                    <span>当前评分{{ form.rate }}</span>
                    <el-rate v-model="form.rate" show-text></el-rate>
                    <hd-error name="rate"/>
                </el-form-item>
                <el-card class="box-card">
                    <div slot="header" class="clearfix">
                        <span>点击选择</span>
                        <el-button type="danger" icon="el-icon-edit"  @click="dialogVisible = true"></el-button>
                    </div>
                    <!--父组件的表格-->
                    <el-table
                            :data="form.users"
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
                                <el-button type="danger" icon="el-icon-delete" size="mini" circle
                                           @click="del(user)"></el-button>
                            </el-button-group>
                        </el-table-column>
                    </el-table>


                    <!--                    弹窗-->
                    <el-dialog
                            title="请选择"
                            :visible.sync="dialogVisible"
                            width="55%"
                            :before-close="handleClose">

                        <user-list @addUser="add" :users="users">

                        </user-list>

                    </el-dialog>
                </el-card>
                <el-button type="primary" class="mt-3" @click="onSubmit">保存提交</el-button>
            </el-form>
        </el-card>
    </div>
</template>

<script>
    const form = {title: '', domain: ''}
    import tabs from './tabs'
    import UserList from './UserList'

    export default {
        components: {UserList},
        route: false,
        props: ['id'],
        data() {
            return {
                tabs,
                form: {},
                value: 0,
                users: [],
                dialogVisible: false
            }
        },
        async created() {
            if (this.id) this.form = await this.axios.get(`school/${this.id}`)
            this.value = this.form.rate
            this.users = await this.axios.get(`user`)
        },
        methods: {
            async onSubmit() {
                const url = this.id ? `school/${this.id}` : `school`
                this.form.users= this.form.users.map(user=>user.id)
                await this.axios[this.id ? 'put' : 'post'](url, this.form)
                this.route('school.school.index')
            },
            handleClose(done) {
                done();
            },
            add(user) {
               const isExits = this.form.users.find(u=>u.id==user.id);
                if(!Boolean(isExits)){
                    this.form.users.push(user);
                }
            },
            del(user){
                // console.log(this.form.users.indexOf(user));
                this.form.users.splice(this.form.users.indexOf(user),1)
            }
        },
    }
</script>

<style></style>
