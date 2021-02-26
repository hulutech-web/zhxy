<template>
  <!-- This is an example component -->
  <div class="h-screen font-sans login bg-cover">
    <div
      class="container mx-auto h-full flex flex-1 justify-center items-center"
    >
      <div class="w-full max-w-lg">
        <div class="leading-loose">
          <form
            class="max-w-sm m-4 p-10 bg-white bg-opacity-25 rounded shadow-xl"
          >
            <p class="text-white font-medium text-center text-lg font-bold">
              后台登录
            </p>
            <div class="">
              <label class="block text-sm text-white" for="mobile"
                >手机号</label
              >
              <input
                class="w-full px-5 py-1 text-gray-700 bg-gray-300 rounded focus:outline-none focus:bg-white"
                v-model="form.mobile"
                type="text"
                id="mobile"
                placeholder="请输入手机号"
                required
              />
            </div>
            <div class="mt-2">
              <label class="block text-sm text-white">密码</label>
              <input
                class="w-full px-5 py-1 text-gray-700 bg-gray-300 rounded focus:outline-none focus:bg-white"
                v-model="form.password"
                type="password"
                id="password"
                placeholder="请输入手机号"
                required
              />
            </div>
            <div class="mt-7 d-flex js">
              <input
                type="checkbox"
                name="remember"
                v-model="form.remember"
                id="remember"
                class="mr-2"
              />

              <label for="remember" class="text-sm text-white">记住我 </label>
            </div>
            <div class="mt-4 items-center flex justify-between">
              <button
                class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 hover:bg-gray-800 rounded"
                type="button"
                @click="onSubmit"
              >
                登录
              </button>
              <a
                class="inline-block right-0 align-baseline font-bold text-sm text-500 text-white hover:text-red-400"
                href="#"
                >忘记密码 ?</a
              >
            </div>
            <div class="text-center">
              <a
                class="inline-block right-0 align-baseline font-light text-sm text-500 hover:text-red-400"
                href="#"
              >
                立即注册
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  route: { path: "/admin" },
  created() {
    if (this.$store.getters.token) {
      this.route("school.school.index");
    }
  },
  data() {
    return {
      form: {
        mobile: "18090900235",
        password: "admin888",
        captcha: {},
        remember: false,
      },
    };
  },
  methods: {
    onSubmit() {
      this.axios
        .post(`login`, this.form)
        .then(({ token }) => {
          //本地缓存的TOKEN
          localStorage.setItem("token", token);
          location.href = "/school/school/index";
        })
        .finally((_) => this.$refs.captcha.get());
    },
  },
};
</script>

<style>
.login {
  /*
    background: url('https://tailwindadmin.netlify.app/dist/images/login-new.jpeg');
  */
  background: url("https://images.unsplash.com/photo-1614109485947-2929f801ab2b?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=0&ixid=MXwxfDB8MXxyYW5kb218fHx8fHx8fA&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=800");
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
