<template>
    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Conferences</strong>
                    </div>

                    <div class="table-responsive" v-if="conferences.length">
                        <table class="table card-table table-striped table-vcenter">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="item in conferences">
                                <td>{{ item.title }}</td>
                                <td>{{ item.start_date | momentDate }}</td>
                                <td>{{ item.end_date | momentDate }}</td>
                                <td class="text-nowrap">
                                    <a class="btn btn-sm btn-outline-primary" v-bind:href="'/c/' + item.slug + '/edit'">Edit</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card-body" v-else>
                        <h4 class="text-center">
                            Looks like you have no active hackathons.. How about <a href="/events/create"><strong>create one</strong></a>?
                        </h4>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Meetups</strong>
                    </div>

                    <div class="table-responsive" v-if="meetups.length">
                        <table class="table card-table table-striped table-vcenter">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="item in meetups">
                                <td>{{ item.title }}</td>
                                <td>{{ item.start_date | momentDate }}</td>
                                <td>{{ item.end_date | momentDate }}</td>
                                <td class="text-nowrap">
                                    <a class="btn btn-sm btn-outline-primary" v-bind:href="'/m/' + item.slug + '/edit'">Edit</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card-body" v-else>
                        <h4 class="text-center">
                            Looks like you have no active hackathons.. How about <a href="/events/create"><strong>create one</strong></a>?
                        </h4>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Hackathons</strong>
                    </div>

                    <div class="table-responsive" v-if="hackathons.length">
                        <table class="table card-table table-striped table-vcenter">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="item in hackathons">
                                <td>{{ item.title }}</td>
                                <td>{{ item.start_date | momentDate }}</td>
                                <td>{{ item.end_date | momentDate }}</td>
                                <td class="text-nowrap">
                                    <a class="btn btn-sm btn-outline-primary" v-bind:href="'/h/' + item.slug + '/edit'">Edit</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card-body" v-else>
                        <h4 class="text-center">
                            Looks like you have no active hackathons.. How about <a href="/events/create"><strong>create one</strong></a>?
                        </h4>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'userid'
        ],

        data() {
            return {
                conferences: [],
                meetups: [],
                hackathons: []
            }
        },

        mounted() {
            this.getDashboardForUser();
        },

        methods: {
            getDashboardForUser: function() {
                let self = this;

                axios.get('/api/users/' + this.userid)
                    .then(function (response) {
                        self.hackathons = response.data.data.hackathons;
                        self.conferences = response.data.data.conferences;
                        self.meetups = response.data.data.meetups;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            moment: function () {
                return moment();
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