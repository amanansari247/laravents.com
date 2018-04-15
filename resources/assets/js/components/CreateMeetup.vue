<template>
    <div>
        <div class="form-group row">
            <label for="c_name" class="col-sm-2 col-form-label">
                <strong>Name</strong>
            </label>
            <div class="col-sm-12">
                <input type="text" id="c_name" class="form-control" placeholder="My Awesome Laravel/PHP Meetup" v-model="item.title">
            </div>
        </div>

        <div class="form-group row">
            <label for="c_description" class="col-sm-2 col-form-label">
                <strong>Description</strong>
            </label>
            <div class="col-sm-12">
                <textarea id="c_description" class="form-control" placeholder="Maecenas sed diam eget risus varius blandit sit amet non magna. Sed posuere consectetur est at lobortis." v-model="item.description"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="c_website" class="col-sm-2 col-form-label">
                <strong>Website</strong>
            </label>
            <div class="col-sm-12">
                <input type="text" id="c_website" class="form-control" placeholder="https://mymeetup.com" v-model="item.website">
            </div>
        </div>

        <div class="form-group row">
            <label for="c_ticket_url" class="col-sm-2 col-form-label">
                <strong>RSVP-Website</strong>
            </label>
            <div class="col-sm-12">
                <input type="text" id="c_ticket_url" class="form-control" placeholder="https://tickets.laravents.com/m/my-meetup" v-model="item.ticket_url">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                item: {
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

                axios.post('/api/meetups', this.item)
                    .then(function (response) {
                        window.location = `/m/${response.data.data.slug}`;
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