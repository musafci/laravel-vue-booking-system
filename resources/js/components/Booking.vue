<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Booking System.</h1>
                    <Datepicker></Datepicker>
                </div>
            </div>
        </div>
    </section>    
</template>


<script>
    import Datepicker from 'vuejs-datepicker';

    export default {
        mounted() {
            console.log('Component mounted.')
        },

        components: {
            Datepicker
        }
    }
</script>

<style>

</style>