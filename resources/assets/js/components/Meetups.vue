<template>
    <div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                meetups: []
            }
        },

        mounted() {
            this.getMeetups();
        },

        methods: {
            getMeetups: function() {
                let self = this;
                axios.get('/api/meetups')
                    .then(function (response) {
                        self.meetups = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    }
</script>

<style scoped>

</style>