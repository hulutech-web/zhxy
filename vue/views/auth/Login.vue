<template>
  <!-- This is an example component -->
  <div class="font-sans">
    <div
      class="relative min-h-screen flex flex-col sm:justify-center items-center bg-gray-100"
    >
      <div class="relative sm:max-w-sm w-full">
        <div
          class="card bg-blue-400 shadow-lg w-full h-full rounded-3xl absolute transform -rotate-6"
        ></div>
        <div
          class="card bg-red-400 shadow-lg w-full h-full rounded-3xl absolute transform rotate-6"
        ></div>
        <div
          class="relative w-full rounded-3xl px-6 py-4 bg-gray-100 shadow-md"
        >
          <label for="" class="block text-gray-700 text-center font-semibold">
            <h3>用户登录</h3>
          </label>
          <form method="#" action="#" class="mt-10">
            <div>
              <input
                v-model="form.mobile"
                placeholder="请输入手机号"
                class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"
              />
              <hd-error name="mobile" />
            </div>

            <div class="mt-7">
              <input
                v-model="form.password"
                placeholder="请输入登录密码"
                class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"
              />
              <hd-error name="password" />
            </div>
            <!-- captcha -->
            <div class="mt-7 flex">
              <hd-captcha v-model="form.captcha" ref="captcha" />
            </div>
            <!-- remember me -->
            <div class="mt-7 d-flex js">
              <input
                type="checkbox"
                name="remember"
                v-model="form.remember"
                id="remember"
                class="mr-2"
              />

              <label for="remember" class="text-sm text-grey-dark"
                >记住我
              </label>
            </div>

            <div class="mt-7">
              <button
                type="button"
                class="bg-blue-500 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out transform hover:-translate-x hover:scale-105"
                @click="onSubmit"
              >
                登录
              </button>
            </div>

            <div class="flex mt-7 items-center text-center">
              <hr class="border-gray-300 border-1 w-full rounded-md" />
              <label class="block font-medium text-sm text-gray-700 w-full">
                其他方式
              </label>
              <hr class="border-gray-300 border-1 w-full rounded-md" />
            </div>

            <div class="flex mt-7 justify-center w-full">
              <button
                class="mr-5 bg-blue-500 border-none px-4 py-2 rounded-xl cursor-pointer text-white shadow-xl hover:shadow-inner transition duration-500 ease-in-out transform hover:-translate-x hover:scale-105"
              >
                微信
              </button>

              <button
                class="bg-red-500 border-none px-4 py-2 rounded-xl cursor-pointer text-white shadow-xl hover:shadow-inner transition duration-500 ease-in-out transform hover:-translate-x hover:scale-105"
              >
                GITHUB
              </button>
            </div>

            <div class="mt-7">
              <div class="flex justify-center items-center">
                <label class="w-full text-sm text-gray-600">没有账号</label>
                <a
                  href="#"
                  class="w-full text-blue-500 transition duration-500 ease-in-out transform hover:-translate-x hover:scale-105"
                >
                  立即注册
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  route: { path: '/login', meta: { guest: true } },
  data() {
    return {
      form: {
        mobile: '18090900235',
        password: 'admin888',
        captcha: {},
        remember: false,
      },
    }
  },
  methods: {
    onSubmit() {
      this.axios
        .post('login', this.form)
        .then(({ token }) => {
          //本地缓存的TOKEN
          localStorage.setItem('token', token)
          location.href = 'school/school/index'
        })
        .finally((_) => this.$refs.captcha.get())
    },
  },
}
</script>

<style></style>
