<template>
  <div>

  </div>
</template>

<script>
export default {
  route: { path: 'student/index' },
  data() {
    return {
      students: [],
    }
  },
  async created() {
    this.schools = await this.axios.get('student')

  },
  methods: {},
}
</script>

<style></style>
