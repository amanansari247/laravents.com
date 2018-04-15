<template>
    <div>
        <div v-if="items.length">
            <div class="row">
                <div class="col-4" v-for="item in items">
                    <div class="card">
                        <img v-bind:src="item.header_image" v-bind:alt="item.title" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a v-bind:href="'/c/' + item.id">{{ item.title }}</a>
                            </h5>

                            <p class="card-text">{{ truncate(item.description, 120) }}</p>
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
                            <span class="page-link" v-on:click="getItems(links.prev)">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </span>
                            </li>

                            <li class="page-item" v-bind:class="{ active: currentPage === page }" v-for="page in pages">
                                <a class="page-link" v-on:click="getItems('api/hackathons?page=' + page)">{{ page }}</a>
                                <span class="sr-only">(current)</span>
                            </li>

                            <li class="page-item" v-bind:class="{ disabled: !links.next }">
                                <a class="page-link" v-on:click="getItems(links.next)">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <h2 class="text-center text-muted" v-else>
            There are no hackathons at this time. How about <strong><a href="/events/create">submit</a></strong> one?
        </h2>
    </div>
</template>

<script>
    export default {
        props: ['per_page', 'with_pagination'],

        data() {
            return {
                items: [],
                links: {},
                pages: {},
                currentPage: {},
                withPagination: this.with_pagination
            }
        },

        mounted() {
            this.getItems();
        },

        methods: {
            getItems: function(link) {
                let perPage = this.per_page;
                if (typeof perPage === 'undefined') {
                    perPage = '12';
                }

                if (typeof link === 'undefined') {
                    link = 'api/hackathons?page=1';
                }

                let self = this;
                axios.get(link + '&perPage=' + perPage)
                    .then(function (response) {
                        self.items = response.data.data;
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