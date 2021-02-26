<template>
  <!-- component -->
  <div class="bg-blue-600">
    <div class="w-full">
      <nav class="bg-white shadow-lg">
        <div class="md:flex items-center justify-between py-2 px-8 md:px-12">
          <div class="flex justify-between items-center">
            <div class="text-2xl font-bold text-gray-800 md:text-3xl">
              <a href="#" class="text-indigo-800">智慧星</a>
            </div>
            <div class="md:hidden">
              <button
                type="button"
                class="block text-gray-800 hover:text-gray-700 focus:text-gray-700 focus:outline-none"
              >
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                  <path
                    class="hidden"
                    d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z"
                  />
                  <path
                    d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
                  />
                </svg>
              </button>
            </div>
          </div>
          <div class="flex flex-col md:flex-row hidden md:block -mx-2">
            <a
              href="#"
              class="text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2"
              >首页</a
            >
            <a
              href="#"
              class="text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2"
              >关于我们</a
            >
            <a
              href="#"
              class="text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2"
              >更多内容</a
            >

            <a
              href="#"
              v-if="$store.state.user.data.name"
              class="text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2 text-green-400"
              >{{ $store.state.user.data.name }}</a
            >
            <a
              href="#"
              v-else
              class="text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2 text-red-400"
              >{{ $store.state.user.data.name }}</a
            >
          </div>
        </div>
      </nav>
      <div class="flex bg-white" style="height: 600px">
        <div
          class="flex items-center text-center lg:text-left px-8 md:px-12 lg:w-1/2"
        >
          <div>
            <h2 class="text-3xl font-semibold text-gray-800 md:text-4xl">
              创造无限 <span class="text-green-400">智慧校园</span>
            </h2>
            <p class="mt-2 text-sm text-gray-500 md:text-base">
              他的信念有家国情怀 有个人梦想 总体来说这里是个包容梦想的地方
              夏季的老校区 在民国建筑中漫游 绿树红砖 你能感受到他的古韵
              杨柳缀满校园湖边你能感受到吹面暖风 那是河大岁月的模样 学校的边界
              是明代的古城墙 悠悠风韵 刻入了河大的风骨
            </p>
            <div class="flex justify-center lg:justify-start mt-6">
              <a
                class="px-4 py-3 bg-gray-900 text-gray-200 text-xs font-semibold rounded hover:bg-gray-800"
                href="#"
                >马上开始</a
              >
              <a
                class="mx-4 px-4 py-3 bg-gray-300 text-gray-900 text-xs font-semibold rounded hover:bg-gray-400"
                href="#"
                >更多内容</a
              >
            </div>
          </div>
        </div>
        <div
          class="hidden lg:block lg:w-1/2"
          style="clip-path: polygon(10% 0, 100% 0%, 100% 100%, 0 100%)"
        >
          <div
            class="h-full object-cover"
            style="
              background-image: url(https://images.unsplash.com/photo-1427847888090-7b66d035cdaa?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MXwxfDB8MXxyYW5kb218fHx8fHx8fA&ixlib=rb-1.2.1&q=80&w=1080&utm_source=unsplash_source&utm_medium=referral&utm_campaign=api-credit);
            "
          >
            <div class="h-full bg-black opacity-25"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style></style>
