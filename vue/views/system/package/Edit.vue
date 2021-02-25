<template>
    <div>
        <x-form :id="$route.params.id"/>
    </div>
</template>

<script>
    import XForm from './Form';

    const form = {title: ''};
    export default {
        route:{path:`package/:id/edit`},
        components: {XForm},
        data() {
            return {
                form
            }
        }
    }
</script>

<style scoped>

</style>