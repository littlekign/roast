<template>
    <div class="app-layout">
        <navigation></navigation>
        <router-view></router-view>
        <!--<h1>hi i'm the layout component</h1>-->
    </div>
</template>

<script>
    import Navigation from '../components/global/Navigation.vue';
    export default {
        components:{
            Navigation
        },
        created(){
            this.$store.dispatch('loadCafes');
            this.$store.dispatch('loadUser');
        }

    }
</script>

<style>

</style>
