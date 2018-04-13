<template>
    <div>
        <div class="row">
            <div class="col-4" v-for="conference in conferences">
                <div class="card">
                    <!--<img v-bind:src="conference.header_image" v-bind:alt="conference.title" class="card-img-top">-->
                    <div class="card-body">
                        <h5 class="card-title">
                            <a v-bind:href="'/c/' + conference.id">{{ conference.title }}</a>
                        </h5>

                        <p class="card-text">{{ truncate(conference.description, 120) }}</p>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <div class="row justify-content-md-center" v-show="withPagination">
            <div class="col align-self-center">
                <nav aria-label="pagination">
                    <ul class="pagination">
                        <li class="page-item" v-bind:class="{ disabled: !links.prev }">
                            <span class="page-link" v-on:click="getConferences(links.prev)">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </span>
                        </li>

                        <li class="page-item" v-bind:class="{ active: currentPage === page }" v-for="page in pages">
                            <a class="page-link" v-on:click="getConferences('api/conferences?page=' + page)">{{ page }}</a>
                            <span class="sr-only">(current)</span>
                        </li>

                        <li class="page-item" v-bind:class="{ disabled: !links.next }">
                            <a class="page-link" v-on:click="getConferences(links.next)">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['per_page', 'with_pagination'],

        data() {
            return {
                conferences: [],
                links: {},
                pages: {},
                currentPage: {},
                withPagination: this.with_pagination
            }
        },

        mounted() {
            this.getConferences();
        },

        methods: {
            getConferences: function(link) {
                if (typeof link === 'undefined') {
                    link = 'api/conferences?page=1';
                }

                let self = this;
                axios.get(link + '&perPage=' + this.per_page)
                    .then(function (response) {
                        self.conferences = response.data.data;
                        self.links = response.data.links;
                        self.currentPage = response.data.meta.current_page;
                        self.pages = response.data.meta.last_page;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            truncate: function(str, length, ending) {
                if (length == null) {
                    length = 100;
                }

                if (ending == null) {
                    ending = '...';
                }

                if (str.length > length) {
                    return str.substring(0, length - ending.length) + ending;
                } else {
                    return str;
                }
            }
        }
    }
</script>

<style scoped>

</style>