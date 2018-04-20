<template>
    <div>
        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <label for="c_name" class="col-sm-2 col-form-label">
                        <strong>Name</strong>
                    </label>
                    <div class="col-sm-12">
                        <input type="text" id="c_name" class="form-control" placeholder="My Awesome Laravel/PHP Conference" v-model="item.title">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="c_description" class="col-sm-2 col-form-label">
                        <strong>Description</strong>
                    </label>
                    <div class="col-sm-12">
                        <textarea id="c_description" class="form-control" placeholder="Markdown supported." rows="5" v-model="item.description"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="c_website" class="col-sm-2 col-form-label">
                        <strong>Website</strong>
                    </label>
                    <div class="col-sm-12">
                        <input type="text" id="c_website" class="form-control" placeholder="https://myconference.com" v-model="item.website">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="c_ticket_url" class="col-sm-2 col-form-label">
                        <strong>Ticket-Website</strong>
                    </label>
                    <div class="col-sm-12">
                        <input type="text" id="c_ticket_url" class="form-control" placeholder="https://tickets.laravents.com/c/my-conference" v-model="item.ticket_url">
                    </div>
                </div>

                <!--<div class="form-group row">-->
                    <!--<label for="c_live_stream" class="col-sm-4 col-form-label">-->
                        <!--<strong>Has Live-Stream <small class="text-muted">(Powered by <a href="https://larastream.com">LaraStream</a>)</small></strong>-->
                    <!--</label>-->

                    <!--<div class="col-sm-12">-->
                        <!--<label class="custom-control custom-checkbox">-->
                            <!--<input type="checkbox" id="c_live_stream" class="custom-control-input" value="true" checked="" v-model="item.live_stream">-->
                            <!--<span class="custom-control-label">Yes</span>-->
                        <!--</label>-->
                    <!--</div>-->
                <!--</div>-->
            </div>

            <!--<div class="card-body" v-if="item.live_stream">-->
                <!--<create-live></create-live>-->
            <!--</div>-->

            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary" v-on:click="updateItem">Update Conference</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'conferenceid'
        ],

        data() {
            return {
                item: {
                    id: null,
                    title: null,
                    description: null,
                    website: null,
                    ticket_url: null,
                    live_stream: false,
                    user_id: window.Laravents.currentUser.id
                }
            }
        },

        mounted() {
            this.getItem();
        },

        methods: {
            updateItem: function() {
                let self = this;

                axios.patch('/api/conferences/' + self.item.id, this.item)
                    .then(function (response) {
                        swal('Yay...', 'Your conference is successfully updated.', 'success');
                        setTimeout(function() {
                            window.location = `/c/${response.data.data.slug}`;
                        }, 2000);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            getItem: function() {
                let self = this;

                axios.get('/api/conferences/' + this.conferenceid)
                    .then(function (response) {
                        self.item = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
        }
    }
</script>

<style scoped>

</style>