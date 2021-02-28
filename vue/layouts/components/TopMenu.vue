<template>
    <header class="text-gray-100 bg-gray-900 body-font shadow w-200">
        <div
                class="container mx-auto flex flex-wrap flex-col md:flex-row items-center"
        >
            <nav class="flex lg:w-2/5 flex-wrap items-center text-base md:ml-auto">
                <router-link to="/school/school/index">
                    <a
                            class="mr-5 hover:text-gray-400 cursor-pointer border-b border-transparent hover:border-indigo-600"
                    >学校管理</a
                    >
                    <a
                            class="mr-5 hover:text-gray-400 cursor-pointer border-b border-transparent hover:border-indigo-600"
                    ></a>
                </router-link>
                <!--        用户管理-->
                <router-link
                        to="/user/user/index">
                    <a
                            class="mr-5 hover:text-gray-400 cursor-pointer border-b border-transparent hover:border-indigo-600"
                    >用户管理</a
                    >
                    <a
                            class="mr-5 hover:text-gray-400 cursor-pointer border-b border-transparent hover:border-indigo-600"
                    ></a>
                </router-link>

                <!--        下拉菜单-->
                <el-dropdown :hide-on-click="false">
                <span class="el-dropdown-link">
                        角色管理
                </span>
                    <el-dropdown-menu slot="dropdown">
                    </el-dropdown-menu>
                    <hd-dropdown>

                        <template v-slot:default>
                            <div v-for="item in form" :key="item.id">
                                <router-link
                                        :to="{ name: `${item.role}.${item.role}.create`, params: { id: item.id }, }">
                                    <el-dropdown-item>
                                        <span>{{item.title}}</span>
                                    </el-dropdown-item>
                                </router-link>

                            </div>
                        </template>

                    </hd-dropdown>
                </el-dropdown>

                <a
                        class="mr-5 hover:text-gray-400 cursor-pointer border-b border-transparent hover:border-indigo-600"
                ></a>
            </nav>

            <a
                    class="flex order-first lg:order-none lg:w-1/5 title-font font-medium items-center lg:items-center lg:justify-center mb-4 md:mb-0"
            >
                <a
                        class="flex order-first lg:order-none lg:w-1/5 title-font font-medium items-center lg:items-center lg:justify-center mb-4 md:mb-0"
                >
                    <svg
                            t="1614368589005"
                            class="icon"
                            viewBox="0 0 1264 1024"
                            version="1.1"
                            xmlns="http://www.w3.org/2000/svg"
                            p-id="1613"
                            width="100"
                            height="100"
                    >
                        <path
                                d="M856.786824 323.794824V0.030118h-462.607059v137.366588a293.586824 293.586824 0 0 1 192.752941 275.727059c0 126.674824-80.293647 234.526118-192.752941 275.57647V1002.315294h848.112941V323.794824h-385.505882z"
                                fill="#4C86C6"
                                p-id="1614"
                        ></path>
                        <path
                                d="M293.436235 119.657412c-162.032941 0-293.406118 131.373176-293.406117 293.466353 0 144.564706 104.568471 264.613647 242.145882 288.88847v300.303059h102.520471v-300.272941a290.936471 290.936471 0 0 0 49.483294-13.312V137.396706a292.803765 292.803765 0 0 0-100.74353-17.739294"
                                fill="#31EC7C"
                                p-id="1615"
                        ></path>
                        <path
                                d="M586.932706 413.123765a293.586824 293.586824 0 0 0-192.752941-275.727059v551.303529c112.459294-41.050353 192.752941-148.901647 192.752941-275.57647"
                                fill="#1565B2"
                                p-id="1616"
                        ></path>
                        <path
                                d="M671.744 917.473882h107.911529V84.811294h-107.911529zM860.611765 917.473882h107.941647V408.606118h-107.941647zM1049.509647 917.473882h107.941647V408.606118h-107.941647z"
                                fill="#FFFFFF"
                                p-id="1617"
                        ></path>
                    </svg>
                </a>

                <span class="ml-3 text-xl">智慧中台</span>
            </a>
            <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0 center">
                <a
                        class="bg-indigo-700 w-24 hover:bg-indigo-500 text-white  py-2 px-3 rounded-lg cursor-pointer text-sm"
                >
                    C艾丹
                </a>
            </div>
        </div>
    </header>
</template>

<script>

    const form = [
        {id: 1, role: 'student', title: '学生管理'},
        {id: 2, role: 'teacher', title: '教职工管理'},
        {id: 3, role: 'adviser', title: '班主任管理'},
    ]
    export default {
        data() {
            return {
                form
            }
        }
    };
</script>
