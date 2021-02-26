<template>
  <div>
    <div>
      <button
        class="text-white cursor-pointer transform hover:scale-110 motion-reduce:transform-none p-3 m-3 bg-pink-600 focus-visible:ring-2 rounded-md"
      >
        添加学校
      </button>
    </div>
    <div class="container mx-auto">
      <div class="grid grid-cols-3 align-items-center">
        <a
          class="w-full max-w-sm overflow-hidden rounded border bg-white shadow mt-4 justify-content-center"
          v-for="school in schools"
          :key="school.id"
          :href="school.domain"
          target="_blank"
        >
          <div class="relative">
            <div
              class="h-48 bg-cover bg-no-repeat bg-center justify-item-center"
              style="
                background-image: url(https://picsum.photos/245/245/?random;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
              "
            ></div>
            <div
              style="background-color: rgba(0, 0, 0, 0.6)"
              class="absolute bottom-0 mb-2 ml-3 px-2 py-1 rounded text-sm text-white"
            >
              {{ school.id }}.{{ school.name }}
            </div>
            <div style="bottom: -20px" class="absolute right-0 w-10 mr-2">
              <a href="#">
                <img
                  class="rounded-full border-2 border-white"
                  src="https://randomuser.me/api/portraits/women/1.jpg"
                />
              </a>
            </div>
          </div>
          <div class="p-3">
            <h3 class="mr-10 text-sm truncate-2nd">
              <a
                class="hover:text-blue-500"
                href="/huawwei-p20-pro-complete-set-with-box-a.7186128376"
                >{{ school.domain }}</a
              >
            </h3>
            <div class="flex items-start justify-between">
              <p class="text-xs text-gray-500">{{ school.description }}</p>
              <button
                class="outline text-xs text-gray-500 hover:text-blue-500"
                title="Bookmark this ad"
              >
                <i class="far fa-bookmark"></i>
              </button>
            </div>
            <p class="text-xs text-gray-500">
              <a href="#" class="hover:underline hover:text-blue-500">2021</a>
              {{ school.created_at }}
            </p>
          </div>
        </a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  route: { path: "school/index" },
  data() {
    return {
      schools: [],
    };
  },
  async created() {
    this.schools = await this.axios.get("school");
  },
  methods: {},
};
</script>

<style></style>
