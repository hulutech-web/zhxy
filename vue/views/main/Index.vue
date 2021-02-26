<template>
  <div>
    <top-menu />
    {{ user }}
  </div>
</template>

<script>
import TopMenu from "@/layouts/components/TopMenu.vue";
export default {
  props: { user: Object },
  components: { TopMenu },
};
</script>
