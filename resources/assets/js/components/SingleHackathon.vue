<template>
    <div class="my-3 my-md-5">
        <div class="container">
            <div class="row row-cards">
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Information</h3>
                            <!--<div class="card-options">-->
                            <!--<a v-bind:href="'/c/' + item.slug + '/edit'" data-toggle="tooltip" title="" data-original-title="Edit">-->
                            <!--<i class="far fa-edit"></i>-->
                            <!--</a>-->
                            <!--</div>-->
                        </div>

                        <div class="card-map card-map-placeholder">
                            <gmap-map
                                    :center="{lat: Number(item.lat), lng: Number(item.lon)}"
                                    :zoom="15"
                                    :draggable="false"
                                    map-type-id="terrain"
                                    style="width: 374px; height: 240px"
                            >
                                <gmap-marker
                                        :position="{lat: Number(item.lat), lng: Number(item.lon)}"
                                ></gmap-marker>
                            </gmap-map>
                        </div>

                        <div class="card-body">
                            <div class="media mb-5">
                                <img class="d-flex mr-5 rounded" v-bind:src="item.header_image" v-bind:alt="item.title" style="max-height: 64px; max-width: 64px;">
                                <div class="media-body">
                                    <h5>{{ item.title }}</h5>

                                    <address class="text-muted small">
                                        {{ item.address }}
                                    </address>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="h6">From</div>
                                    <p>{{ item.start_date | momentDate }}</p>
                                </div>

                                <div class="col-6">
                                    <div class="h6">To</div>
                                    <p>{{ item.end_date | momentDate }}</p>
                                </div>

                                <div class="col-12">
                                    <div class="h6">Where</div>
                                    <p>{{ item.address }}</p>
                                </div>

                                <div class="col-6">
                                    <div class="h6">Website</div>
                                    <p>
                                        <a v-bind:href="item.website">Website</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--<div class="card">-->
                    <!--<div class="card-header">-->
                    <!--<h3 class="card-title">Sponsors</h3>-->
                    <!--</div>-->
                    <!--<div class="card-body">-->
                    <!--<div class="media">-->
                    <!--<img class="mr-3" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_162d39a4823%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_162d39a4823%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2213.84375%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Generic placeholder image">-->
                    <!--<div class="media-body">-->
                    <!--<h5 class="mt-0">LaraJobs</h5>-->
                    <!--Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet.-->
                    <!--</div>-->
                    <!--</div>-->
                    <!--<br>-->
                    <!--<div class="media">-->
                    <!--<img class="mr-3" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_162d39a4823%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_162d39a4823%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2213.84375%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Generic placeholder image">-->
                    <!--<div class="media-body">-->
                    <!--<h5 class="mt-0">LaraStream</h5>-->
                    <!--Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet.-->
                    <!--</div>-->
                    <!--</div>-->
                    <!--</div>-->
                    <!--</div>-->

                </div>

                <div class="col-lg-8 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">About {{ item.title }}</h3>
                        </div>
                        <div class="card-body">
                            <vue-markdown :source="item.description"></vue-markdown>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import VueMarkdown from 'vue-markdown';
    export default {
        components: {
            VueMarkdown
        },

        props: [
            'hackathonid'
        ],

        data() {
            return {
                item: {}
            }
        },

        mounted() {
            this.getHackathon();
        },

        methods: {
            getHackathon: function() {
                let self= this;

                axios.get('/api/hackathons/' + this.hackathonid)
                    .then(function (response) {
                        self.item = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },

        filters: {
            momentDate: function (date) {
                return moment(date).format('DD.MM.YYYY');
            },

            momentTime: function (date) {
                return moment(date).format('HH:MM');
            }
        }
    }
</script>

<style scoped>

</style>