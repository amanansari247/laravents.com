<template>
    <div>
        <div class="form-group row">
            <label for="c_name" class="col-sm-2 col-form-label">
                <strong>Name</strong>
            </label>
            <div class="col-sm-10">
                <input type="text" id="c_name" class="form-control" placeholder="My Awesome Laravel/PHP Conference" v-model="conference.title">
            </div>
        </div>

        <div class="form-group row">
            <label for="c_description" class="col-sm-2 col-form-label">
                <strong>Description</strong>
            </label>
            <div class="col-sm-10">
                <textarea id="c_description" class="form-control" placeholder="Maecenas sed diam eget risus varius blandit sit amet non magna. Sed posuere consectetur est at lobortis." v-model="conference.description"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="c_website" class="col-sm-2 col-form-label">
                <strong>Website</strong>
            </label>
            <div class="col-sm-10">
                <input type="text" id="c_website" class="form-control" placeholder="https://myconference.com" v-model="conference.website">
            </div>
        </div>

        <div class="form-group row">
            <label for="c_ticket_url" class="col-sm-2 col-form-label">
                <strong>Ticket-Website</strong>
            </label>
            <div class="col-sm-10">
                <input type="text" id="c_ticket_url" class="form-control" placeholder="https://laraticket.com/c/my-conference" v-model="conference.ticket_url">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                conference: {
                    title: null,
                    description: null,
                    website: null,
                    ticket_url: null
                }
            }
        },

        mounted() {

        },

        methods: {
            createConference: function() {
                let self = this;

                axios.post('/api/conferences', this.conference)
                    .then(function (response) {
                        window.location = `/c/${response.data.data.id}`;
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