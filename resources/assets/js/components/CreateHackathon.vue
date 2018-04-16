<template>
    <div class="card">
        <div class="card-body">
            <div class="form-group row">
                <label for="c_name" class="col-sm-2 col-form-label">
                    <strong>Name</strong>
                </label>
                <div class="col-sm-12">
                    <input type="text" id="c_name" class="form-control" placeholder="My Awesome Laravel/PHP Hackathon" v-model="item.title">
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
                    <input type="search" id="c_address" class="form-control" placeholder="Where is your hackathon?">
                </div>
            </div>

            <div class="form-group row">
                <label for="c_website" class="col-sm-2 col-form-label">
                    <strong>Website</strong>
                </label>
                <div class="col-sm-12">
                    <input type="text" id="c_website" class="form-control" placeholder="https://myhackathon.com" v-model="item.website">
                </div>
            </div>

            <div class="form-group row">
                <label for="c_start_date" class="col-sm-2 col-form-label">
                    <strong>From</strong>
                </label>

                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" id="c_start_date" class="form-control" data-mask="00/00/0000" data-mask-clearifnotmatch="true" placeholder="00/00/0000" autocomplete="off" maxlength="10" v-model="item.start_date">
                        </div>

                        <div class="col-sm-6">
                            <input type="text" id="c_start_time" class="form-control" data-mask="00:00:00" data-mask-clearifnotmatch="true" placeholder="00:00:00" autocomplete="off" maxlength="8" v-model="item.start_time">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="c_end_date" class="col-sm-2 col-form-label">
                    <strong>To</strong>
                </label>

                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" id="c_end_date" class="form-control" data-mask="00/00/0000" data-mask-clearifnotmatch="true" placeholder="00/00/0000" autocomplete="off" maxlength="10" v-model="item.end_date">
                        </div>

                        <div class="col-sm-6">
                            <input type="text" id="c_end_time" class="form-control" data-mask="00:00:00" data-mask-clearifnotmatch="true" placeholder="00:00:00" autocomplete="off" maxlength="8" v-model="item.end_time">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="c_header_image" class="col-sm-2 col-form-label">
                    <strong>Image</strong>
                </label>

                <div class="col-sm-12">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="c_header_image" v-on:change="onFileChange">
                        <label class="custom-file-label">Choose Image</label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="c_live_stream" class="col-sm-2 col-form-label">
                    <strong>Has Live-Stream</strong>
                </label>

                <div class="col-sm-12">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" id="c_live_stream" class="custom-control-input" value="true" checked="" v-model="item.live_stream">
                        <span class="custom-control-label">Yes</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="card-body" v-if="item.live_stream">
            <create-live></create-live>
        </div>

        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary" v-on:click="createHackathon">Submit Hackathon</button>
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
                    header_image: null,
                    start_date: null,
                    start_time: null,
                    end_date: null,
                    end_time: null,
                    live_stream: false
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

            createHackathon: function() {
                let self = this;

                axios.post('/api/hackathons', this.item)
                    .then(function (response) {
                        window.location = `/h/${response.data.data.slug}`;
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