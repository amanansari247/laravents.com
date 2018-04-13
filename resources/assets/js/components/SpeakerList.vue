<template>
    <div class="row">
        <div class="col" v-for="speaker in speakers">
            <div class="team-block">
                <div class="team-img">
                    <img v-bind:src="speaker.avatar_image" v-bind:alt="speaker.name">
                    <div class="team-content">
                        <h4 class="text-white mb0">{{ speaker.name }}</h4>
                        <p class="team-meta">- {{ speaker.meta }}</p>
                    </div>
                    <div class="overlay">
                        <div class="text">
                            <h4 class="mb0 text-white">{{ speaker.name }}</h4>
                            <p class="mb30 team-meta">- {{ speaker.meta }}</p>
                            <p>{{ speaker.description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['event'],

        data() {
            return {
                speakers: this.event.speakers
            }
        },

        mounted() {

        }
    }
</script>

<style scoped>

</style>