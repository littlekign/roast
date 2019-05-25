<template>
    <div>
        <span v-show="cafesLoadStatus === 1"">Loading ... </span>
        <span v-show="cafesLoadStatus === 2"">data loading success ... </span>
        <span v-show="cafesLoadStatus === 3"">data loading fail ... </span>
        <ul>
            <li v-for="cafe in cafes" >{{cafe.name}}</li>
        </ul>

    </div>
</template>

<script>
    export default {
        created(){
            this.$store.dispatch('loadCafes');
        },
        computed:{
            //fetch status of load
            cafesLoadstatus(){
                return this.$store.getters.getCafesLoadStatus;
            },
            // retrieve all cafes data
            cafes(){
                return this.$store.getters.getCafes;
            }
        }


    }
</script>

<style scoped>

</style>
