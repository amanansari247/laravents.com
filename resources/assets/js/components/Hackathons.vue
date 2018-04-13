<template>
    <div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                hackathons: []
            }
        },

        mounted() {
            this.getHackathons();
        },

        methods: {
            getHackathons: function() {
                let self = this;
                axios.get('/api/hackathons')
                    .then(function (response) {
                        self.hackathons = response.data.data;
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