<template>
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
                    <textarea id="c_description" class="form-control" placeholder="Maecenas sed diam eget risus varius blandit sit amet non magna. Sed posuere consectetur est at lobortis." v-model="item.description"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="c_name" class="col-sm-2 col-form-label">
                    <strong>Address</strong>
                </label>
                <div class="col-sm-12">
                    <input type="search" id="c_address" class="form-control" placeholder="Where is your conference?">
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

            <div class="form-group row">
                <label for="c_header_image" class="col-sm-2 col-form-label">
                    <strong>Image</strong>
                </label>

                <div class="col-6">
                    <input type="file" class="form-control" id="c_header_image" v-on:change="onFileChange">
                </div>
            </div>
        </div>

        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary" v-on:click="createConference">Submit Conference</button>
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
                    ticket_url: null,
                    lat: null,
                    lon: null,
                    address: null,
                    city: null,
                    country: null,
                    state: null,
                    header_image: null
                }
            }
        },

        mounted() {
            this.setupPlaces();
        },

        methods: {
            onFileChange(e) {
                var files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },

            createImage(file) {
                let self = this;

                var image = new Image();
                var reader = new FileReader();

                reader.onload = (e) => {
                    self.item.header_image = e.target.result;
                };

                reader.readAsDataURL(file);
            },

            setupPlaces: function() {
                let self = this;

                var placesAutocomplete = places({
                    container: document.querySelector('#c_address'),
                    type: 'address'
                });

                placesAutocomplete.on('change', e => console.log(e.suggestion));


                placesAutocomplete.on('change', function resultSelected(e) {
                    self.item.state = e.suggestion.administrative || '';
                    self.item.city = e.suggestion.city || '';
                    self.item.lat = e.suggestion.latlng.lat || '';
                    self.item.lon = e.suggestion.latlng.lng || '';
                    self.item.country = e.suggestion.country || '';
                    self.item.address = e.suggestion.value || '';
                });
            },

            createConference: function() {
                let self = this;

                axios.post('/api/conferences', this.item)
                    .then(function (response) {
                        window.location = `/c/${response.data.data.slug}`;
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