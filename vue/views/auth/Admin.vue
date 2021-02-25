<template>
    <div class="w-full flex flex-wrap">

        <!-- Login Section -->
        <div class="w-full md:w-1/2 flex flex-col">

            <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-24">
                <a href="#" class="bg-black text-white font-bold text-xl p-4">后台登录</a>
            </div>

            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-center text-3xl">后台管理</p>
                <form class="flex flex-col pt-3 md:pt-8" onsubmit="event.preventDefault();">
                    <div class="flex flex-col pt-4">
                        <label for="email" class="text-lg">手机号</label>
                        <input v-model="form.mobile" placeholder="请输入手机号" id="email"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                        <hd-error name="mobile"/>
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="password" class="text-lg">密码</label>
                        <input type="password" v-model="form.password" id="password" placeholder="请输入密码"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                        <hd-error name="password"/>
                    </div>
                    <div class="flex flex-col mt-4">
                        <label for="captcha" class="text-lg" id="captcha">验证码</label>
                        <hd-captcha
                                v-model="form.captcha"
                                ref="captcha"
                                id="captcha"
                        />
                    </div>
                    <div>
                        <input type="checkbox" name="remember" id="remember" v-model="form.remember"/>
                        <label for="remember" class="text-lg">记住我</label>

                    </div>
                    <button @click="onSubmit" class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8">
                        登录
                    </button>
                </form>
            </div>

        </div>

        <!-- Image Section -->
        <div class="w-1/2 shadow-2xl">
            <img class="object-cover w-full h-screen hidden md:block" src="https://source.unsplash.com/IXUM4cJynP0">
        </div>
    </div>
</template>

<script>
    import HdFooter from "./Footer";

    export default {
        route: {path: "/admin"},
        components: {HdFooter},
        created() {
            if (this.$store.getters.token) {
                this.route("site.site.index");
            }
        },
        data() {
            return {
                form: {
                    mobile: "11111111111",
                    password: "admin888",
                    captcha: {},
                    remember: false
                }
            };
        },
        methods: {
            onSubmit() {
                    this.axios
                    .post(`login`, this.form)
                    .then(({token}) => {
                        //本地缓存的TOKEN
                        localStorage.setItem("token", token);
                        location.href = "/site/site/index";
                    })
                    .finally(_ => this.$refs.captcha.get());
            }
        }
    };
</script>

<style>
    .font-family-karla {
        font-family: karla;
    }
</style>
