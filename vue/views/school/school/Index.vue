<template>
    <div>
        <div>
            <button
                    class="text-white mx-auto flex flex-wrap flex-col md:flex-row items-center cursor-pointer transform hover:scale-110 motion-reduce:transform-none p-3 m-3 bg-pink-600 focus-visible:ring-2 rounded-md"
                    @click="$router.push({ name: 'school.school.create' })"
            >
                添加学校
            </button>
        </div>
        <div class="container mx-auto">
            <div class="grid grid-cols-3 align-items-center">
                <div class="w-full max-w-sm overflow-hidden rounded border bg-white shadow mt-4 justify-content-center"
                     v-for="school in schools"
                     :key="school.id">

                    <a>
                        <div class="relative">
                            <div class="h-48 bg-cover bg-no-repeat bg-center justify-item-center"
                                 style="background-image: url(https://picsum.photos/245/245/?random)"></div>

                            <div style="background-color: rgba(0, 0, 0, 0.6)"
                                 class="absolute bottom-0 mb-2 ml-3 px-2 py-1 rounded text-sm text-white">
                                {{ school.id }}.{{ school.name }}
                            </div>
                            <div style="bottom: -20px" class="absolute right-0 w-10 mr-2">
                                <a href="#">
                                    <img class="rounded-full border-2 border-white"
                                         src="https://randomuser.me/api/portraits/women/1.jpg"/>
                                </a>
                            </div>
                        </div>

                        <!-- 路由跳转edit -->

                        <div class="p-3">
                            <h3 class="mr-10 text-sm truncate-2nd">
                                <a class="hover:text-blue-500"
                                   href="/huawwei-p20-pro-complete-set-with-box-a.7186128376"
                                >{{ school.domain }}</a>
                            </h3>
                            <div class="flex items-start justify-between">
                                <p class="text-xs text-gray-500">{{ school.description }}</p>
                                <button class="outline text-xs text-gray-500 hover:text-blue-500"
                                        title="Bookmark this ad">

                                    <hd-dropdown :drop="school">
                                        <template v-slot:edit>

                                            <router-link
                                                    :to="{ name: 'school.school.edit', params: { id: school.id } }">
                                                <el-dropdown-item icon="el-icon-link">编辑</el-dropdown-item>
                                            </router-link>
                                        </template>
                                        <template v-slot:delete>
                                            <el-dropdown-item icon="el-icon-delete-solid">
                                                <span @click.prevent="del(school)">删除</span>
                                            </el-dropdown-item>
                                        </template>
                                    </hd-dropdown>

                                </button>
                            </div>
                            <p class="text-xs text-gray-500">
                                <a href="#" class="hover:underline hover:text-blue-500"
                                >{{ school.created_at | fromNow}}</a>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import tabs from './tabs';

    const dropOrignName = tabs[0].name.split(".")[0]
    export default {
        route: {path: 'school/index'},
        data() {
            return {
                schools: [],
                tabs,
                dropOrignName
            }
        },
        async created() {
            this.schools = await this.axios.get('school');
        },
        methods: {
            async del(school) {
                this.$confirm('此操作将永久学校, 请谨慎操作?', '警告!!', {
                    confirmButtonText: '确定',
                    cancelButtonText: '取消',
                    type: 'error'
                }).then(async () => {
                    await this.axios.delete(`${dropOrignName}/${school.id}`)
                    this.schools.splice(this.schools.indexOf(school), 1)
                }).catch(() => {
                });
            }
        }
    }
</script>

<style></style>
