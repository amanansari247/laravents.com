<template>
    <blockquote class="quote-card" v-show="quote != null">
        <p>
            {{ qoute.quote }}
        </p>

        <cite>
            {{ qoute.user_name }}, {{ qoute.user_company }}
        </cite>
    </blockquote>
</template>

<script>
    export default {
        data() {
            return {
                quote: {
                    quote: null,
                    user_name: null,
                    user_company: null
                }
            }
        },

        mounted() {
            this.getRandomQuote();
        },

        methods: {
            getRandomQuote: function() {
                let self = this;

                axios.get('/api/qoutes')
                    .then(function (response) {
                        self.quote = response.data.data;
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